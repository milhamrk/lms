@extends(getTemplate().'.layouts.app')


@section('content')
    <div class="container">

        <div class="row login-container">
            <div class="col-12 col-md-6 pl-0">
                <img src="{{ getPageBackgroundSettings('become_instructor') }}" class="img-cover" alt="Login">
            </div>

            <div class="col-12 col-md-6">
                <div class="login-card">
                    <h1 class="font-20 font-weight-bold">{{ trans('cart.formulir') }}</h1>
					<p>{{ trans('cart.information_form') }}</p>

                    <form method="post" action="" class="mt-35">
                        {{ csrf_field() }}
						
						<div class="form-group">
                            <label class="input-label">{{ trans('cart.nama') }}</label>
                            <input type="text" name="full_name" value="{{ (!empty($user)) ? $user->full_name : old('full_name') }}" class="form-control @error('full_name')  is-invalid @enderror" placeholder=""/>
                            @error('full_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
						
						<div class="form-group">
                            <label class="input-label">{{ trans('cart.phone') }}</label>
                            <input type="text" name="mobile" value="{{ (!empty($user)) ? $user->mobile : old('mobile') }}" class="form-control @error('mobile')  is-invalid @enderror" placeholder=""/>
                            @error('mobile')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
						
						<div class="form-group">
                            <label class="input-label">{{ trans('cart.instansi') }}</label>
                            <input type="text" name="instansi" value="{{ (!empty($user)) ? $user->instansi : old('instansi') }}" class="form-control @error('instansi')  is-invalid @enderror" placeholder=""/>
                            @error('instansi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="input-label">{{ trans('cart.provinsi') }}</label>
                            <select name="provinsi" class="form-control @error('account_type')  is-invalid @enderror">
                                <option selected disabled>Pilih provinsi Anda</option>

                                @if(!empty($provinsi) and count($provinsi))
                                    @foreach($provinsi as $prov)
                                        <option value="{{ $prov->id }}" >{{ $prov->provinsi }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('provinsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
						
						<div class="form-group">
                            <label class="input-label">{{ trans('cart.kabupaten') }}</label>
                            <select name="account_type" class="form-control @error('account_type')  is-invalid @enderror">
                                <option selected disabled>{{ trans('financial.select_account_type') }}</option>

                                @if(!empty(getOfflineBanksTitle()) and count(getOfflineBanksTitle()))
                                    @foreach(getOfflineBanksTitle() as $accountType)
                                        <option value="{{ $accountType }}" @if(!empty($user) and $user->account_type == $accountType) selected="selected" @endif>{{ $accountType }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('account_type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary btn-block mt-20">{{ trans('cart.send') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts_bottom')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script src="/assets/default/js/parts/become_instructor.min.js"></script>
@endpush
