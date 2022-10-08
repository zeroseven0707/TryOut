<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function index($id_soal,$id_ujian){
        $data['id_soal'] = $id_soal;
        $data['id_ujian'] = $id_ujian;
        $data['jawaban'] =  Jawaban::where('id_soal',$id_soal)->get();
        return view('admin.jawaban.index')->with($data);
    }
    public function tampil_input($id_soal){
        $data['id_soal'] = $id_soal;
        return view('admin.jawaban.input')->with($data);
    }
    public function input($id_soal, Request $request){
        $data['id_soal'] = $id_soal;
       $data['jawaban'] =  Jawaban::create([
            'id_soal'=>$id_soal,
            'jawaban'=>$request->jawaban,
        ]);
        return redirect('jawaban-index/'.$id_soal)->with('status','berhasil menambahkan data jawaban');
    }
    public function tampil_update($id_soal,$id){
        $data['id_soal'] = $id_soal;
        $data['data'] =  Jawaban::where('id',$id)->get();
        return view('admin.jawaban.update')->with($data);
    }
    public function update($id_soal, Request $request){
        $data['jawaban'] =  Jawaban::where('id_soal',$id_soal);
        $data['jawaban']->update([
            'jawaban'=>$request->jawaban,
        ]);
        return redirect('jawaban-index')->with($data)->with('status','berhasil update data jawaban');
    }
    public function destroy($id,$id_soal){
        $data = Jawaban::where('id',$id);
        $data->delete();
        return redirect('jawaban-index/'.$id_soal)->with('status','berhasil menghapus data jawaban');
    }
}
