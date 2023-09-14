<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Auth;

class Donation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'money',
        'message'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
