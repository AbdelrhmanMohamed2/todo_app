<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task', 'user_id', 'category_id', 'status',
    ];

    protected function category()
    {
        return $this->belongsTo(Category::class);
    }
}
