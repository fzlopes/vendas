<?php

namespace App\Http\Controllers\Sale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sale;
use PhpParser\Node\Stmt\TryCatch;
use App\Client;
use App\PaymentType;

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

        return view('sales.create')->with(compact('clients','paymentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //try {
            //DB::beginTransaction();
            Sale::create($request->all());

            //$productId = $request->get('product_id');
            return redirect()
            ->route('vendas.index')
            ->with(['success' => 'Venda cadastrada com sucesso!']);

            
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
