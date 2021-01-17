@extends('frontend.master')

@section('content')

    <div class="container" style="margin-top: 70px; height: 70vh">

        <div class="card py-3 my-auto">
            <div class="row px-5">
                <div class="card col-md-3">
                    <div style="border-bottom: 2px solid gray">

                        <h3 class="text-secondary text-center py-2"><i class="text-large fas fa-user"></i><br>{{ Auth::user()->name }}</h3>
                    </div>

                    <div class="">
                        <ul class="list-group py-2">
                            <li class="list-group-item disabled card">
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</div>
                                </a>
                            </li>
                            <li class="list-group-item disabled card">
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i>&nbsp; Orders</div>
                                </a>
                            </li>
                            <li class="list-group-item disabled card">
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-file-download"></i>&nbsp; Downloads</div>
                                </a>
                            </li>
                            <li class="list-group-item disabled card">
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i>&nbsp; Address</div>
                                </a>
                            </li>
                            <li class="list-group-item disabled card">
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i>&nbsp; Account Details</div>
                                </a>
                            </li>
                          </ul>
                    </div>

                </div>


                <div class="card col-md-9">
                        <h3 class="text-center text-secondary">Account Details</h3>
                </div>
            </div>
        </div>

    </div>


@endsection
