@extends('admin.template.navbar')
@section('content')
<div class="container w-75">
<form action="/soal-add-real" method="post">
@csrf
<div class="form-floating mb-3">
<select name="id_subject" class="form-select" id="floatingSelect" aria-label="Floating label select example">
    <option value="">Pilih Subject</option>
    @foreach ($subject as $item)
    <option value="{{ $item['id_subject'] }}">{{ $item['nama_subject'] }}</option>
    @endforeach
</select>
</div>
<div class="mb-3">
<label for="soal">Question</label>
<input type="text" name="soal" class="form-control">
</div>
<div class="mb-3">
<label for="option_a">Option A</label>
<input type="text" name="option_a" class="form-control">
</div>
<div class="mb-3">
<label for="option_b">Option B</label>
<input type="text" name="option_b" class="form-control">
</div>
<div class="mb-3">
<label for="option_c">Option C</label>
<input type="text" name="option_c" class="form-control">
</div>
<div class="mb-3">
<label for="option_d">Option D</label>
<input type="text" name="option_d" class="form-control">
</div>
<div class="mb-3">
<label for="answer">Answer</label>
<input type="text" name="answer" class="form-control">
</div>
<div class="mb-3">
<button type="submit" class="btn btn-danger mt-3">Simpan</button>
</div>
</form>
</div>
@endsection