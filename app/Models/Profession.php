<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Profession extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasRoles , Notifiable , Billable;

    public function skills()
    {
        return $this->belongsToMany(Skill::class, ProfessionSkill::class, 'profession_id', 'skill_id');
    }

    public function portfolio()
    {
        return $this->hasOne(Portfolio::class);
    }
    public function messages()
  {
    return $this->hasMany(Message::class);
  }
  public function notarizedStatus(): Attribute
  {
      return new  Attribute(get: fn () => $this->notarized ? 'موثق' : 'غير موثق');
      
  }
}
