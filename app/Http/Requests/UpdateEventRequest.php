<?php

namespace App\Http\Requests;

use App\Enums\CategoryEnum;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'event_id' => 'required|exists:events,id',
            'user_id' => 'required|exists:users,id',
            'event_name' => 'string|max:255',
            'category' => new Enum(CategoryEnum::class),
            'event_description' => 'string',
            'location' => 'string',
            'start_date' => 'date',
            'end_date' => 'date|after_or_equal:start_date',
            'start_time' => 'nullable',
            'end_time' => 'after:start_time',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
        ];
    }
}
