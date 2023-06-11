<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'translation',
        'category_id',
        'user_id',
    ];

    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('post_id', $this->id)->first() !==null;
    }
}
