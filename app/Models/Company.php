<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    protected $fillable =[
        'cname','user_id', 'slug', 'address', 'phone', 'website', 'logo','banner', 'slogan', 'description'
    ];

    public function jobs(){
        return $this->hasMany(Job::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }


}
