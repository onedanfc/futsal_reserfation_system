@extends('role.member.layout.sidebar')
@section('sidebar')
<div class="container-fluid">
    @foreach ($ticket as $t)
    <div class="containerticket">
        <div class="containerticket1">
            {{ $t['namalapangan'] }}
            <p style="font-size: 12px">Lapangan {{ $t['lapangan'] }}</p>    
        </div>
        <div class="containerticket2">
            Hari<br>
            @if($t['hari']=='a')
            Senin
            @elseif($t['hari']=='b')
            Selasa
            @elseif($t['hari']=='c')
            Rabu
            @elseif($t['hari']=='d')
            Kamis
            @elseif($t['hari']=='e')
            Jum'at
            @elseif($t['hari']=='f')
            Sabtu
            @elseif($t['hari']=='g')
            Minggu    
            @endif
            <br>
            Pukul {{ $t['jam'] }}.00 
        </div>
    </div>
    @endforeach
    {{ $ticket->links() }}
</div>
@endsection