@extends('layouts.app')
@section('content')
@foreach ($soal as $item)
<div class="">
    <h4>{{ $item->soal }}</h4>
    <input type="radio" name="{{ $no }}" id="" value="{{ $item->option_a }}" checked>{{ $item->option_a }} <br>
    <input type="radio" name="{{ $no }}" id="" value="{{ $item->option_b }}">{{ $item->option_b }} <br>
    <input type="radio" name="{{ $no }}" id="" value="{{ $item->option_c }}">{{ $item->option_c }} <br>
    <input type="radio" name="{{ $no }}" id="" value="{{ $item->option_d }}">{{ $item->option_d }} <br>
</div>
@endforeach
<div class="">
    {{ $soal->links() }}
</div>
    @endsection