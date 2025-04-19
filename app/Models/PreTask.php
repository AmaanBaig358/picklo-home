<?php

namespace App\Models;

use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Model;

class PreTask extends Model
{
    protected $fillable = [
        'category_id',
        'title',
<<<<<<< HEAD
        'duration',
=======
>>>>>>> 721f0e5 (First commit)
    ];

    public function precategory()
    {
        return $this->belongsTo(PreCategory::class, 'category_id');
    }

    public function clients()
    {
        return $this->belongsToMany(Clients::class, 'client_task', 'task_id', 'client_id')->withTimestamps();
    }

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }
}
