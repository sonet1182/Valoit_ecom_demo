@extends('frontend.master')

@section('content')

<div class="container" style="margin-top: 70px; min-height: 70vh;">

    <div>
        <h3>Checkout</h3>
        <p>Thank You! Your Order has been received.</p>
        <div class="card py-2 bg-light">


        <div class="row">
            <div class="col ml-5"><strong>Order Id</strong></div>
            <div class="col"><strong>Name</strong></div>
            <div class="col"><strong>Address</strong></div>
            <div class="col"><strong>Phone</strong></div>
            <div class="col"><strong>Total</strong></div>
            <div class="col"><strong>Place</strong></div>
        </div>

        @foreach ($order as $item)
            <div class="row">

                <div class="col ml-5">

                    <p>{{ $item->id }}</p>
                </div>

                <div class="col">

                    <p>{{ Auth::user()->name }}</p>
                </div>

                <div class="col">

                    <p>{{ $item->address }}</p>
                </div>

                <div class="col">

                    <p>{{ $item->phone }}</p>
                </div>

                <div class="col">

                    <p>{{ $item->price }}</p>
                </div>

                <div class="col">

                    <p>{{ $item->place }}</p>
                </div>


            </div>
        @endforeach

        </div>
    </div>



</div>



@endsection
