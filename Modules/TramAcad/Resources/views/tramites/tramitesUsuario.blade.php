{{-- @extends('.pages.panelBase') --}}
{{-- @include('pages.panelBase') --}}
@extends('layouts.panelBase')

@section('panel_title', 'Tramites usuario')

@section('solicitudes')
    <div class="container row">

        {{-- <h1>Pagina de solicitudes</h1> --}}
        @if(! $usuarios->isEmpty())
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>NombreTramite</th>
                                <th>Solicitante</th>
                                <th>Estado Actual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $solicitud)
                            <tr>
                                <td>{{ $solicitud->detalle_solicitud }}</td>
                                <td>{{ $solicitud->user->name}}</td>
                                <td>{{ $solicitud->Unidad->nombre_unidad }}</td>
                            </tr>
                            @endforeach						
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
        @else
        <h1>No tiene solicitudes</h1>
        @endif
    </div>
@endsection
