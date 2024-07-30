@extends('layouts.master')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h1 class="mb-0 fw-semibold fs-5">Update {{$vendor->name}}</h1>
            <p class="card-text pt-2">
                Define your project&#39;s new look. Easily set up a new theme with our intuitive
                customization tool.
            </p>
        </div>
    </div>
    <form id="vendor-update-form" method="POST" action="{{ route('vendors.update', $vendor->id) }}"
          enctype="multipart/form-data">
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
                                   aria-describedby="defaultFormControlHelp" name="name"
                                   value="{{ old('name', $vendor->name) }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email"
                                   aria-describedby="defaultFormControlHelp" name="email"
                                   value="{{ old('email', $vendor->email) }}">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password"
                                   aria-describedby="defaultFormControlHelp" name="password"
                                   value="{{ old('password') }}">
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password"
                                   aria-describedby="defaultFormControlHelp" name="confirm_password"
                                   value="{{ old('confirm_password') }}">
                            @error('confirm_password')
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
                        <button type="submit" class="btn btn-primary" id="submit-form">Update Vendor
                        </button>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-outline-secondary" id="cancel-form">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('pages.vendors._columns.modal.update-success-modal')
@endsection

@push('custom-scripts')
    <script>
        $(function () {

            $('#cancel-form').click(function () {
                window.location.href = "{{ route('vendors.index') }}";
            });

            $("#vendor-update-form").validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                    },
                    password: {
                        minlength: 8,
                    },
                    confirm_password: {
                        minlength: 8,
                        equalTo: "#password"
                    }
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
                let form = $('#vendor-update-form');

                let formData = new FormData(form[0]);

                if (form.valid()) {
                    $.ajax({
                        url: "{{route('vendors.update', $vendor->id)}}",
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
                                window.location.href = "{{ route('vendors.index') }}";
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

    .colorpicker-alpha {
        display: none !important;
    }

</style>
