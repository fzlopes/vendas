{!! Form::open(['url' => route('vendas.store'), 'method' => 'post']) !!}
{{Form::token()}}

<div class="row">
        {!! Form::hidden('user_id', Auth::user()->id) !!}
        {!! Form::hidden('sale_date', \Carbon\Carbon::now()->format('Y-m-d')) !!}
    <div class="col-md-12">
        <div class=" form-group {{ $errors->has('client_id') ? 'has-error' :'' }}">
            {!! Form::label('client_id', 'Cliente *', ['class' => 'control-label']) !!}
            {!! Form::select('client_id', $clients, !empty($sale->client)?$sale->client->id:null,  ['class' => 'form-control','required' => 'required', 'placeholder' => 'Selecione o cliente...', 'tabindex' => '1']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class=" form-group {{ $errors->has('paymentType_id') ? 'has-error' :'' }}">
            {!! Form::label('paymentType_id', 'Tipo de pagamento *', ['class' => 'control-label']) !!}
            {!! Form::select('paymentType_id', $paymentTypes, !empty($sale->paymentType)?$sale->paymentType->id:null,  ['class' => 'form-control','required' => 'required', 'placeholder' => 'Selecione o tipo de pagamento...', 'tabindex' => '2']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class=" form-group {{ $errors->has('observation') ? 'has-error' :'' }}">
            {!! Form::label('observation', 'Observação ', ['class' => 'control-label']) !!}
            {!! Form::textarea('observation', null, ['class' => 'form-control form-control-lg','size' => '200 x 5', 'tabindex' => 3]) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="product_id">Produto *</label>
                        <select name="product_id" class="form-control selectpicker" id="product_id" aria-placeholder="Selecione um produto...">
                            @foreach($products as $product)
                                <option value="{{$product->id}}_{{$product->value}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="amount">Quantidade *</label>
                        <input type="number" name="amount" id="amount" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="value">Valor *</label>
                        <input type="text" readonly name="value" id="value" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <br>
                   <button type="button" id="btAdd" class="btn btn-primary">Adicionar</button>
                </div>
            </div> 
            <div class="col-md-12">
                <table id="details" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Ações</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th>Subtotal</th>
                    </thead>
                    <tfoot>
                        <th>TOTAL</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><h4 id="total">R$ 0.00</h4><input type="hidden" name="sale_total" id="sale_total"></th>    
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>             
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" id="salvar">
            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <button class="btn green" type="submit">Enviar</button>
        </div>  
    </div>
    {{ Form::close() }} 
</div>
