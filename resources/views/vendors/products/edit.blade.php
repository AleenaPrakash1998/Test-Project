@extends('layouts.vendor.dashboard')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h1 class="mb-0 fw-semibold fs-5">Update {{$product->name}}</h1>
            <p class="card-text pt-2">
                Define your project&#39;s new look. Easily set up a new product with our intuitive
                customization tool.
            </p>
        </div>
    </div>
    <form id="vendor-product-update-form" method="POST" action="{{ route('vendor-products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header fw-semibold">General</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="defaultFormControlInput"
                                   aria-describedby="defaultFormControlHelp" name="name" value="{{ old('name', $product->name) }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Banner Image</label>
                            <div class="d-flex align-items-center">
                                @if ($product->getBannerUrl())
                                    <div class="mb-2">
                                        <img src="{{ $product->getBannerUrl() }}" alt="Current Banner Image"
                                             style="height: 90px; width: 90px" id="current-banner">
                                    </div>
                                @endif
                                <div class="mb-2">
                                    <img src="#" alt="New Banner Image"
                                         style="height: 90px;  width: 90px; display:none;"
                                         id="new-banner">
                                </div>
                                <div class="ms-4">
                                    <label for="bannerFile" class="btn btn-primary mb-2">Upload new logo</label>
                                    <p class="fw-medium">Allowed JPG, JPEG, SVG or PNG.</p>
                                </div>
                                <input class="form-control" type="file" id="bannerFile" name="banner_image"
                                       onchange="readURL(this, 'new-banner', 'current-banner');" style="display: none"
                                       accept="image/png, image/jpg, image/jpeg, image/svg+xml">
                                @if ($errors->has('banner_image'))
                                    <div class="text-danger">{{ $errors->first('banner_image') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea class="form-control" id="short_description" name="short_description">{{ old('short_description', $product->short_description) }}</textarea>
                            @error('short_description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight</label>
                            <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight', $product->weight) }}">
                            @error('weight')
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

    @include('vendors.products._columns.modal.update-success-modal')
@endsection

@push('custom-scripts')

    <script>
        $(function () {
            $('#cancel-form').click(function () {
                window.location.href = "{{ route('vendor-products.index') }}";
            });

            $("#vendor-product-update-form").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 255
                    },
                    description: {
                        required: true,
                    },
                    short_description: {
                        required: true,
                    },
                    price: {
                        required: true,
                        number: true,
                    },
                    weight: {
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
                let form = $('#vendor-product-update-form');
                let formData = new FormData(form[0]);

                if (form.valid()) {
                    $.ajax({
                        url: "{{ route('vendor-products.update', $product->id) }}",
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
                                window.location.href = "{{ route('vendor-products.index') }}";
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
