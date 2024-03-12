<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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
            // 'title' => ['required','string','max:255'],
            // 'description' => ['required','string','max:255'],
            // 'date' => ['required','string','max:255'],
            // 'location' => ['required','string','max:255'],
            // 'available_seats' => ['required', 'integer'],
            // 'acceptance' => ['required','string', Rule::in(['Automatic acceptance', 'Manual acceptance'])],
            // 'organiser_id' => ['required'],
            // 'category_id' => ['required'],

            'title' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
            'location' => ['required'],
            'available_seats' => ['required'],
            'acceptance' => ['required'],
            'organiser_id' => ['required'],
            'category_id' => ['required'],
        ];
    }
}
