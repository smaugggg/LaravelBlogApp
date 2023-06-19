<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "categories";
    protected $dates = ['deleted_at'];

    protected $fillable = [
        "name",
        "description"
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

}
