@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pesquisar inclino</div>

                <div class="card-body">

                    <form method="Post" action="{{ route('inclino.pesquisa') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nº Bilhete</label>
                            <input type="text" class="form-control" name="numero_bi" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                     <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="genero">
                            <option >Selecione o seu Genero</option>
                        @foreach ($generos as $genero)
                             <option value="{{$genero->genero}}">{{$genero->genero}}</option>
                        @endforeach
                        </select>
                      </div>
    
                        <div class="mb-3">
                            <label class="form-label">Contacto</label>
                            <input type="text" class="form-control" name="contacto">
                        </div>
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection