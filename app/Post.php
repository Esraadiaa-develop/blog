<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
   protected $fillable = ['title','content','category_id','image']; 
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function getImageAttribute($image){
        return asset($image);
    }
}
