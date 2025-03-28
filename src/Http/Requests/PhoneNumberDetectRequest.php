<?php

namespace Fintech\Airtime\Http\Requests;

use Fintech\Core\Rules\MobileNumber;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PhoneNumberDetectRequest extends FormRequest
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
            'mobile' => ['string', 'required', 'min:10', 'max:15', new MobileNumber],
            'role_id' => ['integer', 'nullable'],
            'service_type_parent_id' => ['integer', 'required'],
            'source_country_id' => ['integer', 'required', 'master_currency'],
            'destination_country_id' => ['integer', 'required', 'master_currency'],
            'visible_android_app' => ['string', 'required_without_all:visible_ios_app,visible_website'],
            'visible_ios_app' => ['string', 'required_without_all:visible_android_app,visible_website'],
            'visible_website' => ['string', 'required_without_all:visible_ios_app,visible_android_app'],
        ];
    }
}
