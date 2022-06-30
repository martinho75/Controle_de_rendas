@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Imovel</div>

                <div class="card-body">

                    @component('app.imovel._component.form_create_edit', [ 'imovel' => $imovel])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection