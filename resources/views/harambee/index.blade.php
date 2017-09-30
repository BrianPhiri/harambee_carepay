@extends('layouts.app')

@section('content')
    <br>
    <div class="card">
        <div class="card-header text-white" id="bg-carepay">
            Harambee
            <a class="btn btn-info btn-sm float-right" role="button" href="{{ url('harambee/create') }}">New Harambee</a>
        </div>
        @foreach ($memberHarambees as $harambee)
            <div class="card-body">
                <h4 class="card-title">#{{$harambee->id}}</h4>
                <p class="card-text">{{$harambee->description}}</p>
                @if($harambee->balance)
                    <h5>Balance : {{$harambee->balance->balance}}</h5>
                @else()
                    <h5>Balance : {{ $harambee->amount}}</h5>
                @endif()
                @include('share', ['url' => 'https://5b139d5b.ngrok.io/contributors/'.$harambee->id])
            </div>
        @endforeach
    </div>
@endsection