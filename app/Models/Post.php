<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getCoverAttribute($cover){
        return 'images/uploads/post/'.$cover;
    }


    public function add($post){
       return $this->create($post);
    }

    public function remove($id){
        $this->findOrFail($id)->delete();
    }

    public function getPostById($id){
        return $this->findOrFail($id);
    }

    public function getPostByCount($colum,$order,$limit){
        return $this->orderBy($colum,$order)->limit($limit)->get(); 
    }

    public function getAllPostsByUser($user){
        return $this->where('user_id',$user)->orderBy('created_at','desc')->get();
    }
    public function getAllPostsByUserAndCount($user,$count){
        return $this->where('user_id',$user)->orderBy('created_at','desc')->limit($count)->get();
    }

    public function getPostsByCategory($categoryId){
        return $this->where('category_id',$categoryId)->orderBy('created_at','desc')->get();    
    }

    // Relations

    public function getCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function getAuthor(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
