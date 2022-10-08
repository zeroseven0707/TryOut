@extends('admin.template.navbar')
@section('content')
@foreach ($soal as $item)
<script>
    var start = new date();
    CountDownTimer( start,'countdown');
    function CountDownTimer(dt, id)
    {
        var end = new minutes('{{$item['waktu']}}');
        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;
        function showRemaining() {
            var now = new minutes();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById(id).innerHTML = '<div class="text-center"><b>UJIAN SUDAH BERAKHIR</b></div>';
                return;
            }
                var days = Math.floor(distance / _day);
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);
    
                document.getElementById(id).innerHTML = days + 'hari ';
                document.getElementById(id).innerHTML += hours + ':';
                document.getElementById(id).innerHTML += minutes + ':';
                document.getElementById(id).innerHTML += seconds;
                document.getElementById(id).innerHTML +='<div class=""><h4>{{ $item->soal }}</h4><input type="radio" name="{{ $no }}" id="" value="{{ $item->option_a }}" checked>{{ $item->option_a }} <br><input type="radio" name="{{ $no }}" id="" value="{{ $item->option_b }}">{{ $item->option_b }} <br><input type="radio" name="{{ $no }}" id="" value="{{ $item->option_c }}">{{ $item->option_c }} <br><input type="radio" name="{{ $no }}" id="" value="{{ $item->option_d }}">{{ $item->option_d }} <br></div><div class=""> @endforeach {{ $soal->links() }}</div>';
            }
        }
        timer = setInterval(showRemaining, 1000);
</script>
<div id="countdown">

</div>
@endsection