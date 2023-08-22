<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    public function getByMeal(int $limit_count = 20)
    {
        return $this->posts()->with('meal')->orderBy('updated_at', 'DESC')->limit($limit_count);
    }
}