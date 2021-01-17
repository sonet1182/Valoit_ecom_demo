@extends('frontend.master')

@section('content')

    <div class="container" style="margin-top: 70px;">

        <div class="card py-3 my-auto">
            <div class="row px-5">

                @include('user.sidebar')


                <div class="card col-md-9">
                        <h3 class="text-center text-secondary">Address</h3>

                        <form action="{{ url('edit_address') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Name</label>
                                    <input type="text" class="form-control" id="inputPassword4" value="{{ Auth::user()->name }}" name="name">
                                  </div>

                              <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" value="{{ Auth::user()->email }}" disabled>
                              </div>

                            </div>
                            <div class="form-group">
                              <label for="inputAddress">Address</label>
                              <input type="text" class="form-control" id="inputAddress" value="{{ Auth::user()->address }}"  name="address">
                            </div>
                            <div class="form-group">
                              <label for="inputAddress2">Phone</label>
                              <input type="text" class="form-control" id="inputAddress2" value="{{ Auth::user()->phone }}"  name="phone">
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity" value="{{ Auth::user()->city }}" placeholder="Enter city" name="city">
                              </div>


                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                          </form>
                </div>
            </div>
        </div>

    </div>


@endsection
