@extends('admin.template.navbar')
@section('content')
@foreach ($ujian as $item)    
<script>
    CountDownTimer('{{$item['start']}}', 'countdown');
    function CountDownTimer(dt, id)
    {
        var end = new Date('{{$item['end']}}');
        var start = new Date('{{$item['start']}}');
        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;
        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            var mulai = start - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById(id).innerHTML = '<div class="text-center"><b>TUGAS SUDAH BERAKHIR</b></div>';
                return;
            }
            else if(now <= start ){
            var days = Math.floor(mulai / _day);
            var hours = Math.floor((mulai % _day) / _hour);
            var minutes = Math.floor((mulai % _hour) / _minute);
            var seconds = Math.floor((mulai % _minute) / _second);

            document.getElementById(id).innerHTML = days + 'hari ';
            document.getElementById(id).innerHTML += hours + ':';
            document.getElementById(id).innerHTML += minutes + ':';
            document.getElementById(id).innerHTML += seconds;
            document.getElementById(id).innerHTML +='<h5 class="text-center">Ujian Belum Dimulai</h5><div class="bg-secondary rounded-top "><div class="card-body p-5"><h4 class="card-title text-center">{{ $item['nama_ujian'] }}</h4></div></div><a href="/ujian-start/{{ $item['id'] }}" class="nav-link disabled"><div class="bg-danger rounded-bottom p-2"><h4>Start</h4></div></a>';
            return;
            }
            else if(now >= start){
                var days = Math.floor(distance / _day);
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);
    
                document.getElementById(id).innerHTML = days + 'hari ';
                document.getElementById(id).innerHTML += hours + ':';
                document.getElementById(id).innerHTML += minutes + ':';
                document.getElementById(id).innerHTML += seconds;
                document.getElementById(id).innerHTML +='<div class="bg-secondary rounded-top "><div class="card-body p-5"><h4 class="card-title text-center">{{ $item['nama_ujian'] }}</h4></div></div><a href="/ujian-start/{{ $item['id'] }}" class="nav-link"><div class="bg-danger rounded-bottom p-2"><h4>Start</h4></div></a>';
            }
        }
        timer = setInterval(showRemaining, 1000);
    }
</script>
<div class="container w-50">
<div class="text-center">
    <p id="countdown"></p>
</div>
</div>        
@endforeach
@endsection