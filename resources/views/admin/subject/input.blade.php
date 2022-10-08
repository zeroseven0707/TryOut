@extends('admin.template.navbar')
@section('content')
<div class="container w-75">
<form action="{{ url('subject-add-real') }}" method="post">
@csrf
<label for="nama_ujian">Nama Subject</label>
<input type="text" name="nama_subject" class="form-control mt-3">
<button type="submit" class="btn btn-danger mt-3">Simpan</button>
</form>
@endsection
</div>