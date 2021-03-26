<?php

namespace App\Http\Requests;

use App\Columns;
use App\Rows;
use App\Table;
use Illuminate\Foundation\Http\FormRequest;

class CellsFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'table_id'      => 'required|exists:' . Table::class.',id',
            'row_id'        => 'required|exists:' . Rows::class.',id',
            'column_id'     => 'required|exists:' . Columns::class.',id',
            'description'   => 'required|string',
        ];
    }
}
