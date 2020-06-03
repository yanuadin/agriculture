<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCustomerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'address' => 'required',
            'phone' => 'required|integer|min:0',
            'password' => 'required|required_with:retype_password|same:retype_password',
            'retype_password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus sesuai format',
            'email.unique' => 'Email telah digunakan oleh user lain',
            'province_id.required' => 'Provinsi wajib dipilih',
            'regency_id.required' => 'Kabupaten/Kota wajib dipilih',
            'district_id.required' => 'Kecamatan wajib dipilih',
            'address.required' => 'Alamat wajib diisi',
            'phone.required' => 'Nomor handphone wajib diisi',
            'phone.integer' => 'Nomor handphone harus bilangan bulat',
            'phone.min' => 'Nomor handphone harus lebih dari 0',
            'password.required' => 'Password wajib diisi',
            'password.same' => 'Password tidak cocok',
            'retype_password.required' => 'Konfirmasi password wajib diisi',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        //ADD CUSTOM VALIDATOR
        $validator->after(function ($validator) {
            if($this->discount != null){
                if($this->unit == 'Persentase'){
                    if($this->discount > 100)
                        $validator->errors()->add("discount", "Discount persentase tidak boleh lebih dari 100");
                }
                if($this->discount < 0)
                    $validator->errors()->add("discount", "Discount tidak boleh kurang dari 0");
                if($this->unit == null)
                    $validator->errors()->add("unit", "Satuan wajib diisi");
            }
        });
    }
}
