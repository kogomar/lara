<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileFile extends Model
{
    protected $fillable = [
        'file_name',
    ];

    public function profile()
    {
        return $this->belongsTo('App\Models\Profile');
    }
}
