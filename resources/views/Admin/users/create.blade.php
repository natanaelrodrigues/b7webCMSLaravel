@extends('adminlte::page')

@section('title','Novo Usuário')

@section('content_header')
    <h1>
        Novo Usuário        
    </h1>
@endsection

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ROUTE('users.store')}}" method="POST" class="form-horizontal">
        @csrf
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nome Completo</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="inputEmail3" placeholder="Nome Completo">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="email" name="email" value="{{old('email')}}" class="form-control" id="inputEmail3" placeholder="E-mail">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Senha</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="inputEmail3" placeholder="Informe a senha">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Confirme da Senha</label>
            <div class="col-sm-10">
                <input type="password" name="password_confirmation" class="form-control" id="inputEmail3" placeholder="Confirme a senha">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="submit" value="Cadastrar" class="btn btn-success">
            </div>
        </div>
    </form>


@endsection