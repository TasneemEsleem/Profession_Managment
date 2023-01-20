<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    public function Professions()
    {
        return $this->belongsToMany(Profession::class, ProfessionSkill::class, 'skill_id', 'profession_id');
    }
    
}
