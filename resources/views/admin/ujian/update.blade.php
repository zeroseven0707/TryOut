@extends('admin.template.navbar')
@section('content')
@foreach ($ujian as $ujian)
<form action="/ujian-update-real/{{ $ujian['id'] }}" method="post">
@csrf
<label for="nama_ujian">Nama Ujian</label>
<input type="text" name="nama_ujian" value="{{ $ujian['nama_ujian'] }}" class="form-control">
<label for="nama_ujian">Total Question</label>
<input type="text" name="total_question" value="{{ $ujian['total_question'] }}" class="form-control">
<label for="waktu">Waktu</label>
<input type="number" name="waktu" value="{{ $ujian['waktu'] }}" class="form-control">
<label for="start">Start</label>
<input type="datetime-local" name="start" value="{{ $ujian['start'] }}" class="form-control">
<label for="end">End</label>
<input type="datetime-local" name="end" value="{{ $ujian['end'] }}" class="form-control">
<button type="submit" class="btn btn-danger mt-3">Simpan</button>
</form>
@endforeach
@endsection
