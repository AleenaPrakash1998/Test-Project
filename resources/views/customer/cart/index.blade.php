@extends('layouts.customer.dashboard')
@section('content')
    <div>
        <div class="card">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="mb-2 px-2">
                    <h3 class="card-header">Your cart</h3>
                    <div class="d-flex justify-content-between">
                        <div class="px-4">
                            <p>Browse through and select products to enhance your project&#39;s visual appeal.</p>
                        </div>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row mb-12 g-6">
                        <div class="container">
                            @if($cartItems->isEmpty())
                                <p>Your cart is empty.</p>
                            @else
                                <div class="row mb-12 gap-3">
                                    @foreach($cartItems as $item)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="card h-100">
                                                <img src="{{ $item->product->getBannerUrl() }}"
                                                     alt="Current Banner Image"
                                                     style="height: 385px; width: 385px" id="current-banner">
                                                <div class="d-flex">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $item->product->name }}</h5>
                                                        <p class="card-text">
                                                            {{ $item->product->description }}
                                                        </p>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text">
                                                            {{ $item->product->price }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


