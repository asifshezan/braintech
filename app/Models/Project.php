<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function procategory(){
        return $this->belongsTo(ProjectCategory::class, 'procate_name', 'procate_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'project_creator', 'id');
    }
}
