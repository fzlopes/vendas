@extends('layouts.admin')

@section('css')

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
                <span>Visualizar</span>
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

    <h1 class="page-title"> Visualizar venda </h1>

@endsection


@section('content')


    <div class="alert hide" id="alert-messages"></div>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">

            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <!-- BEGIN FORM-->
                    <form class="form-horizontal" role="form">
                        <div class="form-body">

                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group pull-right">
                                            <a href="{{ route('vendas.index') }}" class="btn sbold default"> Voltar <i class="fa fa-rotate-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h3 class="form-section">Informações</h3>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Data:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$sale->sale_date->format('d/m/Y')}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Cliente:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$sale->client->name}} </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tipo Pag.:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static"> {{$sale->paymentType->name}} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Observação:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$sale->observation}} </p>
                                                </div>
                                            </div>
                                    </div>
                            </div>        
                            <div class="col-md-12">
                                <table id="details" class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Valor</th>
                                        <th>Subtotal</th>
                                    </thead>
                                    <tfoot>
                                        <th>TOTAL</th>
                                        <th></th>
                                        <th></th>
                                        <th><h4 id="total">R$ {{$sale->sale_total}}</h4></th>    
                                    </tfoot>
                                    <tbody>
                                       @foreach($saleDetails as $saleDetail)
                                       <tr>
                                           <td>{{$saleDetail->product->name}}</td>
                                           <td>{{$saleDetail->amount}}</td>
                                           <td>{{$saleDetail->value}}</td>
                                           <td>{{$saleDetail->amount*$saleDetail->value}}</td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>             
                                                                
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <a href="{{ route('vendas.edit', $sale->id) }}" class="btn green"> <i class="fa fa-pencil"></i> Editar </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>

                    </form>
                    <!-- END FORM-->

                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

@endsection

