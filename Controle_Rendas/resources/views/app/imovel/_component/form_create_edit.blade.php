 @if(isset($imovel->id))
  <form method="Post" action="{{ route('imovel.update', ['imovel' => $imovel->id]) }}">  
     @csrf
     @method('PUT')
 @else
  <form method="Post" action="{{ route('imovel.store') }}">  
     @csrf
 @endIf
 
     <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" value={{ $imovel->nome ?? old('nome')}}>
         {{ $errors->has('nome') ? $errors->first('nome') : '' }}
      </div>
        
        <div class="mb-3">
          <label class="form-label">Localizacção</label>
          <input type="text" class="form-control" name="localizacao" value={{ $imovel->localizacao ??  old('localizacao')}}>
             {{$errors->has('localizacao') ? $errors->first('localizacao') : ''}}
         </div>
        
        <div class="mb-3">
         <label class="form-label">Descrição</label>
         <input type="text" class="form-control" name="descricao" value={{ $imovel->descricao ??  old('descricao')}}>
         {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
        </div>
        
          @if(isset($imovel->id))
          <button type="submit" class="btn btn-primary">Actualizar</button>
          @else
          <button type="submit" class="btn btn-primary">Cadastrar</button>
          @endif
              
 </form>