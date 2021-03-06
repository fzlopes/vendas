@extends('layouts.admin')

@section('css')
    <link href="{{ asset('vendor/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
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
                <span>Vendas</span>
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

    <h1 class="page-title"> Vendas
        <small>lista de todos as vendas cadastrados no sistema</small>
    </h1>

@endsection


@section('content')

    <div class="alert hide" id="alert-messages"></div>

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable" id="alertSucesso">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <strong>Maravilha!</strong> {{ Session::get('success') }}
        </div>
    @endif

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">


            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right">
                                    <a href="{{ route('vendas.create') }}">
                                        <button id="sample_editable_1_new" class="btn sbold green"> Criar venda
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th> Id             </th>
                                <th> Data           </th>
                                <th> Cliente        </th>
                                <th> Tipo Pagamento</th>
                                <th> Total R$       </th>
                                <th> Ações          </th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($sales as $sale)

                            <tr class="odd gradeX">
                                <td> {{$sale->id}} </td>
                                <td> {{$sale->sale_date->format('d/m/Y')}} </td>
                                <td> {{$sale->client->name}} </td>
                                <td> {{$sale->paymentType->name}} </td>
                                @if($sale->sale_total)
                                    <td> {{$sale->sale_total}} </td>
                                @else
                                    <td> </td>
                                @endif
                                <td>
                                    <div class="clearfix">
                                        <a href="{{ route('vendas.show', $sale->id) }}"><button class="btn grey-cascade btn-outline btn-xs mt-sweetalert" type="button"> ver </button></a>
                                        <a href="{{ route('vendas.edit', $sale->id) }}"><button class="btn blue-hoki btn-outline btn-xs mt-sweetalert" type="button"> editar </button></a>
                                    </div>    
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('vendor/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pages/scripts/ui-sweetalert.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pages/scripts/table-datatables-managed.js') }}" type="text/javascript"></script>

@endsection
