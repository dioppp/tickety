<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
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
            'ticket_name' => 'string|max:255',
            'ticket_description' => 'string',
            'price' => 'numeric|min:0',
            'stock' => 'integer|min:0',
            'sell_start_date' => 'date',
            'sell_end_date' => 'date|after_or_equal:sell_start_date',
            'sell_start_time' => 'nullable',
            'sell_end_time' => 'after:sell_start_time',
        ];
    }
}
