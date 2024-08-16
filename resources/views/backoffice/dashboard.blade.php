@extends('layouts.app')

@section('title', 'Titulo de la págia')

@section('page-title', 'Dashboard')



@section('css')
    <!-- Custom CSS files here-->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {{-- <div class="card car-primary card-outline">
                    <div class="card-header">
                        Encabezado
                    </div>
                    <div class="card-body">
                        Cuerpo de la tarjeta
                    </div>
                    <div class="card-footer">
                        Pie de la tarjeta
                    </div>
                </div> --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Proyectos</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Proyecto</th>
                                    <th>Status</th>
                                    <th style="width: 40px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-danger"></span></td>
                                    {{-- @foreach ($datos as $registro)
                                    <tr>
                                        <td>{{ $registro->id }}</td>
                                        <td>{{ $registro->nombre }}</td>
                                        <td>{{ $registro->activo }}</td>
                                        <td>Acciones</td>
                                    </tr>
                                @endforeach --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
