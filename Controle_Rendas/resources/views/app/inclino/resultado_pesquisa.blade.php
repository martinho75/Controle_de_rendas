@extends('layouts.app')

@section('content')
<div class="container " >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            Resultados da Pesquisa
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col"> Número de Bilhete</th>
                                <th scope="col"> Email</th>
                                <th scope="col"> Genero</th>
                                <th scope="col"> Contacto</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($inclinos as $key => $inclino)
                                <tr>
                                    <th scope="row">{{ $inclino['id'] }}</th>
                                    <td>{{ $inclino['nome'] }}</td>
                                    <td>{{  $inclino['numero_bi'] }}</td>
                                    <td>{{  $inclino['email'] }}</td>
                                    <td>{{  $inclino['genero'] }}</td>
                                    <td>{{  $inclino['contacto'] }}</td>
                                    <td><a href="{{ route('inclino.show', ['inclino' => $inclino['id']]) }}">Visualizar</a></td>
                                    <td><a href="{{ route('inclino.edit', ['inclino' => $inclino['id']]) }}">Editar</a></td>
                                    <td>
                                        <form id="form_{{$inclino['id']}}" method="post" action="{{ route('inclino.destroy', ['inclino' => $inclino['id']]) }}">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <a href="#" onclick="document.getElementById('form_{{$inclino['id']}}').submit()">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 

                      <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="{{$inclinos->previousPageUrl()}}">Previous</a></li>
                        @for( $i = 1; $i <= $inclinos->lastPage(); $i++)
                        <li class="page-item {{ $inclinos->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{$inclinos->url($i)}}">{{$i}}</a></li>
                        @endfor 
                        <li class="page-item"><a class="page-link" href="{{$inclinos->nextPageUrl()}}">Next</a></li>
                    </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
