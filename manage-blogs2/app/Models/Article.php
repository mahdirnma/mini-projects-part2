<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public static $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'user_id' => 'required|exists:users,id',
        'tag_ids' => 'required|array',
    ];

}
