@extends('adminlte::page')

@section('title', 'Meu Perfil')

@section('content_header')
    <h1>Meu Perfil</h1>
@endsection

@section('content')
    @if($errors->any())
    <div class="alert alert-success">
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

<!--<div class="card-header">

</div> -->
        <div class="card-body">
            <form action="{{ROUTE('profile.save')}}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" id="inputEmail3" placeholder="Nome Completo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" id="inputEmail3" placeholder="E-mail">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nova senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputEmail3" placeholder="Informe a senha">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Confirme da Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="inputEmail3" placeholder="Confirme a senha">
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