<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_ujian',
        'total_question',
        'waktu',
        'start',
        'end',
    ];
    public function ujian(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
