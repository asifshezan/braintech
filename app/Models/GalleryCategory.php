<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use HasFactory;

    public function userinfo(){
        return $this->belongsTo(User::class, 'galcate_creator', 'id');
    }
}
