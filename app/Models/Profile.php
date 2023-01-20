<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
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

   public function profession()
   {
       return $this->hasOne(Profession::class,'id','profession_id');
   }
}
