<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'profile_photo_id',
        'profile_file_id',
        'first_name',
        'last_name',
        'date_of_birth',
        'city',
        'job_type',
        'available',
        'created_at',
        'updated_at'
    ];

    public function profileFile()
    {
        return $this->hasOne('App\Models\ProfileFile');
    }

    public function profilePhoto()
    {
        return $this->hasOne('App\Models\ProfilePhoto');
    }
}
