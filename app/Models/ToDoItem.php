<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoItem extends Model
{
    use HasFactory;

    protected $table = 'todo_items';
    protected $fillable = ['title', 'completed'];

    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }
}
