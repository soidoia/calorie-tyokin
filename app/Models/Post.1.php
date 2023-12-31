<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body' ,
        'meal_id'
        ];

    public function getByLimit(int $limit_count =20)
    {
        return $this::with('meal')->orderBy('updated_at', 'DESC')->limit($limit_count);
    }
    public function meals()
    {
        return $this->belongsToMany(Meal::class);
    }
    
}
