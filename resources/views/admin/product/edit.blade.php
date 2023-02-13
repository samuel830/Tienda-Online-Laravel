@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="card-header">
    Editar productos
</div>
<div class="card-body">
    <form method="POST" action="{{ route('admin.product.update', ['id'=> $viewData['product']->getId()]) }}" enctype="multipart/form-data">
        @method('PUT')
        {{@csrf_field()}}
        {{@method_field('PUT')}}
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                    <input name="name"  type="text" class="form-control" value="{{$viewData["product"]["name"]}}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                    <input name="price" type="number" class="form-control" value="{{$viewData["product"]["price"]}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" name="description" rows="3">{{$viewData["product"]["description"]}}</textarea>
        </div>
        <div class="mb-3">
            <img src="{{asset('storage/'.$viewData["product"]["image"])}}" alt="imagenProducto">
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input class="form-control" name="image" type="file">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
</div>
@endsection