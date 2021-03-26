<?php

namespace App\Http\Requests;

use App\Table;
use Illuminate\Foundation\Http\FormRequest;

class RowsFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'table_id' => 'required|exists:' . Table::class.',id',
            'name'    => 'required|string',
        ];
    }
}
