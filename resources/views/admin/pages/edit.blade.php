@extends('adminlte::page')

@section('title','Editar Páginas')

@section('content_header')
    <h1>
        Editar Páginas     
    </h1>
@endsection

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <h5><i class="icon fas fa-ban"></i> Ocorreu erro no processo!</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">

        <!--<div class="card-header">

        </div> -->
        <div class="card-body">
            <form action="{{ROUTE('pages.update',['page'=>$page->id])}}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{$page->title}}" class="form-control @error('title') is-invalid @enderror" id="inputEmail3" placeholder="Título da Página">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Corpo</label>
                    <div class="col-sm-10">
                        <textarea name="body" cols="30" rows="10" class="form-control">{{$page->body}}</textarea>
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection