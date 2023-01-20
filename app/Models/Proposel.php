<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposel extends Model
{
    use HasFactory;
    public function project()
    {
        return $this->hasOne(Project::class,'id','project_id');
    }
    public function profession()
    {
        return $this->hasMany(Profession::class,'id','profession_id');
    }
}
