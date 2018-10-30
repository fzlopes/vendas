<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">

        @if(!empty($sale))
            {!! Form::model($sale, ['url' => route('sales.update', $sale->id), 'method' => 'put']) !!}
            {!! Form::hidden('id', $sale->id) !!}
        @else
            {!! Form::open(['url' => route('vendas.store'), 'method' => 'post']) !!}
        @endif

        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">

                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Dados básicos</span>
                            </div>
                            <div class="btn-group pull-right">
                                <a href="{{ route('vendas.index') }}" class="btn sbold default"> Voltar <i class="fa fa-rotate-left"></i></a>
                            </div>
                        </div>

                        <div class="col-md-12">
                                {!! Form::hidden('user_id', Auth::user()->id) !!}
                                {!! Form::hidden('sale_date', \Carbon\Carbon::now()->format('Y-m-d')) !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class=" form-group {{ $errors->has('client_id') ? 'has-error' :'' }}">
                                            {!! Form::label('client_id', 'Cliente *', ['class' => 'control-label']) !!}
                                            {!! Form::select('client_id', $clients, !empty($sale->client)?$sale->client->id:null,  ['class' => 'form-control','required' => 'required', 'placeholder' => 'Selecione o cliente...', 'tabindex' => '1']) !!}
                                        </div>
                                    </div>
                               </div>
                               
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class=" form-group {{ $errors->has('paymentType_id') ? 'has-error' :'' }}">
                                            {!! Form::label('paymentType_id', 'Tipo de pagamento *', ['class' => 'control-label']) !!}
                                            {!! Form::select('paymentType_id', $paymentTypes, !empty($sale->paymentType)?$sale->paymentType->id:null,  ['class' => 'form-control','required' => 'required', 'placeholder' => 'Selecione o tipo de pagamento...', 'tabindex' => '2']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('sale_total') ? 'has-error' :'' }}">
                                            {!! Form::label('sale_total', 'Total R$ ', ['class' => 'control-label']) !!}
                                            {!! Form::text('sale_total', null, ['class' => 'form-control','required' => 'required', 'tabindex' => 3]) !!}
                                        </div>
                                    </div>
                                </div>
                        </div>    
                                <input type="hidden" id="_totalitens">
                                <div class="row produto" id="produto">    
                                    <div class="col-md-12">               
                                        <div class="col-md-3">
                                            <div class=" form-group {{ $errors->has('client_id') ? 'has-error' :'' }}">
                                                {!! Form::label('product_id', 'Produto *', ['class' => 'control-label']) !!}
                                                {!! Form::select('product_id[]', $products, !empty($sale->product)?$sale->product->id:null,  ['class' => 'form-control product_id','required' => 'required', 'placeholder' => 'Selecione o produto...', 'tabindex' => '4']) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group {{ $errors->has('amount') ? 'has-error' :'' }}">
                                                {!! Form::label('amount', 'Quantidade *', ['class' => 'control-label']) !!}
                                                {!! Form::number('amount[]', null, ['class' => 'form-control amount', 'placeholder' => 'Quantidade', 'id' => 'amount[]', 'tabindex' => 5]) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group {{ $errors->has('value') ? 'has-error' :'' }}">
                                                {!! Form::label('value', 'Valor *', ['class' => 'control-label']) !!}
                                                {!! Form::text('value[]', null, ['class' => 'form-control value', 'placeholder' => 'Valor', 'id' => 'value[]', 'tabindex' => 6]) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {{ $errors->has('subtotal') ? 'has-error' :'' }}">
                                                {!! Form::label('subtotal', 'Subtotal', ['class' => 'control-label']) !!}
                                                {!! Form::text('value[]', null, ['class' => 'form-control subtotal', 'placeholder' => 'Subtotal', 'id' => 'subtotal[]', 'tabindex' => 7]) !!}
                                            </div>
                                        </div>
                                                        
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <br>
                                                <button class="btn green adicionar" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                                            </div>
                                        </div>
                                </div>                       
                        </div>                           
                   
                        <div class="portlet-body form">
                            <div class="tab-content">
                                <div class="form-actions">
                                    <div class="margiv-top-10">
                                        {!! Form::submit('Enviar', ['class' => 'btn green', 'tabindex' => 4]) !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}

    </div>
</div>