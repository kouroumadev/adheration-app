<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>User</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- Favicons -->
  <link href="{{ asset('images/Logocnss.png') }}" rel="icon">
  <link href="{{ asset('images/Logocnss.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('back/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('back/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('back/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('back/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('back/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('back/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('back/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="{{ asset('back/assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/validate.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>


</head>
@php
			$prefix = Request::route()->getPrefix();
			$route = Route::current()->getName();

	@endphp
<body style="font-family:'Poppins', sans-serif">
    @include('sweetalert::alert')
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('images/cnsslogo2.png') }}" alt="">
        <span class="d-none d-lg-block">CNSS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Changer le Mot de Passe</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            {{-- <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a> --}}
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @if (Auth::user()->type_user == "employer")
            <li class="nav-item">
                <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Tableau de Bord</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('mon-espace') }}">
                  <i class="bi bi-file-earmark"></i>
                  <span>Mon Espace</span>
                </a>
            </li><!-- End Blank Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                  <i class="bi bi-people-fill"></i>
                  <span>Conjoints</span>
                </a>
            </li><!-- End Blank Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                  <i class="bi bi-people"></i>
                  <span>Enfants</span>
                </a>
            </li><!-- End Blank Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                  <i class="bi bi-info-square"></i>
                  <span>Immatriculation</span>
                </a>
            </li><!-- End Blank Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('espace-cotisation') }}">
                  <i class="bi bi-journals"></i>
                  <span>Espace Cotisation</span>
                </a>
            </li><!-- End Blank Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                  <i class="bi bi-journal-bookmark-fill"></i>
                  <span>Attestations</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                  <i class="bi bi-layout-text-sidebar"></i>
                  <span>Pieces justificatifs</span>
                </a>
            </li><!-- End Blank Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                  <i class="bi bi-folder-symlink-fill"></i>
                  <span>Dossiers deposes</span>
                </a>
            </li><!-- End Blank Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                  <i class="bi bi-person-check-fill"></i>
                  <span>Affiliation Volontaire</span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Tableau de Bord</span>
                </a>
            </li><!-- End Dashboard Nav -->

      {{-- <li class="nav-heading"> Section Télédéclaration</li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('immatriculation') }}">
          <i class="bi bi-file-earmark"></i>
          <span>Immatriculation</span>
        </a>
      </li><!-- End Blank Page Nav --> --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-file-earmark"></i><span>Immatriculation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('immatriculation') }}">
              <i class="bi bi-circle"></i><span>Saisie sur Formulaire</span>
            </a>
          </li>
          <li>
            <a href="{{ route('import-immatriculation') }}">
              <i class="bi bi-circle"></i><span>Transmission sur Fichier</span>
            </a>
          </li>


        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Télédéclaration</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('tele-dec') }}">
              <i class="bi bi-circle"></i><span>Saisie sur Formulaire</span>
            </a>
          </li>
          <li>
            <a href="{{ route('import-teledeclaration') }}">
              <i class="bi bi-circle"></i><span>Transmission sur Fichier</span>
            </a>
          </li>


        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('mes-cotisations') }}">
          <i class="bi bi-dash-circle"></i>
          <span>Mes cotisations</span>
        </a>

      </li><!-- End Error 404 Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-envelope"></i>
          <span>Notification</span>
        </a>
      </li><!-- End Profile Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-file"></i>
          <span>Fiche Adherant</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-file-earmark"></i>
          <span>Fiche Comptable</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Télépaiement</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Attestation</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Délégation de service</span>
        </a>
      </li><!-- End Error 404 Page Nav -->


      @endif

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main" style="height: 100vh">



@yield('content-front')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  {{-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Caisse nationale de Sécurité Sociale</span></strong>. All Rights Reserved
    </div>

  </footer><!-- End Footer --> --}}

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="{{ asset('back/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('back/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('back/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('back/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('back/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ asset('back/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('back/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('back/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('back/assets/js/main.js')}}"></script>

  <script>
    // setting CSRF token in head section //
    $.ajaxSetup({
        headers: ({
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        })
    })
</script>

