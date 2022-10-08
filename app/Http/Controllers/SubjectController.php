<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index(){
        $data['subject'] = Subject::all();
        return view('admin.subject.index')->with($data);
    }
    public function tampil_input(){
        return view('admin.subject.input');
    }
    public function input(Request $request){
       $data['subject'] = Subject::create([
            'nama_subject'=>$request->nama_subject
       ]);
        return redirect('subject-index')->with('status','berhasil menambahkan data subject');
    }
    public function tampil_update($id_subject){
        $subject['subject'] = Subject::where('id_subject',$id_subject)->get();
        return view('admin.subject.update')->with($subject);
    }
    public function update($id_subject, Request $request){
        $data['subject'] = Subject::where('id_subject',$id_subject)->update([
            'nama_subject'=>$request->nama_subject,
        ]);
        return redirect('subject-index')->with($data)->with('status','berhasil update data subject');

    }
    public function destroy($id_subject){
        $data = Subject::where('id_subject',$id_subject);
        $data->delete();
        return redirect('subject-index')->with('status','berhasil menghapus data subject');
    }
}
