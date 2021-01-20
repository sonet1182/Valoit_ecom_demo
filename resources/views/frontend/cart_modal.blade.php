<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        @if(Auth::user())

        @php $total ='0' @endphp

        @php
            $cart = App\Models\Cart::where('user_id','=',Auth::user()->id)->get();
        @endphp

        @foreach ($cart as $data)

        <div class="card my-3">
            <div class="row py-1">
                <div class="col px-auto">
                    <img src="{{ asset('uploads/item/'.$data->item->photo) }}" class="mx-auto"
                  alt="" style="height: 100px!important; width: 95px!important">
                </div>

                <div class="col my-auto">
                    <strong class="text-primary">{{ $data->item->name }}</strong><br>
                    <span>{{ $data->quantity }} x {{ number_format($data->item->price) }} BDT</span><br>
                    @php
                        $a = $data->quantity;
                        $b = $data->item->price;
                        $c = $a*$b;
                    @endphp
                    <span>= {{ number_format($c) }} BDT</span>
                </div>

                <div class="col my-auto mx-auto">
                    <div>
                        <a type="button" class="btn btn-warning" href="{{ url('remove_cart/'.$data->id) }}"><i class="far fa-trash-alt"></i></a>
                    </div>
                </div>
            </div>

        </div>

        @php
        $total = $total + $c;
        @endphp



        @endforeach

      </div>

      <div class="card py-auto">
        <p class="text-center">
            Total = {{ $total }} BDT
        </p>
      </div>

      <div class="modal-footer">


        <form action="{{ url('checkout') }}" method="POST">
            @csrf

            <input type="hidden" name="total" value="{{ $total }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <button type="submit" class="btn btn-primary">Check Out</button>

        </form>


      </div>

      @else

        <div class="my-auto"><strong class="text-center"> Your Cart is Empty!  </strong> </div>

        @endif
    </div>
  </div>
</div>

<!-- End of Modal -->
