<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\FakerURL;

class ClientTodo extends Model
{
    use HasFactory;

    protected $table = 'client_todo';

    protected $fillable = [
        'client_id',
        'title',
        'priority',
        'description',
        'end_date',
        'card_id',
        'order_number',
    ];

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }
}