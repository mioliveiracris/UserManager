@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($user) ? "Atualiza User" : "Cadastro User" }}</div>

                    <div class="card-body">
                        <form id="itemFrom" role="form" method="POST"
                            action="{{ isset($user) ? route('user.update',$user->id) : route('user.create') }}"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @isset($user)
                                @method('PUT')
                            @endisset

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                <img src="images/{{ Session::get('image') }}">
                            @endif
    
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Oops!</strong> Existem erros na validação dos dados.
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="type">Nome</label>
                                    <input type="text" name="nome" value="{{ $user->nome ?? '' }}">
                                </div>
                       
                                <div class="form-group">
                                    <label for="type">Data de Nascimento</label>
                                    <input type="date" name="data_nascimento" value="{{ $user->data_nascimento ?? '' }}">
                                </div>

                                <div class="form-group">
                                    @isset($user)
                                        <img src="{{ asset("images/".$user->foto)}}" width="100px" ><br />
                                        <input type="file" name="foto" class="form-control">
                                    @else
                                        <label for="type">Foto</label>
                                        <input type="file" name="foto" class="form-control">
                                    @endisset
                                </div>
  
                                <button type="submit" class="btn btn-primary">
                                @isset($user)
                                    <i class="fas fa-arrow-circle-up"></i>
                                    <span>Atualizar</span>
                                @else
                                    <i class="fas fa-plus-circle"></i>
                                    <span>Cadastrar</span>
                                @endisset
                                </button>
  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection