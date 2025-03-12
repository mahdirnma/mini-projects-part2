<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'is_active',
    ];
    public function articles(){
        return $this->belongsToMany(Article::class);
    }
    public static $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
    ];
}
