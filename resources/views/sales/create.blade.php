@extends('layouts.admin')

@section('css')
    <link href="{{ asset('vendor/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/pages/css/profile.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('pagebar')

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('profile.dashboard') }}">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ route('vendas.index') }}">Vendas</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Criar</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="pull-right tooltips btn btn-sm">
                <i class="icon-calendar"></i>&nbsp;
                {{ \Carbon\Carbon::now()->format('d/m/Y') }}
            </div>
        </div>
    </div>
    <!-- END PAGE BAR -->

@endsection

@section('title')

    <h1 class="page-title"> Criar venda </h1>

@endsection


@section('content')

    @include('layouts.partials.errors')

    @include('sales.partials.form')

@endsection

@section('scripts')
    <script src="{{ asset('vendor/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pages/scripts/form-input-mask.js') }}" type="text/javascript"></script>

    <script src="{{ asset('vendor/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>

    <script src="{{ asset('vendor/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/jquery-validation/js/localization/messages_pt_BR.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/jquery.maskedinput.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
       $(document).ready(function() {
           $("#btAdd").click(function(){
               adicionar();
           });
        });

        var cont=0;
        var total=0;
        subtotal=[];
        $("#salvar").hide();
        $("#product_id").change(mostrarValores);

        function mostrarValores() {
            dadosProduto = document.getElementById('product_id').value.split('_');
            $("#value").val(dadosProduto[1]);
        }

        function adicionar()
        {
            dadosProduto = document.getElementById('product_id').value.split('_');
            product_id= dadosProduto[0];
            produto=$("#product_id option:selected").text();
            amount=$("#amount").val();
            value=$("#value").val();

            subtotal[cont]=(amount*value);
            total=total+subtotal[cont];

            var linha = '<tr class="selected" id="linha'+cont+'"><td><button class="btn btn-warning" onclick="eliminar('+cont+')";>X</button></td><td><input type="hidden" name="product_id[]" value="'+product_id+'">'+produto+'</td><td><input type="hidden" name="amount[]" value="'+amount+'">'+amount+'</td><td><input type="hidden" name="value[]" value="'+value+'">'+value+'</td><td>'+subtotal[cont]+'</td></tr>';
            cont++;
            limpar();
            $("#total").html("R$ " +total);
            $("#sale_total").val(total);
            avaliar();
            $("#details").append(linha);
        }
        function limpar()
        {
            $("#amount").val("");
            $("#value").val("");

        }

        function avaliar()
        {
            if(total > 0) {
                $("#salvar").show();
            } else {
                $("#salvar").hide();
            }
        }

        function eliminar(index)
        {
            total=total-subtotal[index];
            $("#total").html("R$ " +total);
            $("#total").val(total);
            $("#linha" + index).remove();
            avaliar();
        }
    
    </script>
    
@endsection
