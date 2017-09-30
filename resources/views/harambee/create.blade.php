@extends('layouts.app')
@section('content')
    <br>
    <section>
        <div class="card">
            <div class="card-header text-white" id="bg-carepay">
                Harambee Details
            </div>
            <div class="card-body">
                <form method="post" action="/harambee" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" name="phoneNumber" aria-describedby="" placeholder="Enter phone number" required>
                        {{--<small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                    </div>
                    <div class="form-group">
                        <label for="description">Harambee description</label>
                        <textarea type="text" class="form-control" name="description" placeholder="" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Harambee photo</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/x-png,image/gif,image/jpeg" />
                    </div>
                    <div> <input type="hidden" name="user_id" value="1"> </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
    <br>
@endsection