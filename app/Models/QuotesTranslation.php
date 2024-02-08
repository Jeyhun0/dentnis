<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\SmartPunct\Quote;

class QuotesTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'quote_id',
        'description',
        'language_id',
    ];


    public function quote()
    {
        return $this->belongsTo(Quotes::class, 'quote_id');
    }


    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}



