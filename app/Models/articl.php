<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articl extends Model
{
    use HasFactory;

    public function translations()
    {
        return $this->hasMany(ArticlTranslations::class, 'article_id', 'id');
    }
}
