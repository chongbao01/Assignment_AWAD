<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'owner_id',
        'freelancer_id',
        'title',
        'description',
        'budget',
        'status',
    ];



    // protected $attributes = [
    //     'status'=> 'open',
    // ];



    // public function owner()
    // {
    //     return $this->belongsTo(User::class, 'owner_id');
    // }

    // public function freelancer()
    // {
    //     return $this->belongsTo(User::class, 'freelancer_id');
    // }
    public function user() 
    {
    return $this->belongsTo(User::class, 'owner_id');
    }
    
    public function bid()
    {
        return $this->hasMany(Bid::class);
    }
}
