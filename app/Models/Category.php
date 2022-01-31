<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public function getCategories()
    {
    }

    public static function getCategoriesById($id)
    {
        $news = DB::table('categories')
            ->leftJoin('news', 'categories.id', '=', 'news.category_id')
            ->select('news.*', 'categories.title as category_title')
            ->where('categories.id', '=', $id)
            ->get();

        return $news;
    }
}
