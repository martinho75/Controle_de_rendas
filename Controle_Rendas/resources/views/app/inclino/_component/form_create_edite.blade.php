 @if(isset($inclino->id))
  <form method="Post" action="{{ route('inclino.update', ['inclino' => $inclino->id]) }}">  
     @csrf
     @method('PUT')
 @else
  <form method="Post" action="{{ route('inclino.store') }}">  
     @csrf
 @endIf
 
     <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" value={{ $inclino->nome ?? old('nome')}}>
         {{ $errors->has('nome') ? $errors->first('nome') : '' }}
      </div>
        
        <div class="mb-3">
          <label class="form-label">Nº Bilhete</label>
          <input type="text" class="form-control" name="numero_bi" value={{ $inclino->numero_bi ??  old('numero_bi')}}>
             {{$errors->has('numero_bi') ? $errors->first('numero_bi') : ''}}
         </div>
        
        <div class="mb-3">
         <label class="form-label">Email</label>
         <input type="email" class="form-control" name="email" value={{ $inclino->email ??  old('email')}}>
         {{ $errors->has('email') ? $errors->first('email') : '' }}
        </div>

        <div class="mb-3">
          <select class="form-select" aria-label="Default select example" name="genero">
             <option >Selecione o seu Genero</option>
               @foreach ($generos as $genero)
                <option value="{{ $genero->genero }}" {{ ($inclino->genero ?? old('genero')) == $genero->genero ? 'selected' : ''}}>{{ $genero->genero}}</option>
               @endforeach
          </select>
        </div>
        
         <div class="mb-3">
          <label class="form-label">Contacto</label>
          <input type="text" class="form-control" name="contacto" value={{ $inclino->contacto ??  old('contacto')}}>
          {{$errors->has('contacto') ? $errors->first('contacto') : ''}} 
          </div>
          
          @if(isset($inclino->id))
          <button type="submit" class="btn btn-primary">Actualizar</button>
          @else
          <button type="submit" class="btn btn-primary">Cadastrar</button>
          @endif
              
 </form>