<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class PostModel extends Model
{
    // use SoftDeletes;
    // use HasFactory;
    protected $table = 'post_models'; 
    protected $guarded = ['id'];
    // protected $dates = ['deleted_at'];
    protected $fillable = ['title','content','image'];

}
