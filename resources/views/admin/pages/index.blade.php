@extends('adminlte::page')

@section('title','Páginas')

@section('content_header')
    <h1>
        Minhas Páginas
        <a href="{{ route('pages.create') }}" class="btn btn-sm btn-success">Nova Página</a>
    </h1>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page) 
            
                        <tr>
                            <td>{{$page->id}}</td>
                            <td>{{$page->title}}</td>
                            <td>
                                <a href="{{ route('pagers.edit',['user' => $page->id]) }}" class="btn btn-sm btn-info">Editar</a> 
                                <form class="d-inline" method='POST' action="{{ route('pages.destroy',['user' => $page->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    
                    @endforeach
                </tbody>
            </table>       
        </div>
    </div>    
    <div>
        {{ $pages->links('pagination::bootstrap-4') }} 
    </div>

@endsection