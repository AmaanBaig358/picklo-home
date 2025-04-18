<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreSubCategory extends Model
{
    protected $fillable = [
        'category_id',
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
