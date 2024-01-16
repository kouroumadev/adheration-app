@extends('pages.backView.master')
@section('back-content')

<section class="section dashboard" >

    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Télé-declaration </span></h5>

                <div class=" align-items-center">

                  <div class="row w-100 mb-3">
                    <div class="col-8 ">Valide</div>
                    <div class="col-4">0</div>
                  </div>
                  <div class="row w-100 mb-3">
                    <div class="col-8 ">En cours</div>
                    <div class="col-4">0</div>
                  </div>
                  <div class="row w-100 mb-3">
                    <div class="col-8 ">Rejetes</div>
                    <div class="col-4">0</div>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Télé-Paiement </span></h5>

                <div class=" align-items-center">

                  <div class="row w-100 mb-3">
                    <div class="col-8 ">Valide</div>
                    <div class="col-4">0</div>
                  </div>
                  <div class="row w-100 mb-3">
                    <div class="col-8 ">En cours</div>
                    <div class="col-4">0</div>
                  </div>
                  <div class="row w-100 mb-3">
                    <div class="col-8 ">Rejetes</div>
                    <div class="col-4">0</div>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Immatriculation </span></h5>

                <div class=" align-items-center">


                  <div class="row w-100 mb-3">
                    <div class="col-8 ">Valide</div>
                    <div class="col-4">0</div>
                  </div>
                  <div class="row w-100 mb-3">
                    <div class="col-8 ">En cours</div>
                    <div class="col-4">0</div>
                  </div>
                  <div class="row w-100 mb-3">
                    <div class="col-8 ">Rejetes</div>
                    <div class="col-4">0</div>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->



        </div>
      </div><!-- End Left side columns -->


    </div>
</section>
@endsection
