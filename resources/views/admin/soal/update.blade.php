@extends('admin.template.navbar')
@section('content')
@foreach ($soal as $soal)
<div class="container w-75">
<form action="/soal-update-real/{{ $soal['id_soal'] }}" method="post">
@csrf
<div class="form-floating mb-3">
<select name="id_subject" class="form-select" id="floatingSelect" aria-label="Floating label select example">
    @foreach ($subject as $item)
    <option @if($soal['id_subject'] == $item['id_subject']) selected @endif  value="{{ $item['id_subject'] }}">{{ $item['nama_subject'] }}</option>
    @endforeach
</select>
</div>
<div class="mb-3">
<label for="soal">Question</label>
<input type="text" name="soal" class="form-control" value="{{ $soal['soal'] }}">
</div>
<div class="mb-3">
<label for="option_a">Option A</label>
<input type="text" name="option_a" class="form-control" value="{{ $soal['option_a'] }}">
</div>
<div class="mb-3">
<label for="option_b">Option B</label>
<input type="text" name="option_b" class="form-control" value="{{ $soal['option_b'] }}">
</div>
<div class="mb-3">
<label for="option_c">Option C</label>
<input type="text" name="option_c" class="form-control" value="{{ $soal['option_c'] }}">
</div>
<div class="mb-3">
<label for="option_d">Option D</label>
<input type="text" name="option_d" class="form-control" value="{{ $soal['option_d'] }}">
</div>
<div class="mb-3">
<label for="answer">Answer</label>
<input type="text" name="answer" class="form-control" value="{{ $soal['answer'] }}">
</div>
<div class="mb-3">
<button type="submit" class="btn btn-danger mt-3">Simpan</button>
</div>
</form>
@endforeach
</div>
@endsection