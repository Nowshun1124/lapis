<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'body',
        'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getByLimit(int $limit_count = 10){
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
