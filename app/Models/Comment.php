<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function add($comment){
        $this->create($comment);
    }

    public function getCommentsByPostId($postId){
       return $this->where('post_id',$postId)->orderBy('created_at','desc')->get();
    }

    public function getCommentsByPostIdAndComment($postId,$status){
        return $this->where('post_id',$postId)->where('status',$status)->orderBy('created_at','desc')->get();
     }
}
