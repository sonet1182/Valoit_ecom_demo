@extends('frontend.master')

@section('content')

@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

    <div class="container" style="margin-top: 80px;">
        <div class="row">


            <div class="col-md-6 bg-light">
                <h3 class="text-center my-3">Your Order</h3>

                <div class="row my-4">
                    <div class="col">
                        <strong>PRODUCT</strong>
                    </div>
                    <div class="col">
                        <strong class="text-center">Details</strong>
                    </div>
                    <div class="col">
                        <strong class="">SUBTOTAL</strong>
                    </div>
                </div>

            @if(isset($cart_data))
                @if(Cookie::get('shopping_cart'))
                    @php $total="0" @endphp

        @foreach ($cart_data as $data)

        <div class="row my-2">
            <div class="col">
                <strong>{{ $data['item_name'] }}</strong>
            </div>
            <div class="col">
                <span>{{ $data['item_quantity'] }} x {{ number_format($data['item_price']) }} BDT</span>
            </div>
            <div class="col">
                    <span>{{ number_format($data['item_quantity'] * $data['item_price'], 0) }} BDT</span>
            </div>
        </div>


        @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp

        @endforeach

        <div class="row my-2 pb-3" style="border-bottom: 1px solid gray">
            <div class="col">
                <strong>Total: </strong>
            </div>

            <div class="col">

            </div>

            <div class="col">
                <strong>{{ number_format($total) }} BDT</strong>
            </div>
        </div>

        @endif
@endif
        <form action="{{ ('order') }}" method="POST">
            @csrf
        <label for="place"><strong>Order:</strong></label><br>
    <input type="radio" id="inside" name="place" value="Inside"> Inside
    <br><input type="radio" id="outside" name="place" value="Outside"> Outside

    <input type="hidden" name="price" value="{{ $total }}">


    <p class="pt-2">In Total: <h4 id="result"></h4></p>


            </div>

            <div class="col-md-6">
                <h3 class="text-center my-3">Billing Details</h3>

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


                    <button type="submit" class="btn btn-primary">Place Order</button>
                  </form>

            </div>




        </div>

        <script>
            let result = document.querySelector('#result');
            document.body.addEventListener('change', function (e) {
                let target = e.target;
                let message;
                switch (target.id) {
                    case 'inside':
                        message = '{{ number_format($total+50) }} BDT';
                        break;
                    case 'outside':
                        message = '{{ number_format($total+100) }} BDT';
                        break;

                }
                result.textContent = message;
            });
        </script>
    </div>

@endsection
