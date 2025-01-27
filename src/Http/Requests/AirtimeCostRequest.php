<?php

namespace Fintech\Airtime\Http\Requests;

use Fintech\Core\Rules\MobileNumber;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AirtimeCostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['nullable', 'integer', 'min:1'],
            'service_id' => ['required', 'integer', 'min:1'],
            'source_country_id' => ['required', 'integer', 'min:1', 'master_currency'],
            'destination_country_id' => ['required', 'integer', 'min:1', 'master_currency'],
            'reverse' => ['required', 'boolean'],
            'reload' => ['nullable', 'boolean'],
            'airtime_data' => ['nullable', 'array'],
            'airtime_data.recipient_msisdn' => ['required', new MobileNumber],
            'airtime_data.amount' => ['required', 'integer', 'min:1'],
            'airtime_data.connection_type' => ['required', 'string', 'in:prepaid,postpaid'],
            'airtime_data.operator_id' => ['required', 'integer', 'min:1'],
        ];
    }
}
