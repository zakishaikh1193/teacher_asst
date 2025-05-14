<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    use HasFactory;

    protected $table = 'seo';

    protected $fillable = [
        'page_name',
        'title',
        'meta_description',
        'keywords'
    ];
}
