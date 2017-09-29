@extends('layouts.app')

@section('content')
    <br>
    <div class="card">
        <div class="card-header text-white" id="bg-carepay">
            <h6 class="card-title">Harambee</h6>
            <button class="btn btn-info btn-sm float-right">New Harambee</button>
        </div>
        @foreach ($memberHarambees as $h)
            <div class="card-body">
                <h4 class="card-title">#{{$h->id}}</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                @if($h->balance)
                    <h5>balance : {{$h->balance}}</h5>
                @else()
                    <h5>balance : {{ $h->amount}}</h5>
                @endif()
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        @endforeach
    </div>
@endsection