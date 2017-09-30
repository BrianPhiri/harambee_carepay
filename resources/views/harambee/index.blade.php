@extends('layouts.app')

@section('content')
    <br>
    @foreach ($memberHarambees as $harambee)
        <div class="card">
            <div class="card-header text-white" id="bg-carepay">
                Harambee #{{$harambee->id}}
                @if($loop->index == 0)
                    <a class="btn btn-info btn-sm float-right" role="button" href="{{ url('harambee/create') }}">New
                        Harambee</a>
                @endif
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <p class="card-text">{{$harambee->description}}</p>
                </li>
                @if($harambee->balance)
                    <li class="list-group-item">
                        <h5>Balance : {{$harambee->balance->balance}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h6>Raised percentage: {{(1 - ($harambee->balance->balance / $harambee->amount))*100}}%</h6>
                    </li>
                    <li class="list-group-item">
                        <div class="progress">
                            <div id="dynamic" class="progress-bar" role="progressbar"
                                 style="width: {{1 - ($harambee->balance->balance / $harambee->amount)}};"
                                 aria-valuenow="25"
                                 aria-valuemin="0"
                                 aria-valuemax="100">{{(1 - ($harambee->balance->balance / $harambee->amount))*100}}%
                            </div>
                        </div>
                    </li>
                @else
                    <li class="list-group-item">
                        <h5>Balance : {{ $harambee->amount}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h6>Raised percentage: 0%</h6>
                    </li>
                @endif
                <li class="list-group-item mx-auto">
                    @include('share', ['url' => 'https://5b139d5b.ngrok.io/contributors/'.$harambee->id])
                </li>
                {{--<li class="list-group-item">Dapibus ac facilisis in</li>--}}
                {{--<li class="list-group-item">Vestibulum at eros</li>--}}
            </ul>
            {{--<div class="card-body mx-auto">--}}
            {{--<p class="card-text">{{$harambee->description}}</p>--}}
            {{--@include('share', ['url' => 'https://5b139d5b.ngrok.io/contributors/'.$harambee->id])--}}
            {{--</div>--}}
        </div>
        <br>
    @endforeach
@endsection
@section('scripts')
    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--$(function () {--}}
    {{--var current_progress = 0;--}}
    {{--var interval = setInterval(function () {--}}
    {{--current_progress += 1;--}}
    {{--$("#dynamic")--}}
    {{--.css("width", current_progress + "%")--}}
    {{--.attr("aria-valuenow", current_progress)--}}
    {{--.text(current_progress + "% Complete");--}}
    {{--if (current_progress >= 100)--}}
    {{--clearInterval(interval);--}}
    {{--}, 1000);--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}
@endsection