<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMedia extends Model {

    use HasFactory;

    protected $fillable = ['project_id', 'media_type', 'media_url'];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
