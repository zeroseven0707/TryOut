@extends('admin.template.navbar')
@section('content')
<div class="container w-75">
@foreach ($subject as $item)
<form action="/subject-update-real/{{ $item['id_subject'] }}" method="post">
@csrf
<label for="nama_ujian">Nama</label>
<input type="text" name="nama_subject" class="form-control" value="{{ $item['nama_subject'] }}">
<button type="submit" class="btn btn-danger mt-3">Simpan</button>
</form>
</div>
@endforeach
@endsection