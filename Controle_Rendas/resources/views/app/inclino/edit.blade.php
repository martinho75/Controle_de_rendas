@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar inclino</div>

                <div class="card-body">

                 @component('app.inclino._component.form_create_edite', [ 'inclino' => $inclino, 'generos' => $generos])
                 @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection