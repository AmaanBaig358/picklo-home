<?php

namespace App\Models;

use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['client_id', 'name', 'description', 'start_date', 'end_date', 'status'];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function media() {
        return $this->hasMany(ProjectMedia::class);
    }

    public function members() {
        return $this->hasMany(ProjectMember::class);
    }

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }

    public function showPreTasks()
    {
        return $this->belongsToMany(PreTask::class, 'client_task', 'client_id', 'task_id')->withTimestamps();
    }


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
