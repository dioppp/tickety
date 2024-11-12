<?php

namespace App\Http\Requests;

use App\Enums\CategoryEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreEventRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'event_name' => 'required|string|max:255',
            'category' => ['required', new Enum(CategoryEnum::class)],
            'event_description' => 'required|string',
            'location' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
            'tickets' => 'sometimes|array',
            'tickets.*.ticket_name' => 'required_with:tickets|string|max:255',
            'tickets.*.ticket_description' => 'required_with:tickets|string',
            'tickets.*.price' => 'required_with:tickets|numeric|min:0',
            'tickets.*.stock' => 'required_with:tickets|integer|min:1',
            'tickets.*.sell_start_date' => 'required_with:tickets|date',
            'tickets.*.sell_end_date' => 'required_with:tickets|date|after_or_equal:tickets.*.sell_start_date',
        ];
    }
}
