<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::all();
        return $transaction;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GADIPAKE
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = Transaction::create([
            "transaction_id" => $request->transaction_id,
            "amount_of_ticket" => $request->amount_of_ticket,
            "total_price" => $request->total_price,
            "concert_name" => $request->concert_name,
            "concert_address" => $request->concert_address,
            "concert_date" => $request->concert_date
        ]);
        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $transaction

        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);
        if ($transaction) {
            return response()->json([
                'status' => 200,
                'data' => $transaction


            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas' . $id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //GADIPAKEE
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
        $transaction = Transaction::find($id);
        if($transaction){
            $transaction->transaction_id = $request->transaction_id ? $request-> transaction_id : $transaction->transaction_id;
            $transaction->amount_of_ticket = $request->amount_of_ticket ? $request-> amount_of_ticket: $transaction->amount_of_ticket;
            $transaction->total_price = $request->total_price ? $request-> total_price: $transaction->total_price;
            $transaction->concert_name = $request->concert_name ? $request-> concert_name: $transaction->concert_name;
            $transaction->concert_address = $request->concert_address ? $request-> concert_address: $transaction->concert_address;
            $transaction->concert_address = $request->concert_address ? $request-> concert_address: $transaction->concert_date;
            $transaction->save();
            return response()->json([
                'status' => 200,
                'data' => $transaction
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> $id . ' tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        if($transaction){
            $transaction->delete();
            return response()->json([
                'status' => 200,
                'data' => $transaction
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . ' tidak ditemukan'
            ], 404);
    }

}
}
