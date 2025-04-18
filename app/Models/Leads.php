<?php

namespace App\Models;

use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $table = 'leads';
    protected $fillable = [
        'client_name',
        'client_email',
        'client_phone',
        'job_address',
        'status',
        'project_type',
        'notes',
        'is_approved',

    ];
    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }

    public function tasks()
    {
        return $this->belongsToMany(PreTask::class, 'client_task', 'client_id', 'task_id')->withTimestamps();
    }

    public function cards()
    {
        return $this->hasMany(ClientTodoCard::class, 'client_id', 'id');
    }

    public function assignedUsers()
    {
        return $this->belongsToMany(User::class, 'client_user', 'client_id', 'user_id')->withTimestamps();
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
