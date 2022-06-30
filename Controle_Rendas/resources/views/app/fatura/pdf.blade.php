<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 
 <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 100%;
        color: #040004;
        line-height: 1.5;
    }

    .content {
        background-color: #FFF;
        width: 720px;
        padding: 20px;
        margin: 20px auto 0 auto;
        box-shadow: 0px 6px 10px;
        border-radius: 5px;
    }

    .row {
        padding: 5px;
    }

    .buttons {
        text-align: center;
    }

    fieldset {
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        border-color: #c2cbce;
        box-shadow: 2px 2px 2px #c2cbce;
    }

    legend {
        font-size: 20px;
        font-weight: bold;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    label:not([for="casado"], [for="solteiro"], [for="java"], [for="php"], [for="csharp"]) {
        display: inline-block;
        width: 120px;
    }

    input {
        padding: 2px;
        outline: none;
    }

    input[id="nome"],
    input[id="sobrenome"],
    input[id="email"] {
        width: 480px;
    }

    input[id="dtnasc"] {
        width: 180px;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    input[type="email"] {
        border: none;
        border-bottom: 2px solid #c2cbce;
        transition: 0.3s all ease-in-out
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    input[type="number"]:focus,
    input[type="email"]:focus {
        color: #c9920e;
        font-weight: 600;
        letter-spacing: 1px;
        border-color: #c9920e;
    }

    textarea {
        padding: 10px;
        resize: none;
        outline: none;
        width: 100%;
    }

    input[type="radio"],
    input[type="checkbox"] {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="submit"],
    input[type="reset"] {
        padding: 5px 10px;
        background-color: #c9920e;
        border: none;
        border-radius: 5px;
        color: #fff;
        transition: 0.3s all ease-in-out;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
        transform: scale(1.2);
    }

    label[for="java"],
    label[for="csharp"],
    label[for="php"] {
        border: 1px solid #040004;
        border-radius: 5px;
        padding: 10px 15px;
        font-weight: 600;
        margin: 10px 0 10px 0;
        display: inline-block;
        transition: 0.3s all ease-in-out
    }

    input[type="checkbox"]:checked+label {
        background-color: #00d4ff;
        border-color: #00d4ff;
        color: #FFF;
    }

    input[type="checkbox"] {
        display: none;
    }

    label[for="java"]:hover,
    label[for="csharp"]:hover,
    label[for="php"]:hover,
    input[type="submit"],
    input[type="reset"] {
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="content">
        <form action="">
            <fieldset>
                <legend>Cliente</legend>
                <div class="row">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="{{$inclino->nome}}" placeholder="Digite seu nome" autocomplete="off" required>
                </div>
                <div class="row">
                    <label for="sobrenome">Número de Contribuinte:</label>
                    <input type="text" id="sobrenome" name="sobrenome" value="{{$fatura->numero_bi}}" placeholder="Sobrenome" autocomplete="off"
                        required>
                </div>
                <div class="row">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" value="{{$inclino->email}}" placeholder="e-mail" autocomplete="off" required>
                </div>
                 <div class="row">
                    <label for="email">Contacto:</label>
                    <input type="text" id="email" name="contacto" value="{{$inclino->contacto}}" placeholder="e-mail" autocomplete="off" required>
                </div>
          
                <div class="row"></div>
            </fieldset>

            <fieldset>
            <legend> Fatura</legend>

                <div class="row">
                    <label for="nome">Imovel:</label>
                    <input type="text" id="nome" name="nome" value="{{$imovel->nome}}" placeholder="Digite seu nome" autocomplete="off" required>
                </div>

                 <div class="row">
                    <label for="nome">Localização Imovel:</label>
                    <input type="text" id="nome" name="nome" value="{{$imovel->localizacao}}" placeholder="Digite seu nome" autocomplete="off" required>
                </div>

                <div class="row">
                    <label for="nome">Pagamento Para:</label>
                    <input type="text" id="nome" name="nome" value="{{$fatura->pagamento_para}}" placeholder="Digite seu nome" autocomplete="off" required>
                </div>

                <div class="row">
                    <label for="nome">Valor Mensal:</label>
                    <input type="text" id="nome" name="nome" value="{{$fatura->valor_mensal}}" placeholder="Digite seu nome" autocomplete="off" required>
                </div>

                <div class="row">
                    <label for="nome"> Meses Pagos:</label>
                    <input type="text" id="nome" name="nome" value="{{$fatura->quant_meses}}" placeholder="Digite seu nome" autocomplete="off" required>
                </div>

                <div class="row">
                    <label for="nome">Total:</label>
                    <input type="text" id="nome" name="nome" value="{{$fatura->total}}" placeholder="Digite seu nome" autocomplete="off" required>
                </div>

                <div class="row">
                    <label for="nome">Inicio:</label>
                    <input type="text" id="nome" name="nome" value="{{date ('d/m/y',strtotime($fatura->inicio))}}" placeholder="Digite seu nome" autocomplete="off" required>
                </div>

                <div class="row">
                    <label for="nome">Fim: </label>
                    <input type="text" id="nome" name="nome" value="{{date ('d/m/y',strtotime($fatura->fim))}}" placeholder="Digite seu nome" autocomplete="off" required>
                </div>

                
               
                <div class="row">
                    <label for="sobre">Observação</label>
                </div>
                
                @if( $fatura->observacao != '')
                <div class="row">
                    <textarea name="sobre" id="sobre" cols="30" rows="5" value="" placeholder="Descreva as suas habilidades"
                        autocomplete="off"> {{$fatura->observacao}}</textarea>
                </div>
               @endif
            </fieldset>



            <fieldset>
                <legend>Responsável</legend>

                 <div class="row">
                    <label for="sobrenome">Nome:</label>
                    <input type="text" id="sobrenome" name="sobrenome" Value=" Martinho Lourenço Júnior"  placeholder="Sobrenome" autocomplete="off"
                        required>
                </div>
                <div class="row"></div>

                  <div class="row">
                    <label for="nome">Contactos:</label>
                    <input type="text" id="nome" name="nome" Value="923916250 / 994630254"  placeholder="Digite seu nome" autocomplete="off" required>
                </div>
            </fieldset>

            <fieldset>
                <legend>Contas Bancárias</legend>

                 <div class="row">
                    <label for="sobrenome">Martinho Lourenco Júnior (BFA)</label>
                    <input type="text" id="sobrenome" name="sobrenome" Value=" 0006.0000.7232.5792.3013.9"  placeholder="Sobrenome" autocomplete="off"
                        required>
                </div>
    
                <div class="row"></div>

                  <div class="row">
                    <label for="nome">BAI Martinho Lourenco Júnior (BAI)</label>
                    <input type="text" id="nome" name="nome" Value="0040.0000.5757.5245.1017.8"  placeholder="Digite seu nome" autocomplete="off" required>
                </div>
            </fieldset>

        </form>
    </div>
</body>
</html>

