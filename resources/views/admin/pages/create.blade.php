@extends('adminlte::page')

@section('title','Nova Página')

@section('content_header')
    <h1>
        Nova Página
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
            <form action="{{ROUTE('pages.store')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Titulo da Pagina</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" id="inputEmail3" placeholder="Titulo Pagina">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Corpo</label>
                    <div class="col-sm-10">
                        <textarea name="body"  class="form-control" cols="30" rows="5" >
                            {{old('body')}}
                        </textarea>
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