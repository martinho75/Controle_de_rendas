@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 ">
                            Imoveis
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">localização</th>
                                <th scope="col">Descrição</th>
                            </tr>
                        </thead>

                        <tbody>
                                <tr>
                                    <th scope="row">{{ $imovel->id }}</th>
                                    <td>{{ $imovel->nome }}</td>
                                    <td>{{  $imovel->localizacao }}</td>
                                    <td>{{  $imovel->descricao }}</td>
                                </tr>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
