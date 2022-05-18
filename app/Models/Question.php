<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likeUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function unLike()
    {
        return $this->likeUsers()->detach(auth()->id());
    }

    public function like()
    {
        return $this->likeUsers()->attach(auth()->id());
    }
}
