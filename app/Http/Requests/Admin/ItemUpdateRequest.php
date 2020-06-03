<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
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
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image1' => 'mimes:jpg,jpeg,png',
            'image2' => 'mimes:jpg,jpeg,png',
            'image3' => 'mimes:jpg,jpeg,png',
        ];
    }

    /**
     * Set custom validation error message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama barang wajib diisi',
            'quantity.required' => 'Jumlah barang wajib diisi',
            'quantity.integer' => 'Jumlah barang harus bilangan bulat',
            'quantity.min' => 'Jumlah barang minimal 0',
            'price.required' => 'Harga barang wajib diisi',
            'price.integer' => 'Harga barang harus bilangan bulat',
            'price.min' => 'Harga barang minimal 0',
            'image1.mimes' => 'Gambar barang pertama harus berupa JPG, JPEG, atau PNG',
//            'image1.max' => 'Ukuran gambar pertama maksimal 1000kb',
            'image2.mimes' => 'Gambar barang kedua harus berupa JPG, JPEG, atau PNG',
//            'image2.max' => 'Ukuran gambar kedua maksimal 1000kb',
            'image3.mimes' => 'Gambar barang ketiga harus berupa JPG, JPEG, atau PNG',
//            'image3.max' => 'Ukuran gambar ketiga maksimal 1000kb',
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
