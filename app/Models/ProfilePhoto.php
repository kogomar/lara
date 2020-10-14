<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePhoto extends Model
{
    use HasFactory;

    protected $table = 'profile_photos';

    protected $fillable = [
        'photo_name',
    ];

    public function profile()
    {
        return $this->belongsTo('App\Models\Profile');
    }
}
