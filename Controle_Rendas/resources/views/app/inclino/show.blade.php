@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 ">
                            Inclino
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
                            </tr>
                        </thead>

                        <tbody>
                                <tr>
                                    <th scope="row">{{ $inclino->id }}</th>
                                    <td>{{ $inclino->nome }}</td>
                                    <td>{{  $inclino->numero_bi }}</td>
                                    <td>{{  $inclino->email }}</td>
                                    <td>{{  $inclino->genero }}</td>
                                    <td>{{  $inclino->contacto }}</td>
                                </tr>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>

@for( $i = count($inclino->fatura) - 1; $i >= 0; $i--)
{{$inclino->fatura[$i]['id_inclino']}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fatura
                 <a class="float-end px-2" href="{{route('fatura.exportar', ['id_fatura' => $inclino->fatura[$i]->id])}}" target="_blank"> pdf</a>
                </div>
               
                <div class="card-body">
                <form >  
                     <div class="mb-3">
                        <label class="form-label">Imovel</label>
                        <input type="text" class="form-control"  value="{{ $imovel->nome ?? $inclino->fatura[$i]->imovel->nome }}" disabled>
                    </div>

                     <div class="mb-3">
                        <label class="form-label">Pagamento Para:</label>
                        <input type="text" class="form-control"  value="{{ $inclino->fatura[$i]->pagamento_para }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Valor Mensal:</label>
                        <input type="text" class="form-control"  value="{{ $inclino->fatura[$i]->valor_mensal }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantidade de Meses:</label>
                        <input type="text" class="form-control"  value="{{ $inclino->fatura[$i]->quant_meses }}" disabled>
                    </div>
                        
                    <div class="mb-3">
                        <label class="form-label">Total Pago:</label>
                        <input type="text" class="form-control"  value="{{ $inclino->fatura[$i]->total }}" disabled>
                    </div>

                        <div class="mb-3">
                        <label class="form-label">Data Inicio</label>
                        <input type="text" class="form-control"  value={{ date('d/m/Y', strtotime($inclino->fatura[$i]->inicio)) }} disabled>
                        </div>
                        
                        <div class="mb-3">
                        <label class="form-label">Data termino</label>
                        <input type="text" class="form-control" name="fim" value={{ date('d/m/Y', strtotime($inclino->fatura[$i]->fim)) }} disabled>
                        </div>  
                  
                    @if( $inclino->fatura[$i]->observacao != '')
                         <div class="mb-3">
                        <label class="form-label">Observação</label>
                         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled> {{ $inclino->fatura[$i]->observacao }}</textarea> 
                        </div>  
                    @endif
                            
                </form>

                <div class="col-6 float-end">
                  <div class="">
                     <a href="{{route('fatura.show', ['fatura' => $inclino->fatura[$i]->id])}}" class="mr-3 px-2">Visualizar</a>
                     <a href="{{route('fatura.edit', ['fatura' => $inclino->fatura[$i]->id])}}" class="mr-3 px-2">Editar</a>
                     <a href="#" onclick="document.getElementById('form_{{$inclino->fatura[$i]->id}}').submit()">Excluir</a>
                         <form id="form_{{$inclino->fatura[$i]->id}}" method="post" action="{{ route('fatura.destroy', ['fatura' => $inclino->fatura[$i]->id]) }}">
                            @method('DELETE')
                            @csrf
                      </form>
                      
                  </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endfor
@endsection
