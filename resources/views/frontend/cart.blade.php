@extends('frontend.master')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
 </div>
@endif

    <div class="container" style="min-height: 80vh;">

        @if (!Auth::guest())

        <div style="margin-top: 80px;">
            <h3 class="text-center">Cart Item</h3>
        </div>

        @php
            $cart = App\Models\Cart::where('user_id','=',Auth::user()->id)->get();
        @endphp

        @foreach ($cart as $data)

        <div class="card my-3">
            <div class="row">
                <div class="col-md-3 px-auto">
                    <img src="{{ asset('uploads/item/'.$data->item->photo) }}" class="mx-auto"
                  alt="" style="height: 200px!important;">
                </div>

                <div class="col-md-6 my-auto">

                    <!--Card content-->
              <div class="card-body text-center py-auto">
                <!--Category & Title-->

                <h5>
                  <strong>
                    <a href="/product" class="dark-grey-text">{{ $data->item->name }}

                    </a>
                  </strong>
                </h5>

                <h4 class="font-weight-bold blue-text">
                  Price: <strong>{{ $data->item->price }}/=</strong>
                </h4>

                <h5 class="dark-grey-text">
                    Qunatity: {{ $data->quantity }}
                  </h5>

              </div>
              <!--Card content-->
                </div>
                <div class="col-md-3 my-auto">
                    <div>
                        <a type="button" class="btn btn-warning" href="{{ url('remove_cart/'.$data->id) }}">Remove</a>
                    </div>
                </div>
            </div>

        </div>


        @endforeach

        @else

        <div class="my-auto mx-auto" style="margin-top: 80px;">
            <h3 class="text-center">Your Cart is Empty</h3>
        </div>

        @endif

    </div>




@endsection
