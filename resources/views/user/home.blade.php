@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-4">
        @foreach ($ujian as $item)
        <div class="col">
            <a href="/user-ujian-view/{{ $item['id'] }}" class="nav-link">
            <div class="card">
              <div class="card-body bg-light rounded p-5">
                <h3 class="text-center">{{ $item['nama_ujian'] }}</h3>
              </div>
            </div>
            </a>
        </div>
    @endforeach
    </div>
</div>
@endsection
