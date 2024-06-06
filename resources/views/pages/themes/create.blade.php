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
    {{--    <div class=" flex-grow-1 container-p-y">--}}
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
                        <div class="select2-primary">
                            <select id="multicol-language" class="select2 form-control" multiple="multiple">
                                <option value="home" selected>Home</option>
                                <option value="services" selected>Services</option>
                                <option value="contracts" selected>Contracts</option>
                                <option value="about">About</option>
                                <option value="contact">Contact</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Float label</h5>
                <div class="card-body">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="John Doe"
                               aria-describedby="floatingInputHelp">
                        <label for="floatingInput">Name</label>
                        <div id="floatingInputHelp" class="form-text">We'll never share your details with anyone
                            else.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form controls -->
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Form Controls</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                               placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlReadOnlyInput1" class="form-label">Read only</label>
                        <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1"
                               placeholder="Readonly input here..." readonly="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Read plain</label>
                        <input type="text" readonly="" class="form-control-plaintext"
                               id="exampleFormControlReadOnlyInputPlain1" value="email@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Example select</label>
                        <select class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                            <option selected="">Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleDataList" class="form-label">Datalist example</label>
                        <input class="form-control" list="datalistOptions" id="exampleDataList"
                               placeholder="Type to search...">
                        <datalist id="datalistOptions">
                            <option value="San Francisco"></option>
                            <option value="New York"></option>
                            <option value="Seattle"></option>
                            <option value="Los Angeles"></option>
                            <option value="Chicago"></option>
                        </datalist>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect2" class="form-label">Example multiple select</label>
                        <select multiple="" class="form-select" id="exampleFormControlSelect2"
                                aria-label="Multiple select example">
                            <option selected="">Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div>
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Sizing -->
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Input Sizing &amp; Shape</h5>
                <div class="card-body">
                    <small class="text-light fw-medium">Input text</small>

                    <div class="mt-2 mb-3">
                        <label for="largeInput" class="form-label">Large input</label>
                        <input id="largeInput" class="form-control form-control-lg" type="text"
                               placeholder=".form-control-lg">
                    </div>
                    <div class="mb-3">
                        <label for="defaultInput" class="form-label">Default input</label>
                        <input id="defaultInput" class="form-control" type="text" placeholder="Default input">
                    </div>
                    <div>
                        <label for="smallInput" class="form-label">Small input</label>
                        <input id="smallInput" class="form-control form-control-sm" type="text"
                               placeholder=".form-control-sm">
                    </div>
                </div>
                <hr class="m-0">
                <div class="card-body">
                    <small class="text-light fw-medium">Input select</small>
                    <div class="mt-2 mb-3">
                        <label for="largeSelect" class="form-label">Large select</label>
                        <select id="largeSelect" class="form-select form-select-lg">
                            <option>Large select</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Default select</label>
                        <select id="defaultSelect" class="form-select">
                            <option>Default select</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div>
                        <label for="smallSelect" class="form-label">Small select</label>
                        <select id="smallSelect" class="form-select form-select-sm">
                            <option>Small select</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <hr class="m-0">
                <div class="card-body">
                    <small class="text-light fw-medium">Input Shape</small>
                    <div class="mt-2">
                        <label for="roundedInput" class="form-label">Rounded input</label>
                        <input id="roundedInput" class="form-control rounded-pill" type="text"
                               placeholder="Default input">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    </div>--}}
@endsection
