<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    protected $fillable=[
        'name',
        'language_id',
        'category_id'
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

}
