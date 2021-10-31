@extends(getTemplate().'.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
@endpush

@section('content')
    @php
        $registerMethod = getGeneralSettings('register_method') ?? 'mobile';
    @endphp

    <div class="container">
        <div class="row login-container">
			@if(1==0)
            <div class="col-12 col-md-6 pl-0">
                <img src="{{ getPageBackgroundSettings('register') }}" class="img-cover" alt="Login">
            </div>
			@endif
            <div class="col-12 col-md-12 text-center">
                <div class="login-card">
                    <h1 class="font-20 font-weight-bold">{{ trans('auth.signup') }}</h1>
@if(1==0)
                    <form method="post" action="/register" class="mt-35">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @if($registerMethod == 'mobile')
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label class="input-label" for="mobile">{{ trans('auth.country') }}:</label>
                                        <select name="country_code" class="form-control select2">
                                            @foreach(getCountriesMobileCode() as $country => $code)
                                                <option value="{{ $code }}" @if($code == old('country_code')) selected @endif>{{ $country }}</option>
                                            @endforeach
                                        </select>

                                        @error('mobile')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-7">
                                    <div class="form-group">
                                        <label class="input-label" for="mobile">{{ trans('auth.'.$registerMethod) }}:</label>
                                        <input name="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror"
                                               value="{{ old('mobile') }}" id="mobile" aria-describedby="mobileHelp">

                                        @error('mobile')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <label class="input-label" for="email">{{ trans('auth.'.$registerMethod) }}:</label>
                                <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" id="email" aria-describedby="emailHelp">

                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        @endif

                        <div class="form-group">
                            <label class="input-label" for="password">{{ trans('auth.full_name') }}:</label>
                            <input name="full_name" type="text" value="{{ old('full_name') }}" class="form-control @error('full_name') is-invalid @enderror">
                            @error('full_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="input-label" for="password">{{ trans('auth.password') }}:</label>
                            <input name="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" id="password"
                                   aria-describedby="passwordHelp">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label class="input-label" for="confirm_password">{{ trans('auth.retype_password') }}:</label>
                            <input name="password_confirmation" type="password"
                                   class="form-control @error('password_confirmation') is-invalid @enderror" id="confirm_password"
                                   aria-describedby="confirmPasswordHelp">
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="term" value="1" class="custom-control-input @error('term') is-invalid @enderror" id="term">
                            <label class="custom-control-label font-14" for="term">{{ trans('auth.i_agree_with') }}
                                <a href="pages/terms" target="_blank" class="text-secondary font-weight-bold font-14">{{ trans('auth.terms_and_rules') }}</a>
                            </label>

                            @error('term')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @error('term')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <button type="submit"
                                class="btn btn-primary btn-block mt-20">{{ trans('auth.signup') }}</button>
                    </form>
					
@endif
					<a href="/google" target="_blank" class="social-login mt-20 p-10 text-center d-flex align-items-center justify-content-center">
                        <img src="/assets/default/img/auth/google.svg" class="mr-auto" alt=" google svg"/>
                        <span class="flex-grow-1">{{ trans('auth.google_login') }}</span>
                    </a>
					
					<a href="/google" target="_blank" class="social-login mt-20 p-10 text-center d-flex align-items-center justify-content-center">
                        <img src="/assets/default/img/auth/google.svg" class="mr-auto" alt=" google svg"/>
                        <span class="flex-grow-1">Masuk dengan akun Belajar</span>
                    </a>

                    <div class="text-center mt-20">
                        <span class="text-secondary">
                            {{ trans('auth.already_have_an_account') }}
                            <a href="/login" class="text-secondary font-weight-bold">{{ trans('auth.login') }}</a>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
@endpush
