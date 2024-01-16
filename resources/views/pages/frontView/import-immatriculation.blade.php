@extends('pages.frontView.master')
@section('content-front')
    <section class="section dashboard">

        <div class="row">

                <div class="col-sm-10">

                    <div class="card">
                        <div class="card-header mb-3">
                            Téléchargement du fichier
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('new-employee') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-6 mb-3">
                                    <input type="file" class="form-control" name="employee_file" type="file" id="employee_file">
                                </div>

                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Enregister</button>
                                </div>
                            </form>

                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-success">
                                <a
                                    href='/asset/employee_list.xlsx' target="_blank"
                                style="color:#fff;">Telecharger le fichier teste</a>

                            </button>
                        </div>

                    </div>

                </div>

        </div>

        <div class="row m-auto">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <table class="table datatable">
                            {{-- <div class="row mb-2" style="width: 200px;">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEmployer"> <i
                                        class="bi bi-save"></i> Ajout Employer</button>
                            </div> --}}
                            <thead>
                                <tr>
                                    <th scope="col">Numéro Affiliation</th>
                                    <th scope="col">Matricule</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date de Naissance</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employers as $dem)
                                    <tr>

                                        <td> <a href="{{ route('employer-detail',$dem['id']) }}"> {{ $dem['n_immatriculation'] }}</a></td>
                                        <td>{{ $dem['matricule'] }}</td>
                                        <td>{{ $dem['prenom_employer'] }}</td>
                                        <td>{{ $dem['nom_employer'] }}</td>
                                        <td>{{ $dem['date_naissance_employer'] }}</td>
                                        <td><button  class="btn btn-danger rounded-pill" id="{{ $dem['id'] }}" onclick="Libre(this.id)">Sortie</button></td>
                                    </tr>
                                @endforeach
                                {{-- {{ route('liberer-employer', $dem['id']) }} --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
