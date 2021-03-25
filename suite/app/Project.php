<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name'];

    public function tables()
    {
        return $this->hasMany(Table::class);
    }
}
