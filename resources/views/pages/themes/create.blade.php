@extends('layouts.master')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h1 class="mb-0 fw-semibold fs-5">Set your new theme</h1>
            <p class="card-text pt-2">
                Define your project&#39;s new look. Easily set up a new theme with our intuitive
                customization tool.
            </p>
        </div>
    </div>
    <form id="theme-store-form" method="POST" action="{{ route('themes.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header fw-semibold">General</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="defaultFormControlInput"
                                   aria-describedby="defaultFormControlHelp" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Theme logo</label>
                            <input class="form-control" type="file" id="logFile" name="logo" value="{{ old('logo') }}"
                                   accept="image/png, image/jpg, image/jpeg, image/svg">
                            @if ($errors->has('logo'))
                                <div class="text-danger">{{ $errors->first('logo') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Banner Image</label>
                            <input class="form-control" type="file" id="bannerFile" name="banner_image"
                                   value="{{ old('banner_image') }}"
                                   accept="image/png, image/jpg, image/jpeg, image/svg">
                            @if ($errors->has('banner_image'))
                                <div class="text-danger">{{ $errors->first('banner_image') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Menu</label>
                            <div class="form-group">
                                <select class="js-example-basic-multiple form-control" multiple data-allow-clear="1"
                                        id="select2"
                                        name="menu_name[]">
                                    @foreach(\App\Enums\ThemeMenu::cases() as $menu)
                                        <option
                                            value="{{ $menu->value }}" {{ in_array($menu->value, old('menu_name', [])) ? 'selected' : '' }}>
                                            {{ $menu->label() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('menu_name'))
                                <div class="text-danger">{{ $errors->first('menu_name') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card mb-4" style="padding-bottom: 91px!important;">
                    <h5 class="card-header fw-semibold">Button Colors</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <div>
                                <label for="colorPicker" class="form-label">Primary</label>
                            </div>
                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component">
                                    <input id="primary-color-picker" type="text" class="form-control"
                                           name="button_primary" value="{{ old('button_primary') }}"/>
                                    <span class="input-group-addon position-absolute end-0"><i
                                            class='bx bx-color'></i></span>
                                </div>
                                @error('button_primary')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="colorPicker" class="form-label">Secondary</label>
                            </div>
                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component position-relative">
                                    <input id="secondary-color-picker" type="text" class="form-control"
                                           name="button_secondary" value="{{ old('button_secondary') }}"/>
                                    <span class="input-group-addon position-absolute end-0"><i
                                            class='bx bx-color'></i></span>
                                </div>
                                @error('button_secondary')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header fw-semibold">Text Colors</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <div>
                                <label for="colorPicker" class="form-label">Heading Primary</label>
                            </div>
                            <div id="color-picker-rgb" class="input-group colorpicker-component">
                                <input id="heading-color-picker" type="text" class="form-control" name="text_heading"
                                       value="{{ old('text_heading') }}"/>
                                <span class="input-group-addon position-absolute end-0"><i
                                        class='bx bx-color'></i></span>
                            </div>
                            @error('text_heading')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="colorPicker" class="form-label">Heading Secondary</label>
                            </div>
                            <div id="color-picker-rgb" class="input-group colorpicker-component">
                                <input id="heading-secondary-color-picker" type="text" class="form-control"
                                       name="text_heading_secondary"
                                       value="{{ old('text_heading_secondary') }}"/>
                                <span class="input-group-addon position-absolute end-0"><i
                                        class='bx bx-color'></i></span>
                            </div>
                            @error('text_heading_secondary')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="colorPicker" class="form-label">Title</label>
                            </div>

                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component">
                                    <input id="title-color-picker" type="text" class="form-control" name="text_title"
                                           value="{{ old('text_title') }}"/>
                                    <span class="input-group-addon position-absolute end-0"><i
                                            class='bx bx-color'></i></span>
                                </div>
                                @error('text_title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="colorPicker" class="form-label">Body</label>
                            </div>

                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component">
                                    <input id="body-color-picker" type="text" class="form-control" name="text_body"
                                           value="{{ old('text_body') }}"/>
                                    <span class="input-group-addon position-absolute end-0"><i
                                            class='bx bx-color'></i></span>
                                </div>
                                @error('text_body')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <h5 class="card-header fw-semibold">Background Colors</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <div>
                                <label for="colorPicker" class="form-label">Dashboard</label>
                            </div>

                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component">
                                    <input id="dashboard-color-picker" type="text" class="form-control"
                                           name="dashboard" value="{{ old('dashboard') }}"/>
                                    <span class="input-group-addon position-absolute end-0"><i
                                            class='bx bx-color'></i></span>
                                </div>
                                @error('dashboard')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="colorPicker" class="form-label">Menu</label>
                            </div>

                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component">
                                    <input id="menu-color-picker" type="text" class="form-control" name="menu"
                                           value="{{ old('menu') }}"/>
                                    <span class="input-group-addon position-absolute end-0"><i
                                            class='bx bx-color'></i></span>
                                </div>
                                @error('menu')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="colorPicker" class="form-label">Header</label>
                            </div>

                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component">
                                    <input id="header-color-picker" type="text" class="form-control" name="header"
                                           value="{{ old('header') }}"/>
                                    <span class="input-group-addon position-absolute end-0"><i
                                            class='bx bx-color'></i></span>
                                </div>
                                @error('header')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
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
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                   name="is_default" value="1" {{ old('is_default') ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Default theme</label>
                        </div>
                    </div>
                    <div class="col-auto me-3">
                        <button type="submit" class="btn btn-primary" id="submit-form">Create Theme
                        </button>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-outline-secondary" id="cancel-form">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('pages.themes._columns.modal.success-modal')
    @include('pages.themes._columns.modal.default-theme-modal')
@endsection

@push('custom-scripts')
    <script>
        $(function () {
            $('#heading-color-picker').colorpicker();
            $('#title-color-picker').colorpicker();
            $('#body-color-picker').colorpicker();
            $('#title-color-picker').colorpicker();
            $('#menu-color-picker').colorpicker();
            $('#header-color-picker').colorpicker();
            $('#dashboard-color-picker').colorpicker();
            $('#primary-color-picker').colorpicker();
            $('#secondary-color-picker').colorpicker();
            $('#heading-secondary-color-picker').colorpicker();

            $('#cancel-form').click(function () {
                window.location.href = "{{ route('themes.index') }}";
            });

            $.validator.addMethod("colorCode", function (value, element) {
                let regex = /^#([0-9A-F]{3}){1,2}$/i;
                return this.optional(element) || regex.test(value);
            }, "Please enter a valid color code (e.g., #RRGGBB).");

            $('#select2').on('change', function () {
                if ($(this).valid()) {
                    $(this).next('.text-danger').remove();
                }
            });

            $("#theme-store-form").validate({
                rules: {
                    name: {
                        required: true
                    },
                    logo: {
                        required: true,
                    },
                    banner_image: {
                        required: true,
                    },
                    'menu_name[]': {
                        required: true
                    },
                    text_heading: {
                        required: true,
                        colorCode: true,
                    },
                    text_heading_secondary: {
                        required: true,
                        colorCode: true,
                    },
                    text_title: {
                        required: true,
                        colorCode: true,
                    },
                    text_body: {
                        required: true,
                        colorCode: true,
                    },
                    button_primary: {
                        required: true,
                        colorCode: true,
                    },
                    button_secondary: {
                        required: true,
                        colorCode: true,
                    },
                    dashboard: {
                        required: true,
                        colorCode: true,
                    },
                    menu: {
                        required: true,
                        colorCode: true,
                    },
                    header: {
                        required: true,
                        colorCode: true,
                    },
                },
                messages: {
                    logo: {
                        required: "Please select a logo image.",
                        extension: "Please select a valid image file (png, jpg, jpeg, gif)."
                    },
                    banner_image: {
                        required: "Please select a banner image.",
                        extension: "Please select a valid image file (png, jpg, jpeg, gif)."
                    },
                    'menu_name[]': {
                        required: "Please select at least one menu item."
                    },
                },
                errorPlacement: function (error, element) {
                    if (error.text() === "" && element.hasClass('select2-hidden-accessible')) {
                        element.next('.select2-container').removeClass('is-invalid');
                        element.next('.select2-container').addClass('is-valid');
                    } else {
                        if (element.hasClass('js-example-basic-multiple')) {
                            error.insertAfter(element.next('.select2-container'));
                        } else if (element.attr("name") === "banner_image" ||
                            element.attr("name") === "text_heading" ||
                            element.attr("name") === "text_heading_secondary" ||
                            element.attr("name") === "text_title" ||
                            element.attr("name") === "text_body" ||
                            element.attr("name") === "button_primary" ||
                            element.attr("name") === "button_secondary" ||
                            element.attr("name") === "header" ||
                            element.attr("name") === "menu" ||
                            element.attr("name") === "dashboard") {
                            error.appendTo(element.closest(".mb-3"));
                        } else {
                            error.insertAfter(element);
                        }
                    }
                }

            });

            $('#submit-form').click(function (event) {
                event.preventDefault();
                let form = $('#theme-store-form');

                let formData = new FormData(form[0]);

                if (form.valid()) {
                    $.ajax({
                        url: "{{route('themes.store')}}",
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
                                window.location.href = "{{ route('themes.index') }}";
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

            $(function () {
                $('#flexSwitchCheckDefault').change(function () {
                    if ($(this).is(':checked')) {
                        $('#defaultThemeModal').modal('show');
                        $('#is_default').val(1);
                    } else {
                        $('#is_default').val(0);
                    }
                });

                $('#confirmDefaultTheme').click(function () {
                    $('#defaultThemeModal').modal('hide');
                });

                $('#cancelDefaultTheme').click(function () {
                    $('#flexSwitchCheckDefault').prop('checked', false);
                    $('#is_default').val(0);
                    $('#defaultThemeModal').modal('hide');
                });
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
