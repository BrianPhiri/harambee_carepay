@extends('layouts.app')
@section('content')
    <br>
    <section>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Details</h4>
                <form>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" aria-describedby="" placeholder="Enter phone number">
                        {{--<small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                    </div>
                    <div class="form-group">
                        <label for="description">Harambee description</label>
                        <textarea type="text" class="form-control" id="description" placeholder="" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount">
                    </div>
                    <div class="form-group">
                        <label for="photo">Harambee photo</label>
                        <input type="file" class="form-control" id="photo" name="photo_upload">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection