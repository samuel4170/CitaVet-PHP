@extends('template')
@section('content-logged-in')
<div class="content-wrapper">

    <section class="content-header">

        <h1>Buscar citas</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Doctor</th>
                            <th>Dueño</th>
                            <th>Nombre animal</th>
                            <th>Medicamento</th>
                            <th>Fecha Cita</th>
                            <th>Fecha proxima</th>
                        </tr>
                    </thead>

                <tbody>
                    @foreach($citas as $cita)

                    <tr>
                        <td>{{ $cita->id}}</td>
                        <td>{{ $cita->PAC3->name}}</td>
                        <td>{{ $cita->PAC->owner_name}}</td>
                        <td>{{ $cita->PAC->pet_name}}</td>
                        <td>{{ $cita->PAC1->name}}</td>
                        <td>{{ $cita->FyHinicio}}</td>
                        <td>{{ $cita->FyHinicio}}</td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
            </div>
        </div>

    </section>

</div>
@endsection
