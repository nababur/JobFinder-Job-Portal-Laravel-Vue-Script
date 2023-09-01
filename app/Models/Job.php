<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $guarded  = [];


    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function checkApplication(){
        return DB::table('job_user')->where('user_id', auth()->user()->id)->where('job_id', $this->id)->exists();
    }

    public function favorites(){
        return $this->belongsToMany(Job::class, 'favorites', 'job_id', 'user_id')->withTimestamps();
    }

    public function checkSaved(){
        return DB::table('favorites')->where('user_id', auth()->user()->id)->where('job_id', $this->id)->exists();
    }


}
