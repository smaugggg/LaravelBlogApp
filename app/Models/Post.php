<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "posts";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        "name",
        "body",
        "author_id"
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
