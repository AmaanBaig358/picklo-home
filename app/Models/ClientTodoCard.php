<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ClientTodoCard extends Model
{
    protected $fillable = [
        'client_id',
        'name',
        'description',
        'is_active'
    ];

    public function todos()
    {
        return $this->hasMany(ClientTodo::class, 'card_id', 'id')->orderBy('order_number');
    }
}