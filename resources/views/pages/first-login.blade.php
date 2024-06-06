<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Changement de mot de passe</title>
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

  <!-- Template Main CSS File -->
  <link href="{{ asset('back/assets/css/style.css')}}" rel="stylesheet">
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
    .logo img {
        max-height: 200px;
    }
</style>
<body>
    @include('sweetalert::alert')
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="logo  justify-content-center py-4">
                    <div class=" d-flex align-items-center w-auto" style="position: relative; left:80px">
                      <img src="{{ asset('images/Logocnss.png') }}" width="150" height="150" alt="" >

                    </div>
                    <H4 class="text-center align-items-center w-auto">CAISSE NATIONALE DE LA SECURITE SOCIALE</H4>
                  </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Bienvenue Mme/Mr {{ $name }} </h5>
                    <p class="text-center small">C'est votre Première Connexion sur notre Plateforme. veillez Change votre mot de passe svp !</p>
                  </div>
                    {{-- @error('login') --}}
                        <div class="alert alert-danger d-none" id="error-alert">Numéro ou mot de passe incorrect</div>
                    {{-- @enderror --}}
                  <form class="row g-3 needs-validation" method="POST" action="{{ route('first_login_password') }}" novalidate>
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}" id="">
                    <div class="col-12">
                      <label for="formGroupExampleInput2" class="form-label">Nouveau Mot de passe</label>
                      <input type="password" name="password" required class="form-control" id="password" placeholder="Nouveau Mot de passe">

                                @error('password')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                    </div>

                    <div class="col-12">
                      <label for="formGroupExampleInput2" class="form-label">Confirmation Mot de passe</label>
                      <input type="password" name="password_confirmation" required class="form-control" id="password_confirmation" placeholder=" Confirmer votre mot de passe">

                                @error('password_confirmation')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                    </div>

                    <div class="col-12">
                      {{-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div> --}}
                    </div>
                    <div class="col-12">
                      <button class="btn btn-success w-100"  type="submit">Changer</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0 text-danger">
                        Le mot de passe doit etre compose de chiffre ,lettre minuscule,
                          lettre Majuscule, characteres special
                      </p>
                    </div>
                  </form>

                </div>

                <div>
                    {{-- <img src="{{ asset('images/Logocnss.png') }}" width="100%" height="500" style="position: absolute; top:-50px;opacity: 0.1; z-index:-1"> --}}
                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                {{-- CAISSE NATIONALE DE LA SECURITE SOCIALE --}}
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
//  location.reload();

       $(document).ready(function(){
            $("#login-form").submit(function(e){
                e.preventDefault();

                if ($("#n_affiliation").val() == '') {
                    return false;
                } else if($("#password").val() == ''){

                }
                else {
                    var data = $("#login-form").serialize();

                    $.ajaxSetup({
                        headers: ({
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        })
                    })

                    $.ajax({
                        type:'POST',
                        url: "{{ route('login-ajax') }}",
                        data: 'json',
                        data:data,
                        success: function(data){
                            if (data === 'error') {
                                $("#error-alert").removeClass('d-none');
                            }
                            else{
                                window.location.href ="dashboard";
                            }
                        }
                    });
                }

            })
       })

</script>


</body>

</html>

