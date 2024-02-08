<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $translatable = ['title', 'description', 'slug'];
    public function  categories()
    {
        return $this->hasMany(CategoryTranslation::class ,'category_id','category_id');
    }


    public function  category()
    {
        return $this->hasOne(CategoryTranslation::class ,'category_id', 'category_id');
    }
    public function translations()
    {
        return $this->hasMany(BlogTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(BlogTranslation::class);
    }
    public function languages()
    {
        return $this->hasManyThrough(
Language::class,
BlogTranslation::class,
'blog_id' ,
'id',
'id',
'language_id',
        );
    }



}
