<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function add($category)
    {
        //loggers
       self::create($category);
    }

    public static function filter(){
        return self::where('userid',Auth::user()->id);
    }

    public function remove($id)
    {
        $this->findOrFail($id)->delete();
    }

    public function getCategoryById($id)
    {
        return $this->findOrFail($id);
    }

    public function getAllCategories()
    {
        return $this->all();
    }
    public function getByCount($colum, $order, $count)
    {
        return $this->orderBy($colum, $order)->limit($count)->get();
    }

    public function getCoverAttribute($cover)
    {
        return 'images/uploads/categories/' . $cover;
    }

    public function getCategoriesPostCount()
    {
        $allCategories = [];
        foreach (($this->getAllCategories()) as $category) {
            $allCategories[]=[
                'name' => $category->name,
                'id'=>$category->id,
                'count' => DB::table('posts')->where('category_id', $category->id)->count() 
            ];
        }
        return $allCategories;
    }
}
