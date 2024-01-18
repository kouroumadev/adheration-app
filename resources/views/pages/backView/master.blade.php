<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin </title>
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
  <link href="{{ asset('back/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/validate.css') }}">

  <!-- Template Main CSS File -->
  <link href="{{ asset('back/assets/css/style.css')}}" rel="stylesheet">
<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="font-family:'Poppins', sans-serif">

    @include('sweetalert::alert')
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('images/Logocnss.png') }}" alt="">
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
              {{-- <span>Web Designer</span> --}}
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
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
            <form action="{{ route('logout') }}" method="post">
                @csrf
              <a class="dropdown-item d-flex align-items-center">
                <i class="bi bi-box-arrow-right"></i>
               <button type="submit"><span>Sign Out</span></button>
              </a>
            </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Tableau de Bord</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <li class="nav-heading">Traitement des Demandes</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('demande-non-approuve') }}">
          <i class="bi bi-envelope"></i>
          <span>Demandes Non Approuvées</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('demande-approuve') }}">
          <i class="bi bi-envelope-check"></i>
          <span>Demandes Approuvées</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('facturation') }}">
          <i class="bi bi-envelope-check"></i>
          <span>Facturation</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main" style="height: 100vh">
    @yield('back-content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

    </div>
  </footer><!-- End Footer -->

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
    function getInfo(id){
        var id = id;

        $.ajax({
                type: 'GET',
                url: "{{route('get-info')}}",
                dataType: 'json',
                data:{id:id},
                success: function(data) {
                    $("#r_sociale").text(data.raison_sociale)
                    $("#n_emp").text(data.n_emp)
                    $("#e_categorie").text(data.categorie)
                    $("#nom_rep").text(data.prenom+" "+data.nom)
                    $("#phone_rep").text(data.telephone)
                    $("#adresse_rep").text(data.adresse_re)
                    $("#identite_rep").text(data.document_identite)
                    // console.log(data.n_emp)
                }
            })
    }

    function InitClicked(id){
         $('#emp_id').val(id);
            // alert(emp_id)
    }

    function InitFact(){
        var id = $('#emp_id').val();
        var trimmestre = $('#select-trimestre').find(":selected").val();
        $.ajax({
            type:'POST',
            url: "{{ route('insert-facture') }}",
            data: 'json',
            data:{id:id,trimmestre:trimmestre},
            success: function(data){

            }
        });
    }
    // function approuver(){
    //     var id = $('#ass_id').val();
    //     var n_affiliation = $('#n_affiliation').val()
    //     $.ajax({
    //             type: 'GET',
    //             url: '/approuve-demande/',
    //             dataType: 'json',
    //             data:{id:id,n_affiliation:n_affiliation},
    //             success: function(data) {
    //                 if (data == "empty") {
    //                     $('#error').removeClass('d-none')
    //                     $('#error').text('Le champ ne doit pas etre vide')
    //                 }
    //             }
    //         })
    // }
  </script>

</body>

</html>
