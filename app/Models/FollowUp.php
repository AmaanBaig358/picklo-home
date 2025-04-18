<?php

namespace App\Models;

use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class FollowUp extends Model
{
    protected $fillable = [
        'user_id',
        'client_id',
        'project_id',
        'follow_up_type',
        'title',
        'description',
        'reminder_date',
        'status',
        'upload_files',
        'auto_status'
    ];

    protected $dates = ['reminder_date'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($followUp) {
            $followUp->auto_status = $followUp->calculateAutoStatus();
        });
        static::updating(function ($followUp) {
            $followUp->auto_status = $followUp->calculateAutoStatus();
        });
    }

    public function calculateAutoStatus()
    {
        $now = Carbon::now()->toDateString(); // Sirf YYYY-MM-DD format
        $reminderDate = Carbon::parse($this->reminder_date)->toDateString(); // Time remove karein

        if ($reminderDate === $now) {
            return 'Today';
        } elseif ($reminderDate > $now) {
            return 'Upcoming';
        } else {
            return 'Overdue';
        }
    }
    public function getAutoStatusAttribute()
    {
        return $this->calculateAutoStatus();
    }

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }

    public function client()
    {
        return $this->belongsTo(Leads::class, 'client_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}