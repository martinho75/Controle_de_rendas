@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Imovel</div>

                <div class="card-body">

                    @component('app.imovel._component.form_create_edit')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection