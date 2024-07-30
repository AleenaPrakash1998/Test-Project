@extends('layouts.vendor.dashboard')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h1 class="mb-0 fw-semibold fs-5">Update {{$product->name}} stock</h1>
            <p class="card-text pt-2">
                Define your project&#39;s new look. Easily set up a new product with our intuitive
                customization tool.
            </p>
        </div>
    </div>
    <form id="vendor-stock-update-form" method="POST" action="{{ route('vendor-stocks.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header fw-semibold">General</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}">
                            @error('quantity')
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
                        <button type="submit" class="btn btn-primary" id="submit-form">Update Product</button>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-outline-secondary" id="cancel-form">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('vendors.stocks._columns.modal.update-success-modal')
@endsection

@push('custom-scripts')

    <script>
        $(function () {
            $('#cancel-form').click(function () {
                window.location.href = "{{ route('vendor-stocks.index') }}";
            });

            $("#vendor-stock-update-form").validate({
                rules: {
                    quantity: {
                        required: true,
                        number: true,
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
                let form = $('#vendor-stock-update-form');
                let formData = new FormData(form[0]);

                if (form.valid()) {
                    $.ajax({
                        url: "{{ route('vendor-stocks.update', $product->id) }}",
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
                                    let fieldElement = $('input[name="' + field + '"], select[name="' + field + '"], textarea[name="' + field + '"]');
                                    fieldElement.closest('.mb-3').find('.text-danger').remove();
                                    fieldElement.after('<div class="text-danger">' + errors.join('<br>') + '</div>');
                                });
                            } else {
                                console.log('Error:', errorThrown);
                            }
                        }
                    });
                }
            });
        });

        function readURL(input, newImgID, currentImgID) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#' + newImgID).attr('src', e.target.result).show();
                    $('#' + currentImgID).hide();
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

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
