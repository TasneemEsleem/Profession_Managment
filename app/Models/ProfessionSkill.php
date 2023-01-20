<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionSkill extends Model
{
    use HasFactory;

    public function profession(){
        return $this->belongsto(Profession::class ,'profession_id','id');
    }
    public function skills(){
        return $this->belongsto(Skill::class ,'skill_id','id');
    }
}
