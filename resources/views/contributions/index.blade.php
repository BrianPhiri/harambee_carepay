@extends('layouts.app')
@section('content')
    <header class="masthead">
        <div class="overlay">
            <div class="container">
                <h5 class="text-white">Contributions</h5>
                <h6 class="text-white">Donate for a good course</h6>
            </div>
        </div>
    </header>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form class="mx-auto" method="post" action="/contributors">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" cols="15" rows="5" readonly>{{$member_request->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                               placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Contribution amount">
                    </div>
                    <div>
                        <input type="hidden" name="member_id" value="{{$member_request->id}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Contribute</button>
                </form>
            </div>
        </div>
    </div>
@endsection