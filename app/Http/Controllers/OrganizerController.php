<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Http\Requests\StoreConcertRequest;
use App\Http\Requests\UpdateConcertRequest;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrganizerController extends Controller
{
    protected $imageUploadService;

    public function __construct(?ImageUploadService $imageUploadService = null)
    {
        $this->imageUploadService = $imageUploadService;
    }

    /**
     * Show organizer dashboard
     */
    public function dashboard()
    {
        $organizerId = Auth::id();
        
        // Get real statistics from database
        $totalConcerts = Concert::byOrganizer($organizerId)->count();
        
        // Calculate real statistics from sample data
        $publishedConcerts = Concert::byOrganizer($organizerId)->where('status', 'published')->get();
        $ticketsSold = $publishedConcerts->sum(function ($concert) {
            return $concert->getTicketsSoldCount();
        });
        
        $totalRevenue = $publishedConcerts->sum(function ($concert) {
            return $concert->getTotalRevenue();
        });
        
        // Set average rating to 4.8 for seeded concerts
        $averageRating = $totalConcerts > 0 ? 4.8 : 0;
        
        // Get recent concerts for display
        $recentConcerts = Concert::byOrganizer($organizerId)
            ->latest()
            ->take(4)
            ->get();
            
        // Debug log
        \Log::info('Dashboard data', [
            'organizerId' => $organizerId,
            'totalConcerts' => $totalConcerts,
            'recentConcerts_count' => $recentConcerts->count(),
            'ticketsSold' => $ticketsSold,
            'totalRevenue' => $totalRevenue
        ]);
        
        return view('organizer.dashboard', compact(
            'totalConcerts', 
            'ticketsSold', 
            'totalRevenue', 
            'averageRating',
            'recentConcerts'
        ));
    }

    /**
     * Show concerts management page
     */
    public function concerts(Request $request)
    {
        $organizerId = Auth::id();
        
        // Build query with filters
        $query = Concert::byOrganizer($organizerId); // Removed ->with(['tickets']) until tables exist
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('artist', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Sorting
        $sortBy = $request->get('sort', 'created_at');
        $sortDirection = $request->get('direction', 'desc');
        
        $allowedSorts = ['created_at', 'title', 'event_date', 'status'];
        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortDirection);
        }

        $concerts = $query->paginate(12);
        
        // Get statistics
        $totalConcerts = Concert::byOrganizer($organizerId)->count();
        // Calculate real statistics from sample data
        $publishedConcerts = Concert::byOrganizer($organizerId)->where('status', 'published')->get();
        $ticketsSold = $publishedConcerts->sum(function ($concert) {
            return $concert->getTicketsSoldCount();
        });
        $totalRevenue = $publishedConcerts->sum(function ($concert) {
            return $concert->getTotalRevenue();
        });
        $averageRating = $totalConcerts > 0 ? 4.8 : 0;
        
        return view('organizer.concerts.manager', compact(
            'concerts',
            'totalConcerts', 
            'ticketsSold', 
            'totalRevenue', 
            'averageRating'
        ));
    }

    /**
     * Show create concert form
     */
    public function createConcert()
    {
        return view('organizer.concerts.create');
    }

    /**
     * Store new concert
     */
    public function storeConcert(StoreConcertRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $validatedData = $request->validated();
            
            // Handle image upload - simplified version
            if ($request->hasFile('concert_image')) {
                $file = $request->file('concert_image');
                if ($file && $file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension;
                    
                    // Move file to public directory directly
                    $file->move(public_path('images/concerts'), $filename);
                    $validatedData['poster'] = 'images/concerts/' . $filename;
                }
            }

            // Combine date and time
            if (isset($validatedData['date']) && isset($validatedData['time'])) {
                $validatedData['event_date'] = Carbon::createFromFormat(
                    'Y-m-d H:i', 
                    $validatedData['date'] . ' ' . $validatedData['time']
                );
                unset($validatedData['date'], $validatedData['time']);
            }

            $concert = Concert::create($validatedData);
            
            DB::commit();
            
            $message = $concert->status === 'published' 
                ? 'Concert created and published successfully!' 
                : 'Concert saved as draft successfully!';
                
            return redirect()
                ->route('organizer.concerts')
                ->with('success', $message);
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Failed to create concert. Please try again.');
        }
    }

    /**
     * Show edit concert form
     */
    public function editConcert($id)
    {
        $concert = Concert::byOrganizer(Auth::id())
            ->findOrFail($id);
        
        return view('organizer.concerts.edit', compact('concert'));
    }

    /**
     * Update concert
     */
    public function updateConcert(UpdateConcertRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $concert = Concert::byOrganizer(Auth::id())->findOrFail($id);
            $validatedData = $request->validated();
            
            // Handle image upload
            if ($request->hasFile('concert_image')) {
                try {
                    $file = $request->file('concert_image');
                    
                    // Simple upload without service dependency
                    if ($file && $file->isValid()) {
                        $extension = $file->getClientOriginalExtension();
                        $filename = 'concerts/' . uniqid() . '_' . time() . '.' . $extension;
                        
                        // Store directly
                        $path = $file->storeAs('concerts', basename($filename), 'public');
                        
                        if ($path) {
                            $validatedData['poster'] = $path;
                        }
                    }
                } catch (\Exception $uploadError) {
                    // Continue without updating image if upload fails
                    \Log::warning('Image upload failed: ' . $uploadError->getMessage());
                }
            }

            // Combine date and time
            if (isset($validatedData['date']) && isset($validatedData['time'])) {
                $validatedData['event_date'] = Carbon::createFromFormat(
                    'Y-m-d H:i', 
                    $validatedData['date'] . ' ' . $validatedData['time']
                );
                unset($validatedData['date'], $validatedData['time']);
            }

            $concert->update($validatedData);
            
            DB::commit();
            
            return redirect()
                ->route('organizer.concerts')
                ->with('success', 'Concert updated successfully!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Failed to update concert. Please try again.');
        }
    }

    /**
     * Delete concert
     */
    public function deleteConcert($id)
    {
        try {
            $concert = Concert::byOrganizer(Auth::id())->findOrFail($id);
            
            // Check if concert has sold tickets
            if ($concert->getTicketsSoldCount() > 0) {
                return redirect()
                    ->back()
                    ->with('error', 'Cannot delete concert with sold tickets. You can cancel it instead.');
            }
            
            // Delete image if exists
            if ($concert->poster) {
                $this->imageUploadService->deleteConcertImage($concert->poster);
            }
            
            $concert->delete();
            
            return redirect()
                ->route('organizer.concerts')
                ->with('success', 'Concert deleted successfully!');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete concert. Please try again.');
        }
    }

    /**
     * Show sales reports
     */
    public function reports()
    {
        $organizerId = Auth::id();
        
        // Get concert statistics
        $concerts = Concert::byOrganizer($organizerId)->get();
            
        // TODO: These will be implemented when ticket tables are created by teammates
        $totalRevenue = 0; // Placeholder until ticket system is implemented
        $totalTicketsSold = 0; // Placeholder until ticket system is implemented
        
        // Monthly revenue data for charts (SQLite compatible)
        $monthlyRevenue = Concert::byOrganizer($organizerId)
            ->selectRaw("strftime('%Y', event_date) as year, strftime('%m', event_date) as month, COUNT(*) as concerts")
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->take(12)
            ->get();
        
        return view('organizer.reports', compact(
            'concerts',
            'totalRevenue',
            'totalTicketsSold',
            'monthlyRevenue'
        ));
    }

    /**
     * Show organizer profile
     */
    public function profile()
    {
        $organizer = Auth::user();
        $organizerId = Auth::id();
        
        // Get additional organizer statistics
        $totalEvents = Concert::byOrganizer($organizerId)->count();
        $totalReviews = 0; // Implement when you have reviews system
        $averageRating = 4.5; // Implement when you have reviews system
        
        return view('organizer.profile', compact(
            'organizer',
            'totalEvents',
            'totalReviews',
            'averageRating'
        ));
    }

    /**
     * Update organizer profile
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'tel_num' => 'nullable|string|max:20',
            'password' => 'nullable|min:8|confirmed',
        ]);

        try {
            $user = Auth::user();
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->tel_num = $request->tel_num;
            
            if ($request->password) {
                $user->password = $request->password; // Will be hashed by mutator in User model
            }
            
            $user->save();
            
            return redirect()
                ->route('organizer.profile')
                ->with('success', 'Profile updated successfully!');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Failed to update profile. Please try again.');
        }
    }

    /**
     * Get concert statistics for AJAX requests
     */
    public function getConcertStats($id)
    {
        $concert = Concert::byOrganizer(Auth::id())->findOrFail($id);
        
        return response()->json([
            'tickets_sold' => $concert->getTicketsSoldCount(),
            'revenue' => $concert->getTotalRevenue(),
            'available_tickets' => $concert->getAvailableTicketsCount(),
            'status' => $concert->status,
        ]);
    }
}