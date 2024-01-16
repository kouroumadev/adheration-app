@extends('pages.frontView.master')
@section('content-front')

<section class="section dashboard">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Liste des Employés</h5>


                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <div class="row mb-2" style="width: 200px; margin:auto">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEmployer"> <i
                                    class="bi bi-plus"></i> Ajout Employer</button>
                        </div>
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Libelle</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Debit</th>
                                <th scope="col">credit</th>
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                                <tr>

                                    <td> </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    {{-- <td></td> --}}
                                </tr>



                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection
