<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageUploadService
{
    /**
     * Upload and process concert image
     */
    public function uploadConcertImage(UploadedFile $file, $oldImagePath = null): string
    {
        // Delete old image if exists
        if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
            Storage::disk('public')->delete($oldImagePath);
        }

        // Generate unique filename
        $extension = $file->getClientOriginalExtension();
        $filename = 'concerts/' . Str::uuid() . '_' . time() . '.' . $extension;

        // Store the image
        $path = $file->storeAs('concerts', basename($filename), 'public');

        // If Intervention Image is available, resize the image
        if (class_exists(Image::class)) {
            $this->resizeImage(storage_path('app/public/' . $path));
        }

        return $path;
    }

    /**
     * Resize image for optimal display
     */
    protected function resizeImage(string $imagePath): void
    {
        try {
            $image = Image::make($imagePath);
            
            // Resize to maximum width of 1200px while maintaining aspect ratio
            if ($image->width() > 1200) {
                $image->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            // Optimize quality
            $image->save($imagePath, 85);
        } catch (\Exception $e) {
            // If image processing fails, continue without optimization
            \Log::warning('Image processing failed: ' . $e->getMessage());
        }
    }

    /**
     * Delete concert image
     */
    public function deleteConcertImage(string $imagePath): bool
    {
        if (Storage::disk('public')->exists($imagePath)) {
            return Storage::disk('public')->delete($imagePath);
        }

        return false;
    }

    /**
     * Get default concert image path
     */
    public function getDefaultConcertImage(): string
    {
        return 'concerts/default-concert-poster.jpg';
    }
}