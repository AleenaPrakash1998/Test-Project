@extends('layouts.master')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h1 class="mb-0 fw-semibold fs-5">Set your new theme</h1>
            <p class="card-text pt-2">
                Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header fw-semibold">General</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" placeholder="John Doe"
                               aria-describedby="defaultFormControlHelp">
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Theme logo</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Banner Image</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Menu</label>
                        <div class="form-group">
                            <select class="js-example-basic-multiple" multiple  data-allow-clear="1" id="select2" name="select2">
                                <option>HTML</option>
                                <option>CSS</option>
                                <option>JavaScript</option>
                                <option>PHP</option>
                                <option>MySQL</option>
                            </select>
                        </div>
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
                                <input id="primary-color-picker" type="text" class="form-control" value="#8f3596"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div>
                            <label for="colorPicker" class="form-label">Secondary</label>
                        </div>
                        <div>
                            <div id="color-picker-rgb" class="input-group colorpicker-component">
                                <input id="secondary-color-picker" type="text" class="form-control" value="#8f3596"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header fw-semibold">Button Colors</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <div>
                            <label for="colorPicker" class="form-label">Headings</label>
                        </div>
                        <div id="color-picker-rgb" class="input-group colorpicker-component">
                            <input id="heading-color-picker" type="text" class="form-control" value="#8f3596"/>
                            <span class="input-group-addon"><i></i></span>
                        </div>

                    </div>
                    <div class="mb-3">
                        <div>
                            <label for="colorPicker" class="form-label">Title</label>
                        </div>

                        <div>
                            <div id="color-picker-rgb" class="input-group colorpicker-component">
                                <input id="title-color-picker" type="text" class="form-control" value="#8f3596"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div>
                            <label for="colorPicker" class="form-label">Body</label>
                        </div>

                        <div>
                            <div id="color-picker-rgb" class="input-group colorpicker-component">
                                <input id="body-color-picker" type="text" class="form-control" value="#8f3596"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
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
                                <input id="dashboard-color-picker" type="text" class="form-control" value="#8f3596"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div>
                            <label for="colorPicker" class="form-label">Menu</label>
                        </div>

                        <div>
                            <div id="color-picker-rgb" class="input-group colorpicker-component">
                                <input id="menu-color-picker" type="text" class="form-control" value="#8f3596"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div>
                            <label for="colorPicker" class="form-label">Navbar</label>
                        </div>

                        <div>
                            <div id="color-picker-rgb" class="input-group colorpicker-component">
                                <input id="navbar-color-picker" type="text" class="form-control" value="#8f3596"/>
                                <span class="input-group-addon"><i></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="card-text alert bg-primary">
                <p class="card-text pt-2">Lorem ipsum dolor sit amet consectetur. Scelerisque vivamus quam vulputate
                    tellus pharetra egestas.
                    Suspendisse egestas egestas diam eget.
                </p>
            </div>
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox
                            input</label>
                    </div>
                </div>
                <div class="col-auto me-3">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
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
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({width:'100%'});
        });
    </script>
@endpush

<style>
    .select2-container--default .select2-selection--multiple {
        border-color: #d9dee3!important;
    }
</style>
