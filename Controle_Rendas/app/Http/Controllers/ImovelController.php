<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImovelRequest;
use App\Http\Requests\UpdateImovelRequest;
use App\Models\Imovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $imoveis= Imovel::paginate();

        return view('app.imovel.index', ['imoveis' => $imoveis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('app.imovel.create');
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
         //
         if($request->input('_token')  != ''){
            
            $regras = [
                'nome' => 'required|min:3|max:40',
                'localizacao' => 'required|min:3|max:40'
            ];

            $request->validate($regras);

            $dados = $request->all('nome', 'localizacao', 'descricao');
            $dados['user_id'] = auth()->user()->id;

            $imovel = Imovel::create($dados);

            return redirect()->route('imovel.show', [ 'imovel' => $imovel->id]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function show(Imovel $imovel)
    {
        //

        if(!$imovel->user_id == auth()->user()->id){
            return view('acesso-negado');
        }

        return view('app.imovel.show', ['imovel' => $imovel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function edit(Imovel $imovel)
    {
        //

        if(!$imovel->user_id == auth()->user()->id){
            return view('acesso-negado');
        }

        return view('app.imovel.edit', ['imovel' => $imovel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imovel $imovel)
    {
        //


        if(!$imovel->user_id == auth()->user()->id){
            return view('acesso-negado');
        }

        $regras = [
            'nome' => 'required|min:3|max:40',
            'localizacao' => 'required|min:3|max:40'
        ];

        $request->validate($regras);

        $imovel->update($request->all());

        return redirect()->route('imovel.show', [ 'imovel' => $imovel->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imovel $imovel)
    {
        //
        $imovel->delete();
        return redirect()->route('imovel.index');
    }
}
