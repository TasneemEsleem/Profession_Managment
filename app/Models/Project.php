<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function SubCategory()
    {
        return $this->hasOne(SubCategory::class,'id','subcategory_id');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function proposels()
    {
        return $this->hasMany(Proposel::class);
    }
    public function activeStatus(): Attribute
    {
        return new  Attribute(get: fn () => $this->active ? 'In-Active' : 'Active');
        
    }
}
