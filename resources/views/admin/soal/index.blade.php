@extends('admin.template.navbar')
@section('content')
<table class="table table-striped table-bordered">
    <tr>
        <td>No</td>
        <td>Subject</td>
        <td>id_ujian</td>
        <td>Question</td>
        <td>Jawaban</td>
        <td>Option A</td>
        <td>Option B</td>
        <td>Option C</td>
        <td>Option D</td>
        <td>Answer</td>
        <td colspan="3">Aksi</td>
    </tr>
    <?php $no = 1; ?>
    @foreach ($soal as $item)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $item['id_subject'] }}</td>
        <td>{{ $item['id_ujian'] }}</td>
        <td>{{ $item['soal'] }}</td>
        <td>{{ $item['answer'] }}</td>
        <td>{{ $item['option_a'] }}</td>
        <td>{{ $item['option_b'] }}</td>
        <td>{{ $item['option_c'] }}</td>
        <td>{{ $item['option_d'] }}</td>
        <td>{{ $item['answer'] }}</td>
        <td><a href="/soal-update/{{ $item['id_soal'] }}" class="nav-link">Edit</a></td>
        <td><a href="/soal-delete/{{ $item['id_soal'] }}" class="nav-link">Hapus</a></td>
    </tr>
    @endforeach
</table>
@endsection
    
