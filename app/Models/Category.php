<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];
    
    public function songs()   
    {
        return $this->hasMany(Song::class);  
    }
    
    public function getByLimit(int $limit_count = 10){
        return $this::with(['songs'])->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getByCategory(int $limit_count = 50)
    {
        return $this->songs()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
