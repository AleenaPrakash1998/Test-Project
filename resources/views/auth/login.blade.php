<x-guest-layout>
    <div class="">
        <div class="authentication-inner  d-flex justify-content-center align-items-center margin-auto vh-100">
            <!-- First Card (Login Form) -->
            <div class="card border-0 shadow-none" style="max-width: 700px;">
                <div class="card-body mt-4 d-flex">
                    <div class="mt-4">
                        <div class="app-brand justify-content-center text-center">
                            {{--                        <a href="index.html" class="app-brand-link gap-2">--}}
                            <span class="app-brand-text demo text-body fw-bold">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" class="w-50 h-50">
                        <hr/>
                            </span>
                            {{--                        </a>--}}
                        </div>
                        <div class="text-center">
                            <h4 class="mb-2 text-secondary">Welcome to Shamal</h4>
                            <p class="text-secondary">Login to continue your account</p>
                        </div>
                        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email')" class="form-label fw-semibold"/>
                                <x-text-input id="email" class="form-control text-secondary" type="email" name="email"
                                              :value="old('email')" placeholder="Enter your email"
                                              autocomplete="username"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger"/>
                            </div>
                            <div class="mb-4 form-password-toggle">
                                    <x-input-label for="password" :value="__('Password')"
                                                   class="form-label fw-semibold"/>
                                    <x-text-input id="password" class="form-control" type="password" name="password"
                                                  placeholder="Enter your password"
                                                  autocomplete="current-password"/>
                            </div>
                            <div class="mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                    <label class="form-check-label text-secondary"
                                           for="remember_me"> {{ __('Remember me') }} </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-primary-button class="btn btn-secondary d-grid w-100">
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                    <div class="px-2 mx-4">
                        <img src="{{ asset('assets/img/banners/banner.png') }}" class="w-100 h-100">
                    </div>
                </div>

            </div>
            <!-- Second Card (Banner) -->

        </div>
    </div>
    <script>

        $(function () {
            $('#formAuthentication').validate({
                rules: {
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                },
            })
        })
    </script>
</x-guest-layout>
