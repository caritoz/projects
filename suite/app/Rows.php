<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rows extends Model
{
    protected $fillable = ['name'];

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }
}
