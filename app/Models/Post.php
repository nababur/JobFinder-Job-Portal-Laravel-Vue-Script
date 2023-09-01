<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;

    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }


    protected $guarded  = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }


}
