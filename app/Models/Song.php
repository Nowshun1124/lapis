<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use Auth;

class Song extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'song_file_path',
        'title',
        'song_image_path',
        'lyric',
        'explanation',
        'user_id',
        'category_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function getByLimit(int $limit_count = 50){
        return $this::with(['user', 'category'])->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
