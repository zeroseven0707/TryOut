@extends('admin.template.navbar')
@section('content')
<a href="/ujian-add" class="nav-link">
<button type="button" class="btn btn-danger">Tambah</button></a>
    <table class="table table-striped table-bordered mt-3">
    <tr class="text-center">
        <td>Nama Ujian</td>
        <td>Total Question</td>
        <td>Waktu</td>
        <td>Mulai</td>
        <td>Selesai</td>
        <td colspan="4">Aksi</td>
    </tr>
    @foreach ($ujian as $item)
        <tr class="text-center">
            <td>{{ $item['nama_ujian'] }}</td>
            <td>{{ $item['total_question'] }}</td>
            <td>{{ $item['waktu'] }}m</td>
            <td>{{ $item['start'] }}</td>
            <td>{{ $item['end'] }}</td>
            <td><a href="/ujian-add-soal/{{ $item['id'] }}" class="nav-link">Input Soal</a></td>
            <td><a href="/ujian-view/{{ $item['id'] }}" class="nav-link">View</a></td>
            <td><a href="/ujian-update/{{ $item['id'] }}" class="nav-link">Edit</a></td>
            <td><a href="/ujian-delete/{{ $item['id'] }}" class="nav-link">Hapus</a></td>
        </tr>
    @endforeach
</table>
@endsection