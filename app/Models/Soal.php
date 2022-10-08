<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ujian',
        'id_subject',
        'soal',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'answer',
    ];
    public function ujian(){
        return $this->belongsTo(Ujian::class,'id_ujian','id');
    }
}
