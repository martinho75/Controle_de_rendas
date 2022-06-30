<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInclinoRequest;
use App\Http\Requests\UpdateInclinoRequest;
use App\Models\Inclino;
use App\Models\Genero;
use Illuminate\Http\Request;

class InclinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        //
        $user_id = auth()->user()->id;
         $inclino = Inclino::where('user_id', $user_id)->paginate(10);

        return view('app.inclino.index', [ 'inclinos' => $inclino, 'request' => $request]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $generos = Genero::all();
        return view('app.inclino.create', ['generos' => $generos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->input('_token')  != ''){
            
            $regras = [
                'nome' => 'required|min:3|max:40',
                'genero' => 'exists:generos,genero'
            ];

            $request->validate($regras);

            $dados = $request->all('nome', 'numero_bi', 'email', 'genero', 'contacto');
            $dados['user_id'] = auth()->user()->id;

            $inclino = Inclino::create($dados);

            return redirect()->route('inclino.show', [ 'inclino' => $inclino->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inclino  $inclino
     * @return \Illuminate\Http\Response
     */
    public function show(Inclino $inclino)
    {
        //
        if(!$inclino->user_id == auth()->user()->id){
            return view('acesso-negado');
        }
        return view('app.inclino.show', ['inclino' => $inclino]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inclino  $inclino
     * @return \Illuminate\Http\Response
     */
    public function edit(Inclino $inclino)
    {
        //
        if(!$inclino->user_id == auth()->user()->id){
            return view('acesso-negado');
        }
        $generos = Genero::all(); 
        return view('app.inclino.edit', ['inclino' => $inclino, 'generos' => $generos]);
    }

    /**
     * Update the specified resource in storage.
     *
    * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inclino  $inclino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inclino $inclino)
    {
        //
        if(!$inclino->user_id == auth()->user()->id){
            return view('acesso-negado');
        }
            $regras = [
                'nome' => 'required|min:3|max:40',
                //'numero_bi' => 'required',
                'genero' => 'exists:generos,genero'
            ];

            $request->validate($regras);

            $inclino->update($request->all());

            return redirect()->route('inclino.show', [ 'inclino' => $inclino->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inclino  $inclino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inclino $inclino)
    {
        //
        $inclino->delete();
        return redirect()->route('inclino.index');
    }

    public function  pesquisar(){
        $generos = Genero::all();
        return view('app.inclino.pesquisar', [ 'generos' => $generos]);
    }

    public function resultado_pesquisa(Request $request){
        $inclino = Inclino::orWhere('nome', 'like', '%'.$request->input('nome').'%')
            ->orWhere('numero_bi', 'like', '%'.$request->input('numero_bi').'%')
            ->orWhere('email', 'like', '%'.$request->input('numero_bi').'%')
            ->orWhere('genero', 'like', '%'.$request->input('genero').'%')
            ->orWhere('contacto', 'like', '%'.$request->input(' contacto').'%')
            ->paginate(10);

        return view('app.inclino.resultado_pesquisa', [ 'inclinos' => $inclino, 'request' => $request]);
    }
}
