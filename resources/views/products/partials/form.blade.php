<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">

        @if(!empty($product))
            {!! Form::model($product, ['url' => route('produtos.update', $product->id), 'method' => 'put']) !!}
            {!! Form::hidden('id', $product->id) !!}
        @else
            {!! Form::open(['url' => route('produtos.store'), 'method' => 'post']) !!}
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
                                <a href="{{ route('produtos.index') }}" class="btn sbold default"> Voltar <i class="fa fa-rotate-left"></i></a>
                            </div>
                        </div>

                        <div class="portlet-body form">
                            <div class="tab-content">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                                    {!! Form::label('name', 'Nome *', ['class' => 'control-label']) !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'tabindex' => 1]) !!}
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class=" form-group {{ $errors->has('value') ? 'has-error' :'' }}">
                                            {!! Form::label('value', 'Valor', ['class' => 'control-label']) !!}
                                            <br>
                                            {!! Form::text('value', null, ['class' => 'form-control', 'required' => 'required', 'tabindex' => 2]) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                                
                        </div>

                        <div class="portlet-body form">
                            <div class="tab-content">
                                <div class="form-actions">
                                    <div class="margiv-top-10">
                                        {!! Form::submit('Enviar', ['class' => 'btn green', 'tabindex' => 3]) !!}
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