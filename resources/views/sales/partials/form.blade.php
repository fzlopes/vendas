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

                        <div class="portlet-body form">
                            <div class="tab-content">
                                {!! Form::hidden('user_id', Auth::user()->id) !!}
                                {!! Form::hidden('sale_date', \Carbon\Carbon::now()->format('Y-m-d')) !!}
                                <div class=" form-group {{ $errors->has('client_id') ? 'has-error' :'' }}">
                                    {!! Form::label('client_id', 'Cliente *', ['class' => 'control-label']) !!}
                                    {!! Form::select('client_id', $clients, !empty($sale->client)?$sale->client->id:null,  ['class' => 'form-control cliente','required' => 'required', 'data-placeholder' => 'Selecione o cliente...', 'tabindex' => '1']) !!}
                                </div>

                                <div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
                                    {!! Form::label('sale_total', 'Total R$ ', ['class' => 'control-label']) !!}
                                    {!! Form::text('sale_total', null, ['class' => 'form-control', 'tabindex' => 2]) !!}
                                </div>
                        </div>

                        <div class="portlet-body form">
                            <div class="tab-content">
                                <div class="form-actions">
                                    <div class="margiv-top-10">
                                        {!! Form::submit('Enviar', ['class' => 'btn green', 'tabindex' => 6]) !!}
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