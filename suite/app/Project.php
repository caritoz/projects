<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer project_id
 */
class Project extends Model
{
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    /**
     * @param $id
     */
    public function projectDestroy($id)
    {
        $project = Project::findOrFail($id);
        $project->tables()->delete();

        $project->delete();
    }
}
