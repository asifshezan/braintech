<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public function userinfo()
    {
        return $this->belongsTo(User::class, 'gallery_creator', 'id');
    }

    public function galcategory(){
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id', 'galcate_id');
    }
}





