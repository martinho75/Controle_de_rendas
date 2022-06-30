@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pesquisar Fatura</div>

                <div class="card-body">
                   

        <form method="Post" action="{{ route('fatura.pesquisa') }}">

            @csrf
        
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="id_inclino">
                    <option >Selecione o seu Inclino</option>
                    @foreach ($inclinos as $inclino)
                        <option value="{{ $inclino->id }}">{{ $inclino->nome}}</option>
                    @endforeach
                </select>
                </div>
                <button type="submit" class="btn btn-primary">pesquisar</button>    
             </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection