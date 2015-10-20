<?php

namespace ManageMe\Http\Requests;

class MedicineRequest extends Request
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
            'genericName' => 'required|max:255',
            'commercialName' => 'required|max:255',
            'brand' => 'required|max:255',
            'unitMeasure' => 'required|max:255'
        ];
    }
}
