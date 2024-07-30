@extends('layouts.customer.dashboard')
@section('content')
    <div>
        <div class="card">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="mb-2 px-2">
                    <h3 class="card-header">Choose Products</h3>
                    <div class="d-flex justify-content-between">
                        <div class="px-4">
                            <p>Browse through and select products to enhance your project&#39;s visual appeal.</p>
                        </div>
                    </div>
                </div>
                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="row mb-12 g-6">
                        @foreach($products as $product)
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100">
                                    <img src="{{ $product->getBannerUrl() }}" alt="Current Banner Image"
                                         style="height: 385px; width: 385px" id="current-banner">
                                    <div class="d-flex">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$product->name}}</h5>
                                            <p class="card-text">
                                                {{$product->description}}
                                            </p>
                                            <form action="{{ route('customer-products.update', $product->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-outline-primary">Add to cart
                                                </button>
                                            </form>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                {{$product->price}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    {{ $dataTable->scripts() }}
    <script>
        function showDeleteModal(url) {
            document.getElementById('deleteForm').action = url;

            let myModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            myModal.show();
        }
    </script>
@endpush

