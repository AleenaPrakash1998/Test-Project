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
    <form id="theme-update-form" method="post" action="{{ route('themes.update', $theme->id) }}"
          enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header fw-semibold">General</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="defaultFormControlInput"
                                   aria-describedby="defaultFormControlHelp" name="name"
                                   value="{{ old('name', $theme->name) }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Theme logo</label>
                            <div class="d-flex align-items-center">
                                @if ($theme->getLogoUrl())
                                    <div class="mb-2">
                                        <img src="{{ $theme->getLogoUrl() }}" alt="Current Theme Logo"
                                             style="height: 90px; width: 90px" id="current-logo">
                                    </div>
                                @endif
                                <div class="mb-2">
                                    <img src="#" alt="New Theme Logo"
                                         style="height: 90px;  width: 90px; display:none;"
                                         id="new-logo">
                                </div>
                                <div class="ms-4">
                                    <label for="logFile" class="btn btn-primary mb-2">Upload new logo</label>
                                    <p class="fw-medium">Allowed JPG, JPEG, SVG or PNG.</p>
                                </div>
                                <input class="form-control" type="file" id="logFile" name="logo"
                                       onchange="readURL(this, 'new-logo', 'current-logo');" style="display: none"
                                       accept="image/png, image/jpg, image/jpeg, image/svg">
                                @if ($errors->has('logo'))
                                    <div class="text-danger">{{ $errors->first('logo') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Banner Image</label>
                            <div class="d-flex align-items-center">
                                @if ($theme->getBannerUrl())
                                    <div class="mb-2">
                                        <img src="{{ $theme->getBannerUrl() }}" alt="Current Banner Image"
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
                                       accept="image/png, image/jpg, image/jpeg, image/svg">
                                @if ($errors->has('banner_image'))
                                    <div class="text-danger">{{ $errors->first('banner_image') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Menu</label>
                            <div class="form-group">
                                <select class="js-example-basic-multiple" multiple data-allow-clear="1" id="select2"
                                        name="menu_name[]">
                                    @foreach(\App\Enums\ThemeMenu::cases() as $menu)
                                            <?php
                                            $menuValue = $menu->value;
                                            $selected = '';
                                            if ($theme->menu_name) {
                                                $menuNames = json_decode($theme->menu_name, true);
                                                if (in_array($menuValue, $menuNames)) {
                                                    $selected = 'selected';
                                                }
                                            }
                                            ?>
                                        <option value="{{ $menuValue }}" {{ $selected }}>
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
                <div class="card mb-4">
                    <h5 class="card-header fw-semibold">Button Colors</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <div>
                                <label for="colorPicker" class="form-label">Primary</label>
                            </div>
                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component">
                                    <input id="primary-color-picker" type="text" class="form-control"
                                           name="button_primary"
                                           value="{{ old('button_primary',$theme->button_primary) }}"/>
                                    <span class="input-group-addon position-absolute end-0 "><i
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
                                           name="button_secondary"
                                           value="{{ old('button_secondary', $theme->button_secondary) }}"/>
                                    <span class="input-group-addon position-absolute end-0 "><i
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

            <div class="col-md-6 d-flex flex-column justify-content-center">
                <div class="card mb-5">
                    <h5 class="card-header fw-semibold mt-4">Text Colors</h5>
                    <div class="card-body">
                        <div class="mb-4">
                            <div>
                                <label for="colorPicker" class="form-label">Headings</label>
                            </div>
                            <div id="color-picker-rgb" class="input-group colorpicker-component">
                                <input id="heading-color-picker" type="text" class="form-control" name="text_heading"
                                       value="{{ old('text_heading', $theme->text_heading) }}"/>
                                <span class="input-group-addon position-absolute end-0 "><i
                                        class='bx bx-color'></i></span>
                            </div>
                            @error('text_heading')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-4">
                            <div>
                                <label for="colorPicker" class="form-label">Title</label>
                            </div>

                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component">
                                    <input id="title-color-picker" type="text" class="form-control" name="text_title"
                                           value="{{ old('text_title', $theme->text_title) }}"/>
                                    <span class="input-group-addon position-absolute end-0 "><i
                                            class='bx bx-color'></i></span>
                                </div>
                                @error('text_title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <div>
                                <label for="colorPicker" class="form-label">Body</label>
                            </div>

                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component">
                                    <input id="body-color-picker" type="text" class="form-control" name="text_body"
                                           value="{{ old('text_body', $theme->text_body) }}"/>
                                    <span class="input-group-addon position-absolute end-0 "><i
                                            class='bx bx-color'></i></span>
                                </div>
                                @error('text_body')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-5">
                    <h5 class="card-header fw-semibold mt-4">Background Colors</h5>
                    <div class="card-body">
                        <div class="mb-4">
                            <div>
                                <label for="colorPicker" class="form-label">Dashboard</label>
                            </div>

                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component">
                                    <input id="dashboard-color-picker" type="text" class="form-control"
                                           name="dashboard"
                                           value="{{ old('dashboard',  $theme->dashboard) }}"/>
                                    <span class="input-group-addon position-absolute end-0"><i
                                            class='bx bx-color'></i></span>
                                </div>
                                @error('dashboard')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <div>
                                <label for="colorPicker" class="form-label">Menu</label>
                            </div>

                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component">
                                    <input id="menu-color-picker" type="text" class="form-control" name="menu"
                                           value="{{ old('menu',$theme->menu) }}"/>
                                    <span class="input-group-addon position-absolute end-0 "><i
                                            class='bx bx-color'></i></span>
                                </div>
                                @error('menu')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="colorPicker" class="form-label">Navbar</label>
                            </div>

                            <div>
                                <div id="color-picker-rgb" class="input-group colorpicker-component">
                                    <input id="navbar-color-picker" type="text" class="form-control" name="navbar"
                                           value="{{ old('navbar', $theme->navbar) }}"/>
                                    <span class="input-group-addon position-absolute end-0 "><i
                                            class='bx bx-color'></i></span>
                                </div>
                                @error('navbar')
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
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="hidden" name="is_default" value="0">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                   name="is_default" value="1" {{ $theme->is_default ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox
                                input</label>
                        </div>
                    </div>
                    <div class="col-auto me-3">
                        <button type="submit" class="btn btn-primary" id="submit-form">Save Changes</button>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-outline-secondary" id="cancel-form">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('pages.themes._columns.modal.update-success-modal')
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
            $('#navbar-color-picker').colorpicker();
            $('#dashboard-color-picker').colorpicker();
            $('#primary-color-picker').colorpicker();
            $('#secondary-color-picker').colorpicker();
        });

        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({width: '100%'});
        });

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

        $("#theme-update-form").validate({
            rules: {
                name: {
                    required: true
                },
                'menu_name[]': {
                    required: true
                },
                text_heading: {
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
                navbar: {
                    required: true,
                    colorCode: true,
                },
                banner_image: {
                    required: true,
                    accept: "jpeg|jpg|png"
                },
                logo: {
                    required: true,
                    accept: "jpeg|jpg|png"
                },
            },
            messages: {
                logo: {
                    required: "Please select a logo image.",
                    extension: "Please select a valid image file (png, jpg, jpeg)."
                },
                banner_image: {
                    required: "Please select a banner image.",
                    extension: "Please select a valid image file (png, jpg, jpeg)."
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
                        element.attr("name") === "text-heading" ||
                        element.attr("name") === "text_title" ||
                        element.attr("name") === "text_body" ||
                        element.attr("name") === "button_primary" ||
                        element.attr("name") === "button_secondary" ||
                        element.attr("name") === "navbar" ||
                        element.attr("name") === "menu" ||
                        element.attr("name") === "is_default" ||
                        element.attr("name") === "dashboard") {
                        // For other fields
                        error.appendTo(element.closest(".mb-3"));
                    } else {
                        error.insertAfter(element);
                    }
                }
            }
        });

        $('#submit-form').click(function (event) {
            event.preventDefault();
            let form = $('#theme-update-form');

            $('.text-danger').remove();

            let formData = new FormData(form[0]);

            if (form.valid()) {
                $.ajax({
                    url: "{{route('themes.update', $theme->id)}}",
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
