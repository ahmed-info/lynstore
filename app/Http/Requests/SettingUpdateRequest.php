<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone'=>'string',
            'whatsapp'=>'string',
            'tiktok'=>'string',
            'youtube'=>'string',
            'facebook'=>'string',
            'instagram'=>'string',
            'exchange_rate'=>'numeric',
        ];
    }
}
