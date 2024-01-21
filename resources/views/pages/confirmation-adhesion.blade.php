@extends('pages.master')
@section('content')

<section class="ftco-section" style="margin-top: 100px">
    <div class="card w-50 m-auto" style="border: none">
        <h3 class="text-center mb-4 text-success font-weight-bold">Demande Soumise</h3>
        <p class="text-center font-weight-bold text-dark">Nous vous demandons de bien vouloir telecharger votre demande d'adhesion au service E-CNSS et de vous rendre a votre
            agence de rattachement CNSS pour achever votre demande.
        </p>

        <div class="w-50 m-auto">
            <a href="{{ route('aff-confirmation') }}" class="btn btn-primary"> Telecharger la demande</a>
        </div>

    </div>
</section>
@endsection
