@extends('admin.template.navbar')
@section('content')
<form action="/ujian-add-real" method="post">
@csrf
<label for="nama_ujian">Nama Ujian</label>
<input type="text" name="nama_ujian" class="form-control">
<label for="nama_ujian">Total Question</label>
<input type="text" name="total_question" class="form-control">
<label for="waktu">Waktu</label>
<input type="number" name="waktu" class="form-control">
<label for="start">Start</label>
<input type="datetime-local" name="start" class="form-control">
<label for="end">End</label>
<input type="datetime-local" name="end" class="form-control">
<button type="submit" class="btn btn-danger mt-3">Simpan</button>
</form>
@endsection
