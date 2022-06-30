@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Fatura</div>

                <div class="card-body">

                    @component('app.fatura._component.form_create_edit', ['inclinos' => $inclinos, 'imoveis' => $imoveis, 'pagamentos' => $pagamentos])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection