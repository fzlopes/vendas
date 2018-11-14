<?php

namespace App\Http\Controllers\Sale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sale;
use App\Client;
use App\PaymentType;
use App\SaleDetail;
use App\Product;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::where('user_id', '=', Auth()->user()->id )->orderBy('sale_date', 'asc')->get();
        return view('sales.index')->with(compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::select('id','name')
            ->orderBy('name', 'asc')
            ->get()
            ->pluck('name','id');
        
        $paymentTypes = PaymentType::select('id','name')
            ->orderBy('name', 'asc')
            ->get()
            ->pluck('name','id');

        $products = Product::orderby('name','asc')->get();

        return view('sales.create')->with(compact('clients','paymentTypes','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $sale = new Sale();
            $sale->user_id=$request->get('user_id');
            $sale->client_id=$request->get('client_id');
            $sale->paymentType_id=$request->get('paymentType_id');
            $sale->sale_date=$request->get('sale_date');
            $sale->observation=$request->get('observation');
            $sale->sale_total=$request->get('sale_total');
            
            $sale->save();

            $product_id = $request->get('product_id');
            $amount = $request->get('amount');
            $value = $request->get('value');
        
            $cont = 0;

            while($cont < count($product_id)) {
                $saleDetail = new SaleDetail();
                $saleDetail->sale_id = $sale->id;
                $saleDetail->product_id = $product_id[$cont];
                $saleDetail->amount = $amount[$cont];
                $saleDetail->value = $value[$cont];
                $saleDetail->save();
                $cont=$cont+1;
            }

               
        return redirect()
            ->route('vendas.index')
            ->with(['success' => 'Venda cadastrada com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::findOrFail($id);
        $saleDetails = SaleDetail::where('sale_id','=',$id)->get();
        return view('sales.show')->with(compact('sale','saleDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $clients = Client::select('id','name')
            ->orderBy('name', 'asc')
            ->get()
            ->pluck('name','id');
        
        $paymentTypes = PaymentType::select('id','name')
            ->orderBy('name', 'asc')
            ->get()
            ->pluck('name','id');

        return view('sales.edit')->with(compact('sale','clients','paymentTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sale = Sale::find($id);
        $sale->fill($request->all());
        $sale->save();

        return redirect()
            ->route('vendas.index')
            ->with(['success' => 'Venda alterada com sucesso!']);
    }
}
