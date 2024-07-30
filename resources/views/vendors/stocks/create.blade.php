@extends('layouts.vendor.dashboard')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h1 class="mb-0 fw-semibold fs-5">Create Stock</h1>
            <p class="card-text pt-2">
                Define your project&#39;s new look. Easily set up a new product with our intuitive
                customization tool.
            </p>
        </div>
    </div>
    <form id="vendor-product-store-form" method="POST" action="{{ route('vendor-stocks.store') }}"
          enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header fw-semibold">General</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                   value="{{ old('quantity') }}">
                            @error('quantity')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_id" class="form-label">Vendor</label>
                            <div class="form-group">
                                <select class="form-control" id="product_id" name="product_id">
                                    <option value="" disabled selected>Select a Product</option>
                                    @foreach($products as $product)
                                        <option
                                            value="{{ $product->id }}" {{ old('vendor_id') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('vendor_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-text alert bg-primary">
                    <p class="card-text pt-2">Review your theme settings before saving changes. Ensure everything looks
                        perfect for
                        your project&#39;s new aesthetic.
                    </p>
                </div>
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <div class="form-check form-switch mb-2">
                        </div>
                    </div>
                    <div class="col-auto me-3">
                        <button type="submit" class="btn btn-primary" id="submit-form">Add Quantity</button>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-outline-secondary" id="cancel-form">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('vendors.stocks._columns.modal.success-modal')
@endsection

@push('custom-scripts')

    <script>
        $(function () {
            $('#cancel-form').click(function () {
                window.location.href = "{{ route('vendor-stocks.index') }}";
            });

            $('#product_id').select2({
                placeholder: "Select a Product",
                allowClear: true
            });

            $("#vendor-product-store-form").validate({
                rules: {
                    quantity: {
                        number: true,
                        required: true,
                    },
                    product_id: {
                        required: true,
                    },
                },
                errorPlacement: function (error, element) {
                    if (error.text() === "" && element.hasClass('select2-hidden-accessible')) {
                        element.next('.select2-container').removeClass('is-invalid');
                        element.next('.select2-container').addClass('is-valid');
                    } else {
                        if (element.hasClass('js-example-basic-multiple')) {
                            error.insertAfter(element.next('.select2-container'));
                        } else {
                            error.insertAfter(element);
                        }
                    }
                }
            });

            $('#submit-form').click(function (event) {
                event.preventDefault();
                let form = $('#vendor-product-store-form');

                let formData = new FormData(form[0]);

                if (form.valid()) {
                    $.ajax({
                        url: "{{ route('vendor-stocks.store') }}",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function (response) {
                            $('#successModal').modal('show');

                            $('#successModal .btn-close, #successModal .btn-primary').on('click', function () {
                                $('#successModal').modal('hide');
                                window.location.href = "{{ route('vendor-stocks.index') }}";
                            });
                        },
                        error: function (xhr, textStatus, errorThrown) {
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function (field, errors) {
                                    $('input[name="' + field + '"]').closest('.mb-3').append('<div class="text-danger">' + errors.join('<br>') + '</div>');
                                });
                            } else {
                                console.log('Error:', errorThrown);
                            }
                        }
                    });
                }
            });
        });

    </script>
@endpush

<style>
    .select2-container--default .select2-selection--multiple {
        border-color: #d9dee3 !important;
    }

    .input-group-addon {
        padding: 0.75rem !important;
    }

</style>


{{--@extends('layouts.vendor.dashboard')--}}
{{--@section('content')--}}
{{--    <div class="card mb-4">--}}
{{--        <div class="card-body">--}}
{{--            <h1 class="mb-0 fw-semibold fs-5">Set your new product</h1>--}}
{{--            <p class="card-text pt-2">--}}
{{--                Define your project&#39;s new look. Easily set up a new product with our intuitive--}}
{{--                customization tool.--}}
{{--            </p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <form id="vendor-product-store-form" method="POST" action="{{ route('vendor-stocks.store') }}"--}}
{{--          enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="card mb-4">--}}
{{--                    <h5 class="card-header fw-semibold">General</h5>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="quantity" class="form-label">Quantity</label>--}}
{{--                            <input type="number" class="form-control" id="quantity" name="quantity"--}}
{{--                                   value="{{ old('quantity') }}">--}}
{{--                            @error('quantity')--}}
{{--                            <div class="text-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="product_id" class="form-label">Vendor</label>--}}
{{--                            <div class="form-group">--}}
{{--                                <select class="form-control" id="product_id" name="product_id">--}}
{{--                                    <option value="" disabled selected>Select a Product</option>--}}
{{--                                    @foreach($products as $product)--}}
{{--                                        <option value="{{ $product->id }}" {{ old('vendor_id') == $product->id ? 'selected' : '' }}>--}}
{{--                                            {{ $product->name }}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            @error('vendor_id')--}}
{{--                            <div class="text-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="card mb-4">--}}
{{--            <div class="card-body">--}}
{{--                <div class="card-text alert bg-primary">--}}
{{--                    <p class="card-text pt-2">Review your theme settings before saving changes. Ensure everything looks perfect for--}}
{{--                        your project&#39;s new aesthetic.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="d-flex align-items-center">--}}
{{--                    <div class="me-auto">--}}
{{--                        <div class="form-check form-switch mb-2">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-auto me-3">--}}
{{--                        <button type="submit" class="btn btn-primary" id="submit-form">Add Quantity</button>--}}
{{--                    </div>--}}
{{--                    <div class="col-auto">--}}
{{--                        <button type="button" class="btn btn-outline-secondary" id="cancel-form">Cancel</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

{{--    @include('vendors.stocks._columns.modal.success-modal')--}}
{{--@endsection--}}

{{--@push('custom-scripts')--}}

{{--    <script>--}}
{{--        $(function () {--}}
{{--            $('#product_id').select2({--}}
{{--                placeholder: "Select a Product",--}}
{{--                allowClear: true--}}
{{--            });--}}

{{--            $('#cancel-form').click(function () {--}}
{{--                window.location.href = "{{ route('vendor-stocks.index') }}";--}}
{{--            });--}}

{{--            $("#vendor-product-store-form").validate({--}}
{{--                rules: {--}}
{{--                    quantity: {--}}
{{--                        number: true,--}}
{{--                        required: true,--}}
{{--                    },--}}
{{--                    product_id: {--}}
{{--                        required: true,--}}
{{--                    },--}}
{{--                },--}}
{{--                errorPlacement: function (error, element) {--}}
{{--                    if (element.hasClass('select2-hidden-accessible')) {--}}
{{--                        error.insertAfter(element.next('.select2-container'));--}}
{{--                    } else {--}}
{{--                        error.insertAfter(element);--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}

{{--            $('#submit-form').click(function (event) {--}}
{{--                event.preventDefault();--}}
{{--                let form = $('#vendor-product-store-form');--}}

{{--                let formData = new FormData(form[0]);--}}

{{--                if (form.valid()) {--}}
{{--                    $.ajax({--}}
{{--                        url: "{{ route('vendor-stocks.store') }}",--}}
{{--                        type: 'POST',--}}
{{--                        headers: {--}}
{{--                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),--}}
{{--                        },--}}
{{--                        processData: false,--}}
{{--                        contentType: false,--}}
{{--                        data: formData,--}}
{{--                        success: function (response) {--}}
{{--                            $('#successModal').modal('show');--}}

{{--                            $('#successModal .btn-close, #successModal .btn-primary').on('click', function () {--}}
{{--                                $('#successModal').modal('hide');--}}
{{--                                window.location.href = "{{ route('vendor-stocks.index') }}";--}}
{{--                            });--}}
{{--                        },--}}
{{--                        error: function (xhr, textStatus, errorThrown) {--}}
{{--                            if (xhr.responseJSON && xhr.responseJSON.errors) {--}}
{{--                                $.each(xhr.responseJSON.errors, function (field, errors) {--}}
{{--                                    $('input[name="' + field + '"]').closest('.mb-3').append('<div class="text-danger">' + errors.join('<br>') + '</div>');--}}
{{--                                });--}}
{{--                            } else {--}}
{{--                                console.log('Error:', errorThrown);--}}
{{--                            }--}}
{{--                        }--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
