<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'subtitle',
        'image_path',
        'button_text',
        'button_link',
        'is_active',
        'order',
    ];

    public $translatable = [
        'title',
        'subtitle',
        'button_text',
    ];

    protected $casts=[
        'is_active'=>'boolean',
        'order'=>'integer',
    ];
}
