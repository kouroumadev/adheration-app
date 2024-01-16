{{-- @extends('pages.master')
@section('content') --}}

{{-- <section class="ftco-section" style="margin-top: 150px">
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
                    <label for="formGroupExampleInput" class="form-label">No Affiliation</label>
                    <input type="text"  name="login" :value="old('login')" required class="form-control" id="login" placeholder="No Affiliation">
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
</section> --}}
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Connexion</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>

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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="logo d-flex justify-content-center py-4">
                <div class=" d-flex align-items-center w-auto">
                  <img src="{{ asset('images/Logocnss.png') }}" width="150" height="150" alt="">

                </div>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Bienvenue !</h5>
                    <p class="text-center small">Connectez vous a votre compte</p>
                  </div>
                    {{-- @error('login') --}}
                        <div class="alert alert-danger d-none" id="error-alert">Numéro ou mot de passe incorrect</div>
                    {{-- @enderror --}}
                  <form class="row g-3 needs-validation" novalidate id="login-form">
                        @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Numéro Immatriculation</label>
                      <div class="input-group has-validation">
                        {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                        <input type="text" name="n_affiliation" class="form-control" id="n_affiliation" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mot de passe</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      {{-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div> --}}
                    </div>
                    <div class="col-12">
                      <button class="btn btn-success w-100"  type="submit">Connexion</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"> Mot de passe Oublié?<a href="#"> Clickez ici .</a></p>
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
                CAISSE NATIONALE DE LA SECURITE SOCIALE
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  {{-- <script src="http://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}
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
                    var mydata = $("#login-form").serialize();
                    // console.log('DATTTA: ',mydata);

                    $.ajaxSetup({
                        headers: ({
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        })
                    })

                    $.ajax({
                        url: "{{ route('login-ajax') }}",
                        type:'POST',
                        dataType: 'json',
                        data:mydata,
                        success: function(data){
                            console.log("DATA ",data);
                            if (data === 'error') {
                                $("#error-alert").removeClass('d-none');
                            }
                            else{
                                console.log("DATA ",data);
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
{{-- @endsection --}}
