@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:60px;">

    <!-- Outer Row -->
    <div class="row justify-content-center ">

        <div class=" col-lg-5  ">

            <div class="card o-hidden border-5 shadow-lg my-0">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-4">
                                <div class="text-center">
                                    <center>
                                        <img src="{{asset('assets2/img/logo.png')}}" alt="" width="100px">
                                            {{-- <p>spp wikrama</p> --}}
                                            
                                    </center><br>
                                    <h1 class="h5 text-gray-900 mb-4"> SPP WIKRAMA</h1>
                                </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-3 col-form-label text-md-end"></label>

                                            <center><div class="col-md-10">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="isi email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </center>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-3 col-form-label text-md-end"></label>

                                            <center><div class="col-md-10">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="isi password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </center>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <center>
                                            <button class="btn btn-primary btn-user btn-block col-md-10 " type="submit" >Login</button>
                                        </center> 
                                        @if (Route::has('password.request'))
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
