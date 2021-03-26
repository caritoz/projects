<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Columns extends Model
{
    protected $fillable = ['table_id', 'name'];

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }

    public function cells()
    {
        return $this->hasMany(Cells::class, 'column_id');
    }
}
