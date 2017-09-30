@extends('layouts.app')
@section('content')
    <header class="masthead" style="background-image: url('{{Storage::disk('local')->url($member_request->image)}}');">
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
                <form id="needs-validation" class="mx-auto" method="post" action="/contributors">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" cols="15" rows="5"
                                  readonly>{{$member_request->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Targeted Amount</label>
                        <input id="amount" type="text" class="form-control" readonly
                               value="{{$member_request->amount}}">
                    </div>
                    <div class="form-group">
                        <label for="">Contributed Amount</label>
                        <input id="contributed" type="text" class="form-control" readonly value="">
                    </div>
                    <div class="form-group">
                        <label for="">Remaining Amount</label>
                        <input id="balance" type="text" class="form-control" readonly
                               value="{{$member_request->balance ? $member_request->balance: $member_request->amount}}">
                    </div>
                    @if($member_request->balance)
                        <div class="form-group">
                            <div class="progress">
                                <div id="dynamic" class="progress-bar" role="progressbar"
                                     style="width: {{(1 - ($member_request->balance->balance / $member_request->amount))*100}}%;"
                                     aria-valuenow="25"
                                     aria-valuemin="0"
                                     aria-valuemax="100">{{(1 - ($member_request->balance->balance / $member_request->amount))*100}}
                                    %
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                               placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="contributed_amount" name="amount"
                               placeholder="Contribution amount">
                    </div>
                    <div>
                        <input type="hidden" name="member_id" value="{{$member_request->id}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Contribute</button>
                </form>
            </div>
        </div>
    </div>
    <br>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            var amt = $('#amount').val();
            var balance = $('#balance').val();
            var contribute = amt - balance;
            $('#contributed').val(contribute);
        });
    </script>
@endsection