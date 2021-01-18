@extends('adminlte::page')

@section('title', 'Configurções do site')

@section('content_header')
    <h1>Configurções do site</h1>
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

    @if(session('warning'))
        <div class="alert alert-success">
            
            {{session('warning')}}
            
        </div>
    @endif


  <div class="card">
      <div class="card-body">
          <form action="{{route('settings.save')}}" method="POST" class="form-horizontal">
            @method('PUT')            
            @csrf
           
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Título do site</label>
                <label class="col-sm-10 ">
                    <input type="text" name="title" value="{{$settings['title']}}" class="form-control">
                </label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sub-título do site</label>
                <label class="col-sm-10 ">
                    <input type="text" name="subtitle" value="{{$settings['subtitle']}}" class="form-control">
                </label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">E-mail para contato</label>
                <label class="col-sm-10 ">
                    <input type="email" name="email" value="{{$settings['email']}}" class="form-control">
                </label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Cor do Fundo do Site</label>
                <label class="col-sm-2 ">
                    <input type="color" name="bgColor" value="{{$settings['bgColor']}}" class="form-control">
                </label>
                <label class="col-sm-7"></label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Cor do Texto do Site</label>
                <label class="col-sm-2">
                    <input type="color" name="textColor" value="{{$settings['textColor']}}" class="form-control">
                </label>
                <label class="col-sm-7"></label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <label class="col-sm-10 ">
                    <input type="submit" value="Salvar" class="btn btn-success">
                </label>
            </div>

          </form>
      </div>
  </div>
@endsection