<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','user_id','thumbnail','publish','publish_date','content','category_id','meta_desc'];
    protected $hidden = ['created_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function publish()
    {
        return ($this->publish == 0) ? 'خیر' : 'بله';
    }

}
