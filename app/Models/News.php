<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory,  Sluggable;

    protected $table = 'news';
    public static $availableFields = [
        'id',
        'category_id',
        'title',
        'author',
        'status',
        'image',
        'description',
        'created_at'
    ];

    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'author',
        'status',
        'description',
        'image',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
