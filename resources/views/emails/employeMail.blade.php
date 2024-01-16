<x-mail::message>


Bonjour Mme/Mr {{ $prenom }} {{ $nom }}

Votre Employeur <strong>{{ $raison_sociale }}</strong> a cree un compte a votre nom sur la plateforme de la CNSS.
Les infos ci-dessous sont les info du compte pour se connecter.
Login : {{ $n_immatriculation }} <br>
Mot de passe: {{ $pass }}

Clicker sur Ce lien pour vous connectez :


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
