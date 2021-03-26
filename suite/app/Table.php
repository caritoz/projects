<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = ['project_id', 'name'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function rows()
    {
        return $this->hasMany(Rows::class, 'table_id');
    }

    public function columns()
    {
        return $this->hasMany(Columns::class, 'table_id');
    }
}
