@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="card">
    <div class="card-header">
        Página para configurar el estilo de la página
    </div>
    <div class="card-body">
        <form action="{{ route('home.conf.save') }}" method="POST">
          @csrf
            <div class="form-group">
              <label>Cambia el color de la página:  </label>
              <input type="color" name="cambioColor" value="{{ session("color_encabezado","#00000")}}">
            </div>
            <br>
            <div class="form-group">
              <label>Cambia el tipo de lera de la página:</label>
              <select class="custom-select my-1 mr-sm-2" name="cambioLetra" >
                <option selected value="">Elige un tipo de letra</option>
                <option value="Arial">Arial</option>
                <option value="Verdana">Verdana</option>
                <option value="Tahoma">Tahoma</option>
                <option value="Courier">Courier</option>
                <option value="Helvetica">Helvetica</option>
                <option value="Cambria">Cambria</option>
              </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Modificar datos</button>
        </form>
    </div>
    </div>
@endsection