<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReservationRequest extends FormRequest
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
            'user_id' => ['required', 'string', 'max:255'],
            'event_id' => ['required', 'string', 'max:255'],
            'reservation_date' => ['required', 'integer'],
            'status' => ['nullable', 'string', Rule::in(['En attente', 'Confirmee'])],
            'ticket_number' => ['required', 'string', 'max:255'],
        ];
    }
}
