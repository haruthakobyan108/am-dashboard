<?php

namespace App\Http\Requests;

use App\Rules\IntervalRule;
use DateTime;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ReportRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after:from',
//            'interval' =>['required', new IntervalRule($this->from, $this->to)]
        ];
    }


    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
//            'from' => 'from :attribute must be before end_date',
//            'to' => ':attribute ca\'nt be grader then start date'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
