@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Usuários</div>
                <div>
                    <a href="{{ route('user.create') }}" style="float:right; margin-right:10px;">Novo Usuário</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse">
                        <thead class="thead-inverse">
                            <tr>
                                <th>No</th>
                                <th>Nome</th>
                                <th>Data Nascimento</th>
                                <th>Foto</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nome }}</td>
                                <td>{{ $item->data_nascimento }}</td>
                                <td> <img src="{{ asset("images/".$item->foto)}}" width="20px" ></td>   
                                <td>
                                    <a href="{{ route('user.edit',$item->id) }}">Editar</a> 
                                     |
                                    <a href="{{ route('user.delete',$item->id) }}">Excluir</a>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection