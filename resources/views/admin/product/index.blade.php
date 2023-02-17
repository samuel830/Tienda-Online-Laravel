@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="card-header">
    Crear productos
  </div>
  <div class="card-body">

  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $errors )
          <li>{{ $errors }}</li>
        @endforeach
      </ul>
    </div>  
  @else
    {{$viewData["success"] ?? ""}}<br><br>
  @endif

    <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name"  type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Imagen</label>
        <input class="form-control" name="image" type="file">
      </div>
      <div class="mb-3">
        <label class="form-label">Especificaciones</label>
        <input class="form-control" name="especificaciones" type="file">
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Panel de control de productos
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>

        <!--****** MUESTRA EL LISTADO DE LOS PRODUCTOS *****-->
        @foreach ($viewData['products'] as $product)
            <tr>
                <tr>
                    <th scope="row">{{$product["id"]}}</th>
                    <td>{{$product["name"]}}</td>
                    <td>
                      <a href="{{ @route('admin.product.edit', $product->getId()) }}" class="btn bg-warning text-white">Editar</a>
                    </td>
                    <!--<td><a href="" class="btn bg-warning text-white">Editar</a></td>-->
                    <td>
                      <form action="{{ @route('admin.product.delete', $product->getId()) }}" method="POST">
                        @method('DELETE')
                        {{@csrf_field()}}
                        {{@method_field('DELETE')}}
                        <button class="btn bg-danger text-white">
                            Eliminar
                        </button>
                      </form>
                    </td>
                    <!--<td><a href="products/{{$product["id"]}}" class="btn bg-danger text-white">Eliminar</a></td>-->
                </tr>
            </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
<!--****** FIN CONTENIDO ******-->
@endsection

