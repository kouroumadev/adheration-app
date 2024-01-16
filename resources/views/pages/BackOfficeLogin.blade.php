@extends('pages.master')
@section('content')

<section class="ftco-section" style="margin-top: 150px">
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <div class="card" style="width: 70%; margin: auto; border:none">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/image-home.png') }}" width="80%" height="80%" alt="" srcset="">

            </div>
            <div class="col-md-6">
                <h4 class="text-center mb-4 font-weight-bold">Bienvenue !</h4>
                <h5 class="text-center mb-4 ">Connectez vous a votre compte</h5>
                @error('login')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Email</label>
                    <input type="email"  name="login" :value="old('login')" required class="form-control" id="login" placeholder="login">
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Mot de passe</label>
                    <input type="password" name="password" required class="form-control" id="password" placeholder="Mot de passe">
                  </div>

                  <div class="mb-3 w-50">
                        <button class="btn btn-success">Connecter</button>
                  </div>
            </div>

        </div>

    </div>
    </form>
</section>
@endsection
