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
                    <p class="card-text"><h6>Description</h6><br>{{$harambee->description}}</p>
                </li>
                @if($harambee->balance)
                    <li class="list-group-item">
                        <h6>Targeted amount : <span style="font-size: 14px;" class="badge badge-dark">{{number_format($harambee->amount)}}</span></h6>
                    </li>
                    <li class="list-group-item">
                        <h6>Balance : <span style="font-size: 14px;" class="badge badge-dark">{{number_format($harambee->balance->balance)}}</span></h6>
                    </li>
                    <li class="list-group-item">
                        <h6>Raised percentage: <span style="font-size: 14px;" class="badge badge-dark">{{(1 - ($harambee->balance->balance / $harambee->amount))*100}}%</span></h6>
                    </li>
                    <li class="list-group-item">
                        <div class="progress">
                            <div id="dynamic" class="progress-bar" role="progressbar"
                                 style="width: {{(1 - ($harambee->balance->balance / $harambee->amount))*100}}%;"
                                 aria-valuenow="25"
                                 aria-valuemin="0"
                                 aria-valuemax="100">{{(1 - ($harambee->balance->balance / $harambee->amount))*100}}%
                            </div>
                        </div>
                    </li>
                @else
                    <li class="list-group-item">
                        <h6>Balance : <span style="font-size: 14px;" class="badge badge-dark">{{number_format($harambee->amount)}}</span></h6>
                    </li>
                    <li class="list-group-item">
                        <h6>Raised percentage: <span style="font-size: 14px;" class="badge badge-dark">0%</span></h6>
                    </li>
                @endif
                <li class="list-group-item mx-auto">
                    @include('share', [
                    'url' => url('/contributors/'.$harambee->id),
                    'description' => 'This is really cool link',
                    'image' => 'http://placehold.it/300x300?text=Cool+link'
                    ])
                    {{--<a href="{{url('/contributors/'.$harambee->id)}}" class="btn btn-sm btn-default" role="button">Contribute</a>--}}
                </li>
            </ul>
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