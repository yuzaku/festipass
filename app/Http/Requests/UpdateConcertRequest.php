<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class UpdateConcertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check(); // Simplified - middleware handles organizer check
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'location' => 'required|string|max:500',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'description' => 'required|string|min:10|max:2000',
            'concert_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // 5MB max
            'status' => 'required|in:draft,published,cancelled',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Concert title is required.',
            'title.max' => 'Concert title cannot exceed 255 characters.',
            'artist.required' => 'Artist name is required.',
            'artist.max' => 'Artist name cannot exceed 255 characters.',
            'location.required' => 'Concert location is required.',
            'location.max' => 'Location cannot exceed 500 characters.',
            'date.required' => 'Concert date is required.',
            'time.required' => 'Concert time is required.',
            'time.date_format' => 'Time must be in valid format (HH:MM).',
            'description.required' => 'Concert description is required.',
            'description.min' => 'Description must be at least 10 characters.',
            'description.max' => 'Description cannot exceed 2000 characters.',
            'concert_image.image' => 'File must be an image.',
            'concert_image.mimes' => 'Image must be jpeg, png, jpg, or webp format.',
            'concert_image.max' => 'Image size cannot exceed 5MB.',
            'status.required' => 'Concert status is required.',
            'status.in' => 'Status must be draft, published, or cancelled.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Combine date and time for event_date
        if ($this->has('date') && $this->has('time')) {
            $this->merge([
                'event_date' => Carbon::createFromFormat('Y-m-d H:i', $this->date . ' ' . $this->time)->toDateTimeString(),
            ]);
        }
    }

    /**
     * Get the validated data with proper mapping.
     */
    public function validated($key = null, $default = null)
    {
        $validated = parent::validated($key, $default);
        
        // Add organizer_id to the validated data
        $validated['organizer_id'] = auth()->id();

        return $validated;
    }
}