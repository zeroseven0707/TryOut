<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoalController extends Controller
{    public function index(){
    $data['soal'] = Soal::all();
    return view('admin.soal.index')->with($data);
}
public function tampil_input(){
    $data['subject'] = Subject::all();
    return view('admin.soal.input')->with($data);
}
public function input(Request $request){
   $data['soal'] = Soal::create([
        'id_subject'=>$request->id_subject,
        'soal'=>$request->soal,
        'option_a'=>$request->option_a,
        'option_b'=>$request->option_b,
        'option_c'=>$request->option_c,
        'option_d'=>$request->option_d,
        'answer'=>$request->answer,
   ]);
    return redirect('soal-index')->with('status','berhasil menambahkan data soal');
}
public function tampil_update($id_soal){
    $data['subject'] = Subject::all();
    $data['soal'] = Soal::where('id_soal',$id_soal)->get();
    return view('admin.soal.update')->with($data);
}
public function update($id_soal, Request $request){
    $data['soal'] = Soal::where('id_soal',$id_soal)->update([
        'id_subject'=>$request->id_subject,
        'soal'=>$request->soal,
        'option_a'=>$request->option_a,
        'option_b'=>$request->option_b,
        'option_c'=>$request->option_c,
        'option_d'=>$request->option_d,
        'answer'=>$request->answer,
    ]);
    return redirect('soal-index')->with($data)->with('status','berhasil update data soal');

}
public function destroy($id_soal){
    $data = Soal::where('id_soal',$id_soal);
    $data->delete();
    return redirect('soal-index')->with('status','berhasil menghapus data soal');
}
}
