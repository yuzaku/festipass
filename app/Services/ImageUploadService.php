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
        try {
            // Delete old image if exists
            if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }

            // Validate file
            if (!$file->isValid()) {
                throw new \Exception('Invalid file upload');
            }

            // Generate unique filename
            $extension = $file->getClientOriginalExtension();
            $filename = 'concerts/' . Str::uuid() . '_' . time() . '.' . $extension;

            // Ensure concerts directory exists
            if (!Storage::disk('public')->exists('concerts')) {
                Storage::disk('public')->makeDirectory('concerts');
            }

            // Store the image
            $path = $file->storeAs('concerts', basename($filename), 'public');
            
            if (!$path) {
                throw new \Exception('Failed to store image file');
            }

            // Skip image processing for now to avoid dependency issues
            // if (class_exists(Image::class)) {
            //     try {
            //         $this->resizeImage(storage_path('app/public/' . $path));
            //     } catch (\Exception $e) {
            //         // Log but don't fail if image processing fails
            //         \Log::warning('Image processing failed: ' . $e->getMessage());
            //     }
            // }

            return $path;
        } catch (\Exception $e) {
            \Log::error('Image upload failed: ' . $e->getMessage());
            throw new \Exception('Image upload failed: ' . $e->getMessage());
        }
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