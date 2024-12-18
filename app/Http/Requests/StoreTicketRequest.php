<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'tickets' => 'sometimes|array',
            'tickets.*.ticket_name' => 'required_with:tickets|string|max:255',
            'tickets.*.ticket_description' => 'required_with:tickets|string',
            'tickets.*.price' => 'required_with:tickets|numeric|min:0',
            'tickets.*.stock' => 'required_with:tickets|integer|min:0',
            'tickets.*.sell_start_date' => 'required_with:tickets|date',
            'tickets.*.sell_end_date' => 'required_with:tickets|date|after_or_equal:tickets.*.sell_start_date',
            'tickets.*.sell_start_time' => 'required_with:tickets|date_format:H:i',
            'tickets.*.sell_end_time' => 'required_with:tickets|date_format:H:i|after:tickets.*.sell_start_time',
        ];
    }
}
