<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFaturaRequest;
use App\Http\Requests\UpdateFaturaRequest;
use Illuminate\Http\Request;
use App\Models\Fatura;
use App\Models\Inclino;
use App\Models\Imovel;
use App\Models\Pagamento;
use PDF;
class FaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $faturas = Fatura::with(['imovel', 'inclino'])->orderBy('id', 'DESC')
        ->where('user_id', $user_id)
        ->get();
        return view('app.fatura.index', ['faturas' => $faturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $inclinos = Inclino::all();
        $imoveis = Imovel::all();
        $pagamentos = Pagamento::all();
        return view('app.fatura.create',['inclinos' => $inclinos, 'imoveis' => $imoveis, 'pagamentos' => $pagamentos]);
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
                'id_inclino' => 'exists:inclinos,id',
                'id_imovel' => 'exists:imoveis,id',
                'pagamento_para' => 'exists:pagamentos,pagamento_para',
                'valor_mensal' => 'required|integer',
                'quant_meses' => 'required|integer',
                'inicio' => 'date',
                'fim' => 'date'
            ];

            $request->validate($regras);

            $dados = $request->all('id_inclino', 'id_imovel', 'pagamento_para', 'valor_mensal', 'quant_meses', 'observacao', 'inicio', 'fim');
            $dados['total'] = $request->input('valor_mensal') * $request->input('quant_meses');
            $dados['user_id'] = auth()->user()->id;
            $fatura = Fatura::create($dados);

            return redirect()->route('fatura.show', [ 'fatura' => $fatura->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fatura  $fatura
     * @return \Illuminate\Http\Response
     */
    public function show(Fatura $fatura)
    {
        //
        if(!$fatura->user_id == auth()->user()->id){
            return view('acesso-negado');
        }

        $inclino = Inclino::find($fatura->id_inclino);
        $imovel = Imovel::find($fatura->id_imovel);
        return view('app.fatura.show', ['fatura' => $fatura, 'inclino' => $inclino, 'imovel' => $imovel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fatura  $fatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Fatura $fatura)
    {
        //
        if(!$fatura->user_id == auth()->user()->id){
            return view('acesso-negado');
        }

        $inclinos = Inclino::all();
        $imoveis = Imovel::all();
        $pagamentos = Pagamento::all();
        return view('app.fatura.edit',['inclinos' => $inclinos, 'imoveis' => $imoveis, 'pagamentos' => $pagamentos, 'fatura' => $fatura]);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fatura  $fatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fatura $fatura)
    {
        //
        if(!$fatura->user_id == auth()->user()->id){
            return view('acesso-negado');
        }

        $regras = [
            'id_inclino' => 'exists:inclinos,id',
            'id_imovel' => 'exists:imoveis,id',
            'pagamento_para' => 'exists:pagamentos,pagamento_para',
            'valor_mensal' => 'required|integer',
            'quant_meses' => 'required|integer',
            'inicio' => 'date',
            'fim' => 'date'
        ];

        $fatura->total = $request->input('valor_mensal') * $request->input('quant_meses');

        $request->validate($regras);

        $fatura->update($request->all());
        return redirect()->route('fatura.show', [ 'fatura' => $fatura->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fatura  $fatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fatura $fatura)
    {
        //
        $fatura->delete();
        return redirect()->route('fatura.index');
    }

    public function pesquisar(){
        $inclinos = Inclino::all();
        $imoveis = Imovel::all();
        $pagamentos = Pagamento::all();
        return view('app.fatura.pesquisar',['inclinos' => $inclinos, 'imoveis' => $imoveis, 'pagamentos' => $pagamentos]);
    }

    public function resultado_pesquisa(Request $request){

        $fatura = Fatura::where('id_inclino', 'like', '%'.$request->input('id_inclino').'%')
        ->where('id_imovel', 'like', '%'.$request->input('id_imovel').'%')
        ->orderBy('id', 'DESC')->get();
     

        return view('app.fatura.resultado_pesquisa', [ 'faturas' => $fatura, 'request' => $request]);
}

    public function exportar($id_fatura){  
         $fatura = Fatura::find($id_fatura);
         $inclino = Inclino::find($fatura->id_inclino);
         $imovel = Imovel::find($fatura->id_imovel);
         $pdf = PDF::loadView( 'app.fatura.pdf' , ['fatura' => $fatura, 'inclino' => $inclino, 'imovel' => $imovel] );
         return  $pdf->stream( 'fatura_'.$inclino->nome.'_'.date('d/m/y').'.pdf' );
        // return  $pdf-> download ( 'fatura.pdf' );
    }
}
