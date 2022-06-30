@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 ">
                            Imoveis Cadastrados 
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col"> Localização</th>
                                <th scope="col"> Descrição</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($imoveis as $key => $imovel)
                                <tr>
                                    <th scope="row">{{ $imovel['id'] }}</th>
                                    <td>{{ $imovel['nome'] }}</td>
                                    <td>{{  $imovel['localizacao'] }}</td>
                                    <td>{{  $imovel['descricao'] }}</td>
                                    <td><a href="{{ route('imovel.show', ['imovel' => $imovel['id']]) }}">Visualizar</a></td>
                                    <td><a href="{{ route('imovel.edit', ['imovel' => $imovel['id']])}}"> Editar </a></td>
                                    <td>
                                        <form id="form_{{$imovel['id']}}" method="post" action="{{ route('imovel.destroy', ['imovel' => $imovel['id']]) }}">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <a href="#" onclick="document.getElementById('form_{{$imovel['id']}}').submit()">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 

                    <nav aria-label="Page navigation example" >
                    <ul class="pagination ">
                        <li class="page-item"><a class="page-link" href="{{$imoveis->previousPageUrl()}}">Previous</a></li>
                        @for( $i = 1; $i <= $imoveis->lastPage(); $i++)
                        <li class="page-item {{ $imoveis->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{$imoveis->url($i)}}">{{$i}}</a></li>
                        @endfor 
                        <li class="page-item"><a class="page-link" href="{{$imoveis->nextPageUrl()}}">Next</a></li>
                    </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
