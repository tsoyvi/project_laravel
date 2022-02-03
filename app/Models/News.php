<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    public static $availableFields = [
        'id',
        'title',
        'author',
        'status',
        'description',
        'created_at'
    ];

    protected $fillable = [
        'title',
        'slug',
        'author',
        'status',
        'description',
    ];

    /*
    public static function getNewsById($id)
    {
        $news = DB::table('news')->find($id, ['*']);

        return $news;
    }
    */
}
