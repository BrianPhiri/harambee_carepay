@extends('layouts.app')
@section('content')
    <br>
    <section>
        <div class="card">
            <div class="card-header text-white" id="bg-carepay">
                <h6 class="card-title">Harambee Details</h6>
            </div>
            <div class="card-body">
                <form method="post" action="/api/members" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" name="phoneNumber" aria-describedby="" placeholder="Enter phone number">
                        {{--<small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                    </div>
                    <div class="form-group">
                        <label for="description">Harambee description</label>
                        <textarea type="text" class="form-control" name="description" placeholder="" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount">
                    </div>
                    <div class="form-group">
                        <label for="photo">Harambee photo</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div> <input type="hidden" name="user_id" value="1"> </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection