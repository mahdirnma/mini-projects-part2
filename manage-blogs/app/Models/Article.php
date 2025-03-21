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
        'user_id',
        'category_id',
        'is_active',
    ];
    public static $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'user_id' => 'required|integer',
        'category_id' => 'required|integer',
        'tag_ids' => 'required|array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
