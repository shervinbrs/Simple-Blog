<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class widget extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','content','active','icon','meta_desc'];
}
