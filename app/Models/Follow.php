<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    
    protected $primaryKey = ['follow_id', 'followed_id'];
    
    protected $fillable = ['follow_id', 'followed_id'];
    
    public $timestamps = false;
    
    public $incrementing = false;

}
