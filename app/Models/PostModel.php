<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    // use HasFactory;
    protected $table = 'post_models'; 
    protected $guarded = ['id'];
    protected $fillable = ['title','content','image'];

}
