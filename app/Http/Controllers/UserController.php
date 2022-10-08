<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        $data['ujian'] = Ujian::all();
        return view('user.home')->with($data);
    }
    public function view($id){
        $data['ujian'] = Ujian::find($id);
        return view('user.view')->with($data);
    }
    public function start($id){
        $data['no'] = 1;
        $soal = Soal::where('id_ujian',$id)->paginate(1);
        $data['ujianwaktu'] = Ujian::where('id',$id)->get();
        return view('user.start_ujian', compact('soal'))->with($data);
    }
}
