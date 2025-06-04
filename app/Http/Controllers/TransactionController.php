<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TransactionController extends Controller
{
   public function index() 
   {

     $transactions = Transaction::with('user', 'book')->get();

    if ($transactions->isEmpty()) {
        return response()->json([
            "success" => true,
            "message" => "Not Found!"
        ], 200);
    }
    return response()->json([
        "success" => true,
        "message"=> "Get All Resources",
        "data" => $transactions
    ]);
   }
   public function store(Request $request)
   {
    $validator = Validator::make($request->all(), [
        'book_id' => 'required|exists:books,id',
        'quantity' => 'required|integer|min:1'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation Error!',
            'data' => $validator->errors()
        ], 422);
    }

    $uniqueCode = "ORD-" . strtoupper(uniqid());

    $user = auth('api')->user();
   
   if (!$user){
        return response()->json([
            'success' => false,
            'message' => 'Unauthorize!'
        ], 401);
   }

    $book = Book::find($request->book_id);

    if ($book->stock < $request->quantity){
        return response()->json([
            'success' => false,
            'message' => 'Stok barang tidak cukup!'
        ], 400);
    }
    
    $totalAmount = $book->price * $request->quantity;

    $book->stock -= $request->quantity;
    $book->save();

    $transactions = Transaction::create([
        'order_number' => $uniqueCode,
        'customer_id' => $user->id,
        'book_id' => $request->book_id,
        'total_amount' => $totalAmount
    ]);
    
   
     return response()->json([
        'success' => true,
        'message' => 'Transaction Success',
        'data' => $transactions
    ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error!',
                'data' => $validator->errors()
            ], 422);
        }
         $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found.'
            ], 404);
        }
        $book = Book::find($request->book_id);
        $totalAmount = $book->price * $request->quantity;

        $transaction->update([
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction Updated',
            'data' => $transaction
        ]);

    }
        public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found.'
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction Deleted'
        ]);
    }

}

