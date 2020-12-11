<?php

namespace App\Models;

//use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'category',
        'title',
    ];

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

   // public function ownedBy(User $user)
    //{
        
   // }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
   {
       return $this->hasMany(Like::class);
   }

   public function comments()
   {
       return $this->hasMany(Comment::class);
   }

   public function comment()
   {
    return $this->belongsTo(Comment::class);
   }


}