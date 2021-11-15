@extends("home");

@section('title','Panel');
@section('panel','active');

@section('content')

<nav class="navbar navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <span><a href="/" style="text-decoration:none" class="color3"> INCIO </a></span>
                <span><a href="/../jugadores" style="text-decoration:none" class="color3"> JUGADORES&ensp; &ensp;</a></span>
                <span><a href="/../estadisticas" style="text-decoration:none" class="color3"> EQUIPO&ensp; &ensp;</a></span>
                <span><a href="/../sedes" style="text-decoration:none" class="color3"> SEDE&ensp; &ensp;</a></span>
                <span><a href="/../panelInicio" style="text-decoration:none" class="color3"> PANEL COMNTROL&ensp; &ensp;</a></span></a></span>
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    
                </div>
            </nav>

    <div class="row" style="margin-top: 20px; margin-left: 20px; margin-right: 20px">

        
        <div class="col-lg-3">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="panel-heading">Cliente</div>
                <div class="panel-body"><a href={{ URL::to('/panel/verCliente') }}>Ver</a></div>
                <div class="panel-body"><a href={{ URL::to('/panel/newCliente') }}>Insertar</a></div>
            </div>
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="panel-heading">Torneo</div>
                <div class="panel-body"><a href={{ URL::to('/panel/verTorneo') }}>Ver</a></div>
                <div class="panel-body"><a href={{ URL::to('/panel/newTorneo') }}>Insertar</a></div>
            </div>
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="panel-heading">Equipo</div>
                <div class="panel-body"><a href={{ URL::to('/panel/verEquipo') }}>Ver</a></div>
                <div class="panel-body"><a href={{ URL::to('/panel/newEquipo') }}>Insertar</a></div>
            </div>
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="panel-heading">Sede</div>
                <div class="panel-body"><a href={{ URL::to('/panel/verSede') }}>Ver</a></div>
                <div class="panel-body"><a href={{ URL::to('/panel/newSede') }}>Insertar</a></div>
            </div>

            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="panel-heading">Jugadores</div>
                <div class="panel-body"><a href={{ URL::to('/panel/verJugador') }}>Ver</a></div>
                <div class="panel-body"><a href={{ URL::to('/panel/newJugador') }}>Insertar</a></div>
            </div>
        </div>

        <div class="col-lg-9">
            
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

@if(!isset($sede))
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Sede</th>
      <th scope="col">Direccion</th>
      <th scope="col">ACTUALIZAR</th>
      <th scope="col">BORRAR</th>
     
    </tr>
  </thead>

  @forelse($sedes as $sede)
  <tbody>
    <tr>

                            <td>{{$sede->id}}</td>
                            <td>{{$sede->sede}}</td>
                            <td>{{$sede->direccion}}</td>
                            <td><a href={{ URL::to('panel/'.$sede->id.'/editSede') }}><button type="button" class="btn btn-light">Actualizar</button></a></td>
                            <td><a href={{ URL::to('panel/'.$sede->id.'/destroySede') }}><button type="button" class="btn btn-danger">Eliminar</button></a></td>
     
    </tr>
  </tbody>

   @empty
                        <tr class="text-center" id="celdas">
                            <td colspan="7">NO HAY DATOS CARGADOS</td>
                        </tr>
                    @endforelse
</table>
                
                    @endif

                    

                @if(isset($sede))

                <form action="{!! route("panel.updateSede",$sede->id) !!}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                    <h3 class="text-danger text-center" style="font-size: 40px">Id:{{ $sede->id }}</h3><br>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Sede: </label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" value="{!! $sede->sede !!}" name="sede" placeholder="Sede">
                        </div>

                        <label class="control-label col-lg-2">Direccion: </label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" value="{!! $sede->direccion !!}" name="direccion" placeholder="Direccion">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block" style="margin-top:100px;">Actualizar</button>
                    </div>

                </form>

                @endif

        </div>





    </div>

@endsection





