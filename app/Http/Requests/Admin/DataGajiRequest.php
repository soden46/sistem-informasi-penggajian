<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DataGajiRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'karyawan_id' => 'required',
                        'gaji_pokok' => 'required',
                        'transportasi' => 'required',
                        'uang_makan' => 'required',
                        'potongan' => 'required',
                        'total_gaji' => 'required',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'karyawan_id' => 'required',
                        'gaji_pokok' => 'required',
                        'total_gaji' => 'required',
                    ];
                }
        }
    }
}