<script>
    $(document).ready(function(){
        // $('#submitEmployerBtn').submit(function(e){
        //     e.preventDefault();
        //     // let url = $(this).attr('action');
        //     // alert(url);
        //     var nom_employer = $('#nom_employer').val(); var matricule = $('#matricule').val();
        //     var prenom_employer = $('#prenom_employer').val(); var sexe_employer = $('#sexe_employer').val();
        //     var email_employer = $('#email_employer').val(); var date_embauche = $('#date_embauche').val();
        //     var situation_matrimoniale = $('#situation_matrimoniale').val(); var nationalite = $('#nationalite').val();
        //     var date_naissance_employer = $('#date_naissance_employer').val(); var lieu_naissance_employer = $('#lieu_naissance_employer').val();
        //     var etat_employer = $('#etat_employer').val(); var prenom_pere = $('#prenom_pere').val();
        //     var nom_pere = $('#nom_pere').val(); var entreprise_id = $('#entreprise_id').val();
        //     var nom_mere = $('#nom_mere').val(); var prenom_mere = $('#prenom_mere').val();
        //     var profession = $('#profession').val(); var n_cin = $('#n_cin').val();
        //     var date_del_cin = $('#date_del_cin').val(); var lieu_del_cin = $('#lieu_del_cin').val();
        //     var n_acte_naissance = $('#n_acte_naissance').val(); var date_del_acte_naissance = $('#date_del_acte_naissance').val();
        //     var lieu_del_acte_naissance = $('#lieu_del_acte_naissance').val(); var adresse_employer = $('#adresse_employer').val();

        //     //    alert(prenom_employer);

        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('ajout-employer') }}",
        //         dataType: 'json',
        //         data:{nom_employer:nom_employer, matricule:matricule, prenom_employer:prenom_employer,
        //             sexe_employer:sexe_employer, email_employer:email_employer, date_embauche:date_embauche,
        //             situation_matrimoniale:situation_matrimoniale, nationalite:nationalite, date_naissance_employer:date_naissance_employer,
        //             lieu_naissance_employer:lieu_naissance_employer, etat_employer:etat_employer, prenom_pere:prenom_pere,
        //             nom_pere:nom_pere, nom_mere:nom_mere, prenom_mere:prenom_mere, nom_pere:nom_pere, nom_mere:nom_mere, prenom_mere:prenom_mere,
        //             profession:profession, n_cin:n_cin, prenom_mere:prenom_mere, date_del_cin:date_del_cin, lieu_del_cin:lieu_del_cin, n_acte_naissance:n_acte_naissance,
        //             date_del_acte_naissance:date_del_acte_naissance, lieu_del_acte_naissance:lieu_del_acte_naissance, adresse_employer:adresse_employer,
        //             entreprise_id:entreprise_id},
        //         beforeSend: function(){
        //                 $("#loader").show();
        //         },
        //             complete: function(){
        //                 $("#loader").hide();
        //         },
        //         success: function(data) {
        //              console.log(data);
        //             if (data === "success") {
        //                 // Swal.fire({
        //                 //     title: 'Succés!',
        //                 //     text: 'Cet Employé a été  déclaré(e)',
        //                 //     icon: 'success',
        //                 // });
        //                 // window.location.href = "immatriculation";

        //                 Swal.fire({
        //                 title: "Succés!",
        //                 text: "Cet Employé a été  déclaré(e)",
        //                 icon: "success",

        //                 confirmButtonColor: "#3085d6",

        //                 confirmButtonText: "OK"
        //                 }).then((result) => {
        //                 if (result.isConfirmed) {
        //                     window.location.href = "immatriculation";
        //                 }
        //                 });
        //             }
        //             else{
        //                 Swal.fire({
        //                     title: 'Erreur!',
        //                     text: 'Cet Employé a été déjà déclaré(e)',
        //                     icon: 'error',
        //                 });
        //             }
        //         }
        //     })
        // });
    });

    // //// Getting Employer info ////
    // $(document).ready(function(){
    //     $("#n_immat_tele").change(function(){
    //        var immatriculation = $("#n_immat_tele").val();
    //     //    alert(immatriculation)
    //         $.ajax({
    //             type: 'GET',
    //             url: "{{ route('get-employer') }}",
    //             dataType: 'json',
    //             data:{immatriculation:immatriculation},
    //             success: function(data) {
    //                 // console.log(data.nom_employer);
    //                 $("#nom_employer").val(data.nom_employer);
    //                 $("#prenom_employer").val(data.prenom_employer);

    //             }
    //         });
    //     });
    // });
</script>
</body>

</html>
