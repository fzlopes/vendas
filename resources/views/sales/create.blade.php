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
        jQuery(document).ready(function() {
            var i = $("#_totalitens").val();
            $('.adicionar').click (function() {
                $('#produto').append('<div id="append_'+i+'"><div class="col-md-12"><div class="col-md-3"><div class="form-group"><label for="product_id" class="control-label">Produto *</label>\n' +
                    '<select class="form-control product_id" required="required" tabindex="4" name="product_id[]"><option selected="selected" value="">Selecione o produto...</option><option value="10">Agua Sanitária</option><option value="3">Amaciante de roupa</option><option value="2">Desengordurante</option><option value="6">Desinfetante Citronela</option><option value="7">Desinfetante Eucalipto</option><option value="8">Desinfetante Floral</option><option value="5">Desinfetante Fresh</option><option value="9">Desinfetante Limão</option><option value="4">Detergente de louça</option><option value="1">Sabão de roupa</option></select></div></div>\n' +
                    '<div class="col-md-2"><div class="form-group"><label for="amount" class="control-label">Quantidade *</label>\n' +
                    '<input class="form-control amount" placeholder="Quantidade" id="amount[]" tabindex="5" name="amount[]" type="number">\n' +
                    '</div></div><div class="col-md-2"><div class="form-group"><label for="value" class="control-label">Valor *</label>\n' +
                    '<input class="form-control value" placeholder="Valor" id="value[]" tabindex="6" name="value[]" type="text"></div>\n' +
                    '</div><div class="col-md-2"><div class="form-group"><label for="value" class="control-label">Subtotal *</label>\n' +
                    '<input class="form-control subtotal" placeholder="Subtotal" id="subtotal[]" tabindex="7" name="value[]" type="text"></div></div><div class="col-sm-2"><br><button class="btn red remover" data-produto="'+i+'" type="button"><i class="glyphicon glyphicon-remove"></i></button>\n' +
                    '</div></div></div></div>');
                i++;
            });

            $(document).on('click', '.remover', function() {
                $('#append_'+$(this).data('produto')).remove();
            });

             $(".product_id").change(function(){
                alert("The text has been changed.");
            });

            

                      
        });
        
    </script>
@endsection
