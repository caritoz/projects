<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cells extends Model
{
    protected $fillable = ['row_id', 'column_id', 'description'];

    protected $primaryKey = ['row_id', 'column_id'];

    public $incrementing = false;

    public function rows()
    {
        return $this->belongsTo(Rows::class, 'row_id');
    }

    public function columns()
    {
        return $this->belongsTo(Columns::class, 'column_id');
    }
}
