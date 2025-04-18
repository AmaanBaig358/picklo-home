<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\FakerURL;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'lead_id',
        'engineer',
        'architect',
        'landscaper',
        'access_code',
        'spec_sheet',
        'status',
        'plan_files',

    ];


    public function lead()
    {
        return $this->belongsTo(Leads::class, 'lead_id');
    }


    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }

    public function assignedUsers()
    {
        return $this->belongsToMany(User::class, 'assigned_clients', 'client_id', 'user_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}