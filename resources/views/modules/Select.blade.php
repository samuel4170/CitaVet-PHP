@extends('template')
@section('content')
<section class="content" style="background-color: #acbd99;">
    <div class="container text-center">
        <h1>Seleccione cómo desea Ingresar al Sistema</h1>
        <div class="row">
            <div class="col-lg-4"> <!-- Div izquierdo -->
                <div class="small-box" style="background-color: #F781D8; color:white;">
                    <div class="inner">
                        <h3>Secretaria</h3>
                        <p>Iniciar Sesión</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-female"></i>
                    </div>
                    <a href="Login" class="small-box-footer">
                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4"> <!-- Div derecho -->
                <div class="small-box" style="background-color: #FF0000; color:white;">
                    <div class="inner">
                        <h3>Doctor</h3>
                        <p>Iniciar Sesión</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-md"></i>
                    </div>
                    <a href="Login" class="small-box-footer">
                        Ingresar <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4"> 
                <img src="{{ asset('img/log.jpeg') }}" alt="Imagen" class="img-fluid">
            </div>
            
        </div>
    </div>
</section>
@endsection
