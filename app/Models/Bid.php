<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = [
        'project_id',
        'freelancer_id',
        'bid_amount',
        'msg',
        'status',
    ];

    // protected $guarded = [
    //     'status',
    // ]; 

    protected $attributes = [
        'status' => 'pending',
    ];
    public function project() {
        return $this->belongsTo(Project::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function freelancer() {
        return $this->belongsTo(User::class, 'freelancer_id');
    }
}
