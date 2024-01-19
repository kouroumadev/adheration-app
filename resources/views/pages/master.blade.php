<!DOCTYPE html>
<html lang="fr">
<head>
	<title>e-Services | CNSS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('images/Logocnss.png') }}" rel="icon">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- google font -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
{{-- <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css"> --}}
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">

	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/validate.css') }}">



	<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

 {{-- International Phone /// --}}
 <link rel="stylesheet" href="{{ asset('phone/css/demo.css') }}">
 <link rel="stylesheet" href="{{ asset('phone/css/intlTelInput.css') }}">

    <script src="https://kit.fontawesome.com/58374afd8b.js" crossorigin="anonymous"></script>
</head>
<body>
	@php
			$prefix = Request::route()->getPrefix();
			$route = Route::current()->getName();

	@endphp

@include('sweetalert::alert')
	<div class="wrap" style="background-color: #28a745;">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-12 col-md d-flex align-items-center">
					<p class="mb-0 phone"><span class="mailus">Phone no:</span> <a href="#">+00 1234 567</a> or <span class="mailus">email us:</span> <a href="#">emailsample@email.com</a></p>
				</div>
				<div class="col-12 col-md d-flex justify-content-md-end">
					<div class="social-media">
						<p class="mb-0 d-flex">
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="{{ route('acceuil') }}">
                <img src="images/Logocnss.png" width="100" height="100" />
            </a>
			<span class="navbar-brand" href="index.html"><span>Caisee Nationale de Sécurité sociale</span></span>
			<!-- <a class="navbar-brand" href="index.html">IT<span>solution</span></a> -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    @if ($route != "back-office")
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{($route == 'acceuil')? 'active':''}}"><a href="{{ route('acceuil')}}" class="nav-link">Acceuil</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Mes Services</a></li>
                        <!-- <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="cases.html" class="nav-link">Case Study</a></li>
                        <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
                        <li class="nav-item {{($route == 'adhesion')? 'active':''}}"><a href="{{ route('adhesion') }}" class="nav-link">Adhérer à E-CNSS</a></li>
                        <li class="nav-item cta" ><a href="{{ route('login') }}" class="nav-link btn btn-success"
                            style="background-color: #28a745 ; border:none; border-radius:20px; height:48px; ">
                            <i class="fa fa-user fa-xs"></i>  Mon Compte</a>
                        </li>

                    </ul>
                    @endif
                </div>


		</div>
	</nav>
	<!-- END nav -->



    <div style="height: 100vh" >
        @yield('content')
    </div>


	{{-- <footer class="" style="background-color: transparent; z-index: 0; position:relative; top:115px">
		<div class="container">

			<div class="row">
				<div class="col-md-12 text-center">

					<p class="text-dark"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | CNSS Guinea
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>

	</footer> --}}



		<!-- loader -->
		<div id="ftco-loader" class=" show fullscreen" ><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
        {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
		<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
		<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
		<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
		<script src="{{ asset('js/scrollax.min.js') }}"></script>
		{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> --}}
		{{-- <script src="{{ asset('js/google-map.js') }}"></script> --}}
		<script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/script-wizard.js') }}"></script>

        <script>
            // setting CSRF token in head section //
            $.ajaxSetup({
                headers: ({
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                })
            })
        </script>
    {{-- Countries phone validation --}}

    <script src="{{ asset('phone/js/intlTelInput.js') }}"></script>
    <script src="{{ asset('phone/js/data.js') }}"></script>
    <script src="{{ asset('phone/js/utils.js') }}"></script>


    <script>
        $(document).ready(function(){
            ///// Prevent form submission on keypress //////////
            $("#signUpForm").on('keyup keypress',function(e){
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    // alert('key press');
                    return false;
                }
            });
            const tel = document.querySelector("#telephone_representant");
            const button = document.querySelector("#telephone_representant");
            const errorMsg = document.querySelector("#error-msg");
            const validMsg = document.querySelector("#valid-msg");

            const errorMap = ["Numero Incorrect", "Code pays incorrect", "Numero tres court", "Numero trop long", "Numero Incorrect"];
            const iti = window.intlTelInput(tel,{
                utilsScript: "{{ asset('phone/js/utils.js') }}",
                initialCountry: "gn",
            });



            ///////// Validation avant envoie email representant ////////////
           $("#sendEmailVerif").click(function(){
            const prenomField = document.getElementById("prenom");
            const nomField = document.getElementById("nom");
            const documentIdentiteField = document.getElementById("document_identite");
            const emailField = document.getElementById("email");
            const telephoneRepresentantField = document.getElementById("telephone_representant");
            const adresseRepresentantField = document.getElementById("adresse_representant");

            const prenomFieldValue = prenomField.value.trim();
            const nomFieldValue = nomField.value.trim();
            const documentIdentiteFieldValue = documentIdentiteField.value.trim();
            const emailFieldValue = emailField.value.trim();
            const telephoneRepresentantFieldValue = telephoneRepresentantField.value.trim();
            const adresseRepresentantFieldValue = adresseRepresentantField.value.trim();

            const prenomControl = prenomField.parentElement;
            const nomControl = nomField.parentElement;
            const documentIdentiteControl = documentIdentiteField.parentElement;
            const emailControl = emailField.parentElement;
            const telephoneRepresentantControl = telephoneRepresentantField.parentElement;
            const adresseRepresentantControl = adresseRepresentantField.parentElement;
            var validNumber = 'false';


                const reset = () => {
                    tel.classList.remove("error");
                    errorMsg.innerHTML = "";
                    errorMsg.classList.add("hide");
                    validMsg.classList.add("hide");
                };

                reset();
                if (tel.value.trim()) {
                    if (iti.isValidNumber()) {
                    validMsg.classList.remove("hide");
                    validNumber = 'true';
                    } else {
                    tel.classList.add("error");
                    const errorCode = iti.getValidationError();
                    errorMsg.innerHTML = errorMap[errorCode];
                    errorMsg.classList.remove("hide");
                    }
                }
                // on keyup / change flag: reset
                tel.addEventListener('change', reset);
                tel.addEventListener('keyup', reset);


            if (prenomFieldValue === '') {

                prenomControl.classList.add("error");
            }
            else {
                prenomControl.classList.remove("error");
            }

            if (nomFieldValue === '') {

            nomControl.classList.add("error");
            }
            else {
            nomControl.classList.remove("error");
            }

            if(documentIdentiteFieldValue === ''){
                documentIdentiteControl.classList.add("error");
            }
            else {
                documentIdentiteControl.classList.remove("error");
            }

            if (emailFieldValue === '') {

                emailControl.classList.add("error");
            }
            else {
            emailControl.classList.remove("error");
            }

            if(telephoneRepresentantFieldValue === ''){
            telephoneRepresentantControl.classList.add("error");
            }
            else {
            telephoneRepresentantControl.classList.remove("error");
            }

            if(adresseRepresentantFieldValue === ''){
            adresseRepresentantControl.classList.add("error");
            }
            else {
            adresseRepresentantControl.classList.remove("error");
            }

            if (nomFieldValue != '' && prenomFieldValue != '' && documentIdentiteFieldValue != '' && emailFieldValue != '' &&
            telephoneRepresentantFieldValue != '' && adresseRepresentantFieldValue && validNumber == 'true') {

                var email = $("#email").val();
                var prenom = $("#prenom").val();
                // alert(prenom)
                $.ajax({
                    type: 'GET',
                    url: "{{route('send-mail')}}",
                    dataType: 'json',
                    data:{email:email,prenom:prenom},
                    beforeSend: function(){
                        $("#loader").show();
                    },
                    complete: function(){
                        $("#loader").hide();
                    },
                    success: function(data) {
                        if (data == "exist") {
                                    Swal.fire({
                            title: 'Error!',
                            text: 'Cet Email Existe déjà',
                            icon: 'error',

                            })

                            // $('#staticBackdrop').modal('show');
                        }
                        if (data == "sent") {
                                    Swal.fire({
                            title: 'Info!',
                            text: 'Un OTP a été envoyé a l\'email que Vous aviez saisi ',
                            icon: 'info',

                            })
                            $("#btn-modal-continuer").addClass('d-none');
                            $("#aff-verif-btn").removeClass('d-none');
                            $("#check-process").removeClass('d-none');
                            $("#successChecked").addClass('d-none');
                            $('#staticBackdrop').modal('show');
                        }
                    }
                })
            }


        })
///////// Validation Identification de l'entreprise /////////////
           $("#entreprise_identification").click(function(){
            var clicked = 0;
            const num_agrementField = document.getElementById("num_agrement");
            const num_impotField = document.getElementById("num_impot");
            const rccm_fileField = document.getElementById("rccm_file");
            const num_impot_fileField = document.getElementById("num_impot_file");

            const num_agrementFieldValue = num_agrementField.value.trim();
            const num_impotFieldValue = num_impotField.value.trim();

            const num_agrementControl = num_agrementField.parentElement;
            const num_impotControl = num_impotField.parentElement;
            const rccm_fileControl = rccm_fileField.parentElement;

            if (num_agrementFieldValue === '') {

                num_agrementControl.classList.add("error");
            }
            else {
                num_agrementControl.classList.remove("error");
            }
            if (rccm_fileField.length === 0) {
                rccm_fileControl.classList.add("error");
            } else {
                rccm_fileControl.classList.remove("error");
            }
            if (num_impotFieldValue === '') {

            num_impotControl.classList.add("error");
            }
            else {
            num_impotControl.classList.remove("error");
            }

            if (num_impotFieldValue != '' && num_agrementFieldValue != '') {

                $.ajax({
                    type: 'GET',
                    url: "{{route('rccm-verif')}}",
                    dataType: 'json',
                    data:{num_agrementFieldValue:num_agrementFieldValue},
                    success: function(data) {
                        if (data == "exist") {
                                    Swal.fire({
                            title: 'Error!',
                            text: 'Cet RCCM Existe déjà',
                            icon: 'error',

                            })

                            // $('#staticBackdrop').modal('show');
                        }
                        else{
                            //   $('#entreprise_identification').attr('data-next-global',true);
                            // $('#entreprise_identification').attr('data-next-global',true)
                            $("#rccmCheckedModal").modal('show');
                            // Swal.fire({
                            //         title: "Valide !",
                            //         text: "Cet RCCM est Valide.",
                            //         icon: "success",

                            //         confirmButtonColor: "#3085d6",

                            //         confirmButtonText: "OK"
                            //         }).then((result) => {
                            //         if (result.isConfirmed) {
                            //             $('.swal2-confirm swal2-styled swal2-default-outline').attr('id','btnConfirm');
                            //             $('#btnConfirm').attr('data-next-global',true);
                            //         }
                            // });

                        }
                    }
                })
                // $('#entreprise_identification').attr('data-next-global',true);
            }
           });

           //////// calcul d'effectif /////////
// $("#effectif_femme").blur(function(){
//              var effectif_homme = parseInt($("#effectif_homme").val());
//         var effectif_femme = parseInt($("#effectif_femme").val());
//         var total = (effectif_homme + effectif_femme);
//         var nombre_emp = $("#nombre_emp").val(total)
//         // alert(typeof(nombre_emp));

//         if (nombre_emp < 20) {
//             $("#categorie").val('E-20')
//         }
//         else {
//             $("#categorie").val('E+20')
//         }

// });
    //////// Validation Details entreprise ////////

    $('#detail_entreprise').click( function() {


    var nom = $("#nom").val();
    var prenom = $("#prenom").val();
    var document_identite = $("#document_identite").val();
    var adresse_representant = $("#adresse_representant").val();
    var ville_representant = $("#ville_representant").val();
    var email = $("#email").val();
    var telephone_representant = $("#telephone_representant").val();

    var num_agrement = $("#num_agrement").val();
    var num_impot = $("#num_impot").val();
    var activite_principaleDisp = $("#activite_principale").val();
    var ville_entrepriseDisp = $("#ville_entreprise").val();
    var commune_entrepriseDisp = $("#commune_entreprise").val();
    var raison_socialeDisp = $("#raison_sociale").val();
    var boite_postaleDisp = $("#boite_postale").val();
    var quartier_entrepriseDisp = $("#quartier_entreprise").val();
    // var categorieDisp = $('#categorie').val();
    // var effectif_hommeDisp = $("#effectif_homme").val();
    // var effectif_femmeDisp = $("#effectif_femme").val();
     var nombre_empDisp = $("#nombre_emp").val();

    ///// For Validation /////////
    const activite_principale = document.getElementById("activite_principale")
    const ville_entreprise = document.getElementById("ville_entreprise")
    const commune_entreprise = document.getElementById("commune_entreprise")
    const raison_sociale = document.getElementById("raison_sociale")
    const boite_postale = document.getElementById("boite_postale")
    const quartier_entreprise = document.getElementById("quartier_entreprise")
    // const categorie = document.getElementById('categorie')
    // const effectif_homme = document.getElementById("effectif_homme")
    // const effectif_femme = document.getElementById("effectif_femme")
     const nombre_emp = document.getElementById("nombre_emp")

    const activite_principaleValue = activite_principale.value.trim();
    const ville_entrepriseValue = ville_entreprise.value.trim();
    const commune_entrepriseValue = commune_entreprise.value.trim();
    const raison_socialeValue = raison_sociale.value.trim();
    const boite_postaleValue = boite_postale.value.trim();
    const quartier_entrepriseValue = quartier_entreprise.value.trim();
    // const categorieValue = categorie.value.trim();
    // const effectif_hommeValue = effectif_homme.value.trim();
    // const effectif_femmeValue = effectif_femme.value.trim();
     const nombre_empValue = nombre_emp.value.trim();

    const boite_postaleControl = boite_postale.parentElement;
    const quartier_entrepriseControl = quartier_entreprise.parentElement;
    // const categorieControl = categorie.parentElement;
    // const effectif_hommeControl = effectif_homme.parentElement;
    // const effectif_femmeControl = effectif_femme.parentElement;
     const nombre_empControl = nombre_emp.parentElement;
    const activite_principaleControl = activite_principale.parentElement;
    const ville_entrepriseControl = ville_entreprise.parentElement;
    const commune_entrepriseControl = commune_entreprise.parentElement;
    const raison_socialeControl = raison_sociale.parentElement;

    if (activite_principaleValue === '') {

        activite_principaleControl.classList.add("error");
    }
    else {
        activite_principaleControl.classList.remove("error");
    }

    if (ville_entrepriseValue === '') {

        ville_entrepriseControl.classList.add("error");
    }
    else {
        ville_entrepriseControl.classList.remove("error");
    }

    if (commune_entrepriseValue === '') {

    commune_entrepriseControl.classList.add("error");
    }
    else {
    commune_entrepriseControl.classList.remove("error");
    }

    if (raison_socialeValue === '') {

    raison_socialeControl.classList.add("error");
    }
    else {
    raison_socialeControl.classList.remove("error");
    }

    if (boite_postaleValue === '') {

    boite_postaleControl.classList.add("error");
    }
    else {
    boite_postaleControl.classList.remove("error");
    }

    if (quartier_entrepriseValue === '') {

    quartier_entrepriseControl.classList.add("error");
    }
    else {
    quartier_entrepriseControl.classList.remove("error");
    }

    // if (categorieValue === '') {

    // categorieControl.classList.add("error");
    // }
    // else {
    // categorieControl.classList.remove("error");
    // }

    // if (effectif_hommeValue === '') {

    // effectif_hommeControl.classList.add("error");
    // }
    // else {
    // effectif_hommeControl.classList.remove("error");
    // }

    // if (effectif_femmeValue === '') {

    // effectif_femmeControl.classList.add("error");
    // }
    // else {
    // effectif_femmeControl.classList.remove("error");
    // }

     if (nombre_empValue === '') {

         nombre_empControl.classList.add("error");
     }
     else {
     nombre_empControl.classList.remove("error");
     }
    if (raison_socialeValue != '' && ville_entrepriseValue != ''
             && quartier_entrepriseValue != '' && commune_entrepriseValue != ''
            && activite_principaleValue != ''  && boite_postaleValue != '')
         {
                $('#detail_entreprise').attr('data-next-global',true);
            }
//  alert('num_agrement')

$('#re_nom').text(nom);
$('#re_prenom').text(prenom);
$('#re_email').text(email);
$('#re_adresse_representant').text(adresse_representant);
$('#re_telephone_representant').text(telephone_representant);
$('#re_document_identite').text(document_identite);
$('#re_ville_representant').text(ville_representant);

$('#re_num_agrement').text(num_agrement);
$('#re_num_impot').text(num_impot);
$('#re_activite_principale').text(activite_principaleDisp);
$('#re_ville_entreprise').text(ville_entrepriseDisp);
$('#re_commune_entreprise').text(commune_entrepriseDisp);
$('#re_raison_sociale').text(raison_socialeDisp);
$('#re_nombre_emp').text(nombre_empDisp);
$('#re_boite_postale').text(boite_postaleDisp);
// $('#re_categorie').text(categorieDisp);
$('#re_quartier_entreprise').text(quartier_entrepriseDisp);
// $('#re_effectif_homme').text(effectif_hommeDisp);
// $('#re_effectif_femme').text(effectif_femmeDisp);
// alert(raison_sociale)
});


    ///// Renvoyer Email Verification ////////////
           $("#resentEmail").click(function(){
             var email = $("#email").val();
                $.ajax({
                    type: 'GET',
                    url: "{{route('send-mail')}}",
                    dataType: 'json',
                    data:{email:email},
                    beforeSend: function(){
                        $("#loader").show();
                    },
                    complete: function(){
                        $("#loader").hide();
                    },
                    success: function(data) {
                        if (data == "exist") {
                                    Swal.fire({
                            title: 'Error!',
                            text: 'Cet Email Existe déjà',
                            icon: 'error',

                            })

                            // $('#staticBackdrop').modal('show');
                        }
                        if (data == "sent") {
                                    Swal.fire({
                            title: 'Info!',
                            text: 'Un OTP a été envoyé a l\'email que Vous aviez saisi ',
                            icon: 'info',

                            })

                            $("#btn-modal-continuer").addClass('d-none');
                            $("#aff-verif-btn").removeClass('d-none');
                            $("#check-process").removeClass('d-none');
                            $("#successChecked").addClass('d-none');
                            $('#staticBackdrop').modal('show');
                        }
                    }
                });
           });

           $("#aff-verif-btn").click(function(){
            var email = $("#email").val();
            var code_affiliation = $("#code_affiliation").val();
            //  alert(code_affiliation)
            $.ajax({
                type: 'GET',
                url: "{{route('mail-verification')}}",
                dataType: 'json',
                data:{email:email,code:code_affiliation},
                success: function(data) {
                    // alert(data)
                    if (data === 'verified') {
                        // alert("votre E-mail et Numero de telephone a ete verifier avec succes");
                        $("#btn-modal-continuer").removeClass('d-none');
                        $("#aff-verif-btn").addClass('d-none');
                        $("#successChecked").removeClass('d-none');
                        $("#check-process").addClass('d-none');
                        $("#error-verif-check").addClass('d-none');
                    } else {
                        $("#error-verif-check").removeClass('d-none');
                        // Swal.fire({
                        //     title: 'Error!',
                        //     text: 'Le Code saisi ne Correspond pas .',
                        //     icon: 'error',

                        // })
                    }

                }
            })
           })

///////// SELECTION AUTOMATIQUE DES COMMUNES ///////////
            $('select[name="ville_entreprise"]').on('change', function(){
            var ville_entreprise = $(this).val();
            // alert(ville_entreprise)
            if(ville_entreprise) {
                $.ajax({
                    url: "{{  route('get-commune') }}",
                    type:"GET",
                    dataType:"json",
                    data:{ville_entreprise},
                    success:function(data) {

                       var d =$('select[name="commune_entreprise"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="commune_entreprise"]').append('<option value="'+ value.id +'">' + value.libelle + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });


        })
        </script>

	</body>
	</html>
