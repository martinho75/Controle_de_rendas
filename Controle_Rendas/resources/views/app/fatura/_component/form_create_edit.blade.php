 @if(isset($fatura->id))
  <form method="Post" action="{{ route('fatura.update', ['fatura' => $fatura->id]) }}">  
     @csrf
     @method('PUT')
 @else
  <form method="Post" action="{{ route('fatura.store') }}">  
     @csrf
 @endIf
    
     <div class="mb-3">
          <select class="form-select" aria-label="Default select example" name="id_inclino">  
             <option >Selecione o seu Inclino</option>
               @foreach ($inclinos as $inclino)
               <option value="{{ $inclino->id }}" {{ ($fatura->id_inclino ?? old('id_inclino')) == $inclino->id ? 'selected' : ''}}>{{ $inclino->nome}}</option>
               @endforeach
          </select>
          {{ $errors->has('id_inclino') ? $errors->first('id_inclino') : '' }}
        </div>

         <div class="mb-3">
          <select class="form-select" aria-label="Default select example" name="id_imovel">
             <option >Selecione o  Imovel</option>
               @foreach ($imoveis as $imovel)
                <option value="{{ $imovel->id }}" {{ ($fatura->id_imovel ?? old('id_imovel')) == $imovel->id ? 'selected' : ''}}>{{ $imovel->nome}}</option>
               @endforeach
          </select>
          {{ $errors->has('id_imovel') ? $errors->first('id_imovel') : '' }}
        </div>

        <div class="mb-3">
          <select class="form-select" aria-label="Default select example" name="pagamento_para">
             <option >Pagamento para</option>
               @foreach ($pagamentos as $pagamento)
                <option value="{{ $pagamento->pagamento_para }}" {{ ($fatura->pagamento_para ?? old('pagamento_para')) == $pagamento->pagamento_para ? 'selected' : ''}}> {{$pagamento->pagamento_para}} </option>
               @endforeach
          </select>
          {{ $errors->has('pagamento_para') ? $errors->first('pagamento_para') : '' }}
        </div>

         <div class="mb-3">
        <label class="form-label">Valor Mensal</label>
        <input type="number" class="form-control" name="valor_mensal" value={{ $fatura->valor_mensal ?? old('valor_mensal')}}>
         {{ $errors->has('valor_mensal') ? $errors->first('valor_mensal') : '' }}
      </div>

       <div class="mb-3">
        <label class="form-label">Quantidade de Meses</label>
        <input type="number" class="form-control" name="quant_meses" value={{ $fatura->quant_meses ?? old('quant_meses')}}>
         {{ $errors->has('quant_meses') ? $errors->first('quant_meses') : '' }}
      </div>


     <div class="mb-3">
        <label class="form-label">Observação</label>
        <textarea class="form-control" name="observacao" value={{  old('observacao')}}> {{$fatura->observacao ?? '' }}</textarea>
         {{ $errors->has('observacao') ? $errors->first('observacao') : '' }}
      </div>
        
        <div class="mb-3">
          <label class="form-label">Data Inicio</label>
          <input type="date" class="form-control" name="inicio" value={{ $fatura->inicio ??  old('inicio')}}>
             {{$errors->has('inicio') ? $errors->first('inicio') : ''}}
         </div>
        
        <div class="mb-3">
         <label class="form-label">Data termino</label>
         <input type="date" class="form-control" name="fim" value={{ $fatura->fim ??  old('fim')}}>
         {{ $errors->has('fim') ? $errors->first('fim') : '' }}
        </div>
          
          @if(isset($fatura->id))
          <button type="submit" class="btn btn-primary">Actualizar</button>
          @else
          <button type="submit" class="btn btn-primary">Cadastrar</button>
          @endif
              
 </form>