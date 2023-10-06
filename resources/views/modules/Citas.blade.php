@extends('template')
@section('content-logged-in')
<div class="content-wrapper">

    <section class="content-header">

        <h1>Horarios</h1>

        @if($horarios == null)

            <form method="post" action="{{ url('Horario')}}">

            @csrf

                <div class="row">

                    <div class="col-md-2">

                    Desde <input type="time" class="form-control" name="horaInicio">
                    
                    </div>

                    <div class="col-md-2">
                    Hasta <input type="time" class="form-control" name="horaFin">
                    </div>

                    <br>

                    <div class="col-md-1">

                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>

                </div>

            </form>



            @else

            @foreach($horarios as $hora)
                <form method="post" action="{{ url('editar-horario/'.$hora->id) }}">
    
                @csrf
                @method('put')
    
                    <div class="row">
    
                        <div class="col-md-2">
    
                        Desde <input type="time" class="form-control" name="horaInicioE" value="{{ $hora->horaInicio }}">
                        
                        </div>
    
                        <div class="col-md-2">
                        Hasta <input type="time" class="form-control" name="horaFinE" value="{{ $hora->horaFin }}">
                        </div>
    
                        <br>
    
                        <div class="col-md-1">
    
                            <button type="submit" class="btn btn-success">Editar</button>
    
                        </div>
    
                    </div>
    
                </form>
    
            @endforeach
    
        @endif
    </section>

    <section class="content">
        <div class="box">

            <div class="box-body">

                <div id="calendario"></div>

            </div>

        </div>
    </section>
    
</div>   

<div class="modal fade" id="CitaModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" autocomplete="off">

                @csrf
                <div class="modal-body">
                    <div class="box-body">

                        <div class="form-group">
                            <h2>Seleccionar Propietario</h2> 
                            <input type="hidden" name="id_doctor" value="{{ auth()->user()->id }}">
                            <select required="" name="id_paciente" id="selet2" style="width: 100%">

                                <option value="">Propietario</option>

                                @foreach($pacientes as $paciente)
                                @if($paciente->status == "1")
                                    
                                    {{-- Data important!!!! --}}
                                    <option value="{{ $paciente->id }}">{{ $paciente->owner_name }} - {{ $paciente->pet_name }} </option>
                                
                                    @endif
                            @endforeach

                            </select>
                        </div>
            
                        {{-- <div class="form-group">
                            <h2>Seleccionar animal</h2> 
                            <input type="hidden" name="id_doctor" value="{{ auth()->user()->id }}">
                            <select required="" name="id_animal" id="selet3" style="width: 100%">

                                <option value="">Nombre perro</option>

                                @foreach($pacientes as $paciente)
                                @if($paciente->status == "1")

                                    <option value="{{ $paciente->id }}">{{ $paciente->pet_name }}</option>
                                
                                @endif
                            @endforeach

                            </select>
                        </div> --}}

                        <div class="form-group">
                            <h2>Seleccionar medicamento</h2> 
                            <input type="hidden" name="id_doctor" value="{{ auth()->user()->id }}">
                            <select required="" name="id_medicamento" id="selet4" style="width: 100%">

                                <option value="">medicamento</option>

                                @foreach($medicinas as $paciente)

                                    <option value="{{ $paciente->id }}">{{ $paciente->name }}</option>
                                
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <h2>Fecha</h2>
                            <input type="text" class="form-control input-lg" id="Fecha" readonly="">
                        </div>

                        <div class="form-group">
                            <h2>Hora</h2>
                            <input type="hidden" class="form-control input-lg" id="Hora" readonly="">

                            <input type="text" name="FyHinicio" class="form-control input-lg" id="FyHinicio" readonly="">
                            <input type="text" name="FyHfinal" class="form-control input-lg" id="FyHfinal">

                        </div>

                        {{-- Proxima cita --}}
                        <div class="form-group">
                            <h2>Fecha y hora roxima</h2>
                            <input type="hidden" class="form-control input-lg" id="Hora" readonly="">

                            <input type="hidden" class="form-control input-lg" id="Hora" readonly="">

                            <input type="datetime-local" name="FyHinicio" class="form-control input-lg" id="FyHinicio">
                            <input type="datetime-local" name="FyHfinal" class="form-control input-lg" id="FyHfinal">

                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Pedir Cita</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- eliminar / cancelr --> 
<div class="modal fade" id="EventoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ url('borrar-cita')}}">
                @csrf
                @method('delete')

                <div class="modal-body">
                    <div class="form-group">
                        <h3>Paciente:</h3>
                        <h4 id="paciente"></h4>

                        <input type="hidden" name="idCita" id="idCita">

                        <?php
                            $exp = explode("/", $_SERVER["REQUEST_URI"]);

                            echo '<input type="hidden" name="idDoctor" value="'.$exp[4].'">';
                        ?>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Cancelar Cita</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Cerrar</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
