<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjianController extends Controller
{
    public function index(){
        $data['ujian'] = Ujian::all();
        return view('admin.ujian.index')->with($data);
    }
    public function tampil_input(){
        return view('admin.ujian.input');
    }
    public function input(Request $request){
       $data['ujian'] = Ujian::create([
            'user_id'=>Auth::user()->id,
            'nama_ujian'=>$request->nama_ujian,
            'total_question'=>$request->total_question,
            'waktu'=>$request->waktu,
            'start'=>$request->start,
            'end'=>$request->end,
        ]);
        return redirect('ujian-index')->with('status','berhasil menambahkan data ujian');
    }
    public function tampil_update($id_ujian){
        $ujian['ujian'] = Ujian::where('id',$id_ujian)->get();
        return view('admin.ujian.update')->with($ujian);
    }
    public function update($id_ujian, Request $request){
        $data['ujian'] = Ujian::where('id',$id_ujian)->update([
            'user_id'=>Auth::user()->id,
            'nama_ujian'=>$request->nama_ujian,
            'total_question'=>$request->total_question,
            'waktu'=>$request->waktu,
            'start'=>$request->start,
            'end'=>$request->end,
        ]);
        return redirect('ujian-index')->with($data)->with('status','berhasil update data ujian');

    }
    public function destroy($id_ujian){
        $data = Ujian::where('id',$id_ujian);
        $data->delete();
        return redirect('ujian-index')->with('status','berhasil menghapus data ujian');
    }
    public function tampilupdatesoal($id_ujian){
        $data['ujian_soal'] = Soal::where('id_ujian',$id_ujian)->count();
        $data['soalsudahtambah'] = Soal::where('id_ujian',$id_ujian)->get();
        $question = Ujian::find($id_ujian);
        $data['total_question'] = $question['total_question'];
        $data['soal'] =  Soal::where('id_ujian')->get();
        $data['id_ujian'] = $id_ujian;
        return view('admin.ujian.input_soal')->with($data);
    }
    public function updatesoal($id_ujian,$id_soal){
        Soal::where('id_soal',$id_soal)->update([
            'id_ujian' => $id_ujian
        ]);
        return redirect('ujian-add-soal/'.$id_ujian);
    }
    public function deletesoal($id_ujian,$id_soal){
        $data = Soal::where('id_soal',$id_soal)->where('id_ujian',$id_ujian)->update([
            'id_ujian' =>null
        ]);
        return redirect('ujian-add-soal/'.$id_ujian);
    }
    public function view($id_ujian){
        $data['ujian'] = Ujian::where('id',$id_ujian)->get();
        return view('admin.ujian.view')->with($data);
    }
    public function start_ujian($id_ujian){
        $data['no'] = 1;
        $soal = Soal::where('id_ujian',$id_ujian)->paginate(1);
        $data['ujianwaktu'] = Ujian::where('id',$id_ujian)->get();
        return view('admin.ujian.start_ujian', compact('soal'))->with($data);
    }
}
