<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            // 'name' => ['required', 'string'],
            //'phoneNumber' => ['required', 'string', 'size:11'],
            'carType' => ['required', 'string'],
            'carModel' => ['required', 'string'],
            'carMadeYear' => ['required', 'numeric'],
            'glassType' => ['required_if:serviceType,process,change', 'string'],
            'glassPosition' => ['required_if:serviceType,process,change', 'string', 'in:front,back,left-side,right-side,mirrors'],
            'serviceType' => ['required', 'string', 'in:process,change,upRepair,machine'],
            'servicePlace' => ['required', 'string', 'in:clientLocation,workshop'],
            'latitude' => ['required_if:servicePlace,clientLocation'],
            'longitude' => ['required_if:servicePlace,clientLocation' ],
            'date' => ['required', 'date'],
            'time' => ['required', 'numeric'],
            'paymentMethod'=>['required']
        ];

        // if ($this->isMethod('put')) {
        //     $rules['broken_glass_image'] = [
        //         'sometimes',
        //         'mimes:png,jpg,jpeg',
        //     ];
        // } else {
        //     $rules['broken_glass_image'] = ['required', 'mimes:png,jpg,jpeg'];
        // }

        return $rules;
    }

    public function messages(): array
    {
        return [
            // 'name.required' => 'حقل الاسم مطلوب.',
            // 'name.string' => 'حقل الاسم يجب أن يكون نصيًا صحيحًا.',
            // 'phoneNumber.required' => 'حقل رقم الجوال مطلوب.',
            // 'phoneNumber.size' => 'يجب أن يتكون رقم الجوال من 11 خانة.',
            'carType.required' => 'حقل نوع السيارة مطلوب.',
            'carType.string' => 'حقل نوع السيارة يجب أن يكون نصيًا صحيحًا.',
            
            'carModel.required' => 'يجب كتابة موديل السيارة.',
            
            'carMadeYear.required' => 'يجب كتابة سنة تصنيع السيارة.',
            'carMadeYear.numeric' => 'يجب ان تكون السنة صحيحة.',
            
            'glassType.required' => 'حقل نوع الزجاج مطلوب.',
            'glassType.string' => 'حقل نوع الزجاج يجب أن يكون نصيًا صحيحًا.',

            'glassPosition.required' => 'حقل مكان الزجاج مطلوب.',
            'glassPosition.string' => 'حقل مكان الزجاج يجب أن يكون نصيًا صحيحًا.',
            'glassPosition.in' => 'يجب اختيار مكان الزجاج من بين الخيارات المتاحة.',
            
            'serviceType.required' => 'مطلوب تحديد نوع الخدمة',
            'serviceType.in' => 'متلعبش في الانسبكت ي عرص',
            // 'broken_glass_image.required' => 'رجاءً قم برفع صورة الزجاج المكسور.',
            // 'broken_glass_image.mimes' => 'صيغة الصورة غير مدعومة. يجب أن تكون الصورة من نوع PNG أو JPG أو JPEG.',
            
            'latitude.required' => 'موقعك الجغرافي مطلوب.',
            'latitude.numeric' => 'موقعك الجغرافي غير صحيح.',
            'longitude.required' => 'موقعك الجغرافي مطلوب.',
            'longitude.numeric' => 'موقعك الجغرافي غير صحيح.',
        ];
    }
}
