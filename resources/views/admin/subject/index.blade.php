@extends('admin.template.navbar')
@section('content')
    <table class="table table-striped table-bordered">
    <tr class="text-center">
        <td>Nama Subject</td>
        <td colspan="2">Aksi</td>
    </tr>
    @foreach ($subject as $item)
        <tr class="text-center">
            <td>{{ $item['nama_subject'] }}</td>
            <td><a href="/subject-update/{{ $item['id_subject'] }}" class="nav-link">Edit</a></td>
            <td><a href="/subject-delete/{{ $item['id_subject'] }}" class="nav-link">Hapus</a></td>
        </tr>
    @endforeach
</table>
@endsection