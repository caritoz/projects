<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cells extends Model
{
    protected $fillable = ['description'];

    public function row()
    {
        return $this->belongsTo(Rows::class, 'row_id');
    }

    public function column()
    {
        return $this->belongsTo(Columns::class, 'column_id');
    }
}
