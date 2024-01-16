@extends('pages.master')
@section('content')

<section class="ftco-section" style="margin-top: 200px">
    <div class="card w-50 m-auto" style="border: none">
        <h3 class="text-center mb-4 text-success font-weight-bold">Demande Soumise</h3>

        <div class="icon w-50 m-auto">
            <img src="{{ asset('images/check.png') }}" style="margin-left: 100px" width="100" height="100" alt="" srcset="">

        </div>
        <p class="text-center font-weight-bold text-dark">Nous vous demandons de bien vouloir telecharger votre demande d'affiliation au service E-CNSS et de vous rendre a votre
            agence de rattachement CNSS pour achever votre demande.
        </p>

        <input type="hidden" name="demande" value="{{ $demande }}" id="">

        <div class="w-50 m-auto">
            <a href="{{ route('telecharger-demande-affiliation',$demande) }}" class="btn btn-primary"> Telecharger la demande</a>
        </div>

    </div>
</section>
@endsection
