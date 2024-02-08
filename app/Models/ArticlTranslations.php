<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlTranslations extends Model
{
    use HasFactory;

    public function article()
    {
        return $this->belongsTo(Team::class, 'article_id');
    }
}
