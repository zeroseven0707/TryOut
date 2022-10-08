@extends('admin.template.navbar')
@section('content')

<table class="table table-striped">
    @if ($ujian_soal == 0)
    <h5 class="text-center">belum ada soal yang ditambahkan</h5>
    @elseif ($ujian_soal >= 1)
    @foreach ($soalsudahtambah as $item)      
    <form action="/ujian-delete-soal/{{ $id_ujian }}/{{ $item['id_soal'] }}" method="post">
        @csrf
        <tr>
            <td class="w-100">{{ $item['soal'] }}</td>
            <td><button type="submit" class="btn btn-danger mt-3">-</button></td>
        </tr>
        </form>
    @endforeach
    @endif
</table>
@if ($ujian_soal == $total_question)

    @elseif ($ujian_soal <= $total_question)
    <h5 class="text-center mt-5">Tambah Soal</h5>
@endif
<table class="table table-striped mt-5">
    @foreach ($soal as $item)
    <form action="/ujian-add-soal/{{ $id_ujian }}/{{ $item['id_soal'] }}" method="post">
        @csrf
        <tr>
            <td class="w-100">{{ $item['soal'] }}</td>
            @if ($ujian_soal == $total_question)
        <td><button type="submit" class="btn btn-danger disabled mt-3">+</button></td>
            @elseif ($ujian_soal <= $total_question )
        <td><button type="submit" class="btn btn-danger mt-3">+</button></td>
        @endif
    </tr>
    </form>
    @endforeach
</table>
@endsection
