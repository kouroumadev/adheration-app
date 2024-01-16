@extends('pages.backView.master')
@section('back-content')


<section class="section dashboard">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Initialisation des Factures</h5>


                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        {{-- <div class="row mb-2" style="width: 200px; margin:auto">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEmployer"> <i
                                    class="bi bi-plus"></i> Ajout Employer</button>
                        </div> --}}
                        <thead>
                            <tr>
                                <th scope="col">Raison Sociale</th>
                                <th scope="col">Nombre Employés</th>
                                <th scope="col">Catégorie</th>
                                <th scope="col">Action</th>
                                {{-- <th scope="col">credit</th> --}}
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employeur as $emp )
                            <tr>

                                <td>{{ $emp->raison_sociale }} </td>
                                <td>{{ $emp->nombre_emp }}</td>
                                <td>{{ $emp->categorie }}</td>
                                @if ($emp->categorie == "E+20")
                                    <td><a href="{{ route('initialisation-cotisation', $emp['id']) }}" class="btn btn-success rounded-pill">initié</a> </td>
                                @else
                                    <td><button class="btn btn-success rounded-pill" id="{{ $emp->id }}" data-bs-toggle="modal" data-bs-target="#periodeModal" onclick="InitClicked(this.id)">initié</button> </td>
                                @endif


                            </tr>
                            @endforeach




                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

    <!-- Modal -->
<div class="modal fade" id="periodeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Periode d'initialisation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <select class="form-select" name="select-trimestre" id="select-trimestre" aria-label="Default select example">
                <option selected>Trimestres</option>
                <option value="trimestre1">Trimèstre 1</option>
                <option value="trimestre2">Trimèstre 2</option>
                <option value="trimestre3">Trimèstre 3</option>
              </select>

              <input type="text" name="emp_id" id="emp_id">
        </div>
        <div class="modal-footer">

          <button class="btn btn-primary" onclick="InitFact()" id="initFact">initier</button>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
