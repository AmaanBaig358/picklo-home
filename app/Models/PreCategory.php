<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreCategory extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }


    public function preTasks()
    {
        return $this->hasMany(PreTask::class, 'category_id');
    }

}
