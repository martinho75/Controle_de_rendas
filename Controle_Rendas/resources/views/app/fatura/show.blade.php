@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fatura
                 <a class="float-end px-2" href="{{route('fatura.exportar', ['id_fatura' => $fatura->id])}}" target="_blank"> pdf</a>
                </div>
               
                <div class="card-body">
                <form >  
                    <div class="mb-3">
                        <label class="form-label">Cliente</label>
                        <input type="text" class="form-control"  value="{{ $inclino->nome ?? $fatura->id_inclino }}" disabled>
                    </div>

                     <div class="mb-3">
                        <label class="form-label">Imovel</label>
                        <input type="text" class="form-control"  value="{{ $imovel->nome ?? $fatura->id_imovel }}" disabled>
                    </div>

                     <div class="mb-3">
                        <label class="form-label">Pagamento Para:</label>
                        <input type="text" class="form-control"  value="{{ $fatura->pagamento_para }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Valor Mensal:</label>
                        <input type="text" class="form-control"  value="{{ $fatura->valor_mensal }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantidade de Meses:</label>
                        <input type="text" class="form-control"  value="{{ $fatura->quant_meses }}" disabled>
                    </div>
                        
                    <div class="mb-3">
                        <label class="form-label">Total Pago:</label>
                        <input type="text" class="form-control"  value="{{ $fatura->total }}" disabled>
                    </div>

                        <div class="mb-3">
                        <label class="form-label">Data Inicio</label>
                        <input type="text" class="form-control"  value={{ date('d/m/Y', strtotime($fatura->inicio)) }} disabled>
                        </div>
                        
                        <div class="mb-3">
                        <label class="form-label">Data termino</label>
                        <input type="text" class="form-control" name="fim" value={{ date('d/m/Y', strtotime($fatura->fim)) }} disabled>
                        </div>  
                  
                    @if( $fatura->observacao != '')
                         <div class="mb-3">
                        <label class="form-label">Observação</label>
                         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled> {{ $fatura->observacao }}</textarea> 
                        </div>  
                    @endif
                            
                </form>

                <div class="col-6 float-end">
                  <div class="">
                     <a href="{{route('fatura.show', ['fatura' => $fatura->id])}}" class="mr-3 px-2">Visualizar</a>
                     <a href="{{route('fatura.edit', ['fatura' => $fatura->id])}}" class="mr-3 px-2">Editar</a>
                     <a href="#" onclick="document.getElementById('form_{{$fatura->id}}').submit()">Excluir</a>
                         <form id="form_{{$fatura->id}}" method="post" action="{{ route('fatura.destroy', ['fatura' => $fatura->id]) }}">
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
@endsection