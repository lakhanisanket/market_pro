<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Resources\Admin\TransactionResource;
use App\Models\Transaction;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionApiController extends Controller
{
    public function transactionGet()
    {
        $transactions = Transaction::with(['account'])->get();

        return response()->json([
            'success' => true,
            'Transactions' => $transactions,
        ]);
    }

    public function transactionCreate(Request $request)
    {
        $request->validate([
            'account_id' => 'required',
            'value' => '',
            'data' => '',
            'response' => '',
            'status' => '',
        ]);

        Transaction::create([
            "account_id" => $request->account_id,
            "value" => $request->value,
            'data'    => $request->data,
            "response" => $request->response,
            'status'  => $request->status,
        ]);

        return response()->json([
            "is_success" => true,
            "messages" => "Created Successful",
        ]);
    }

    public function transactionEdit(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $transactionEdit = Transaction::find($request->id);

        $transactionEdit->update([
            "account_id" => $request->account_id ?? "",
            "value" => $request->value ?? "",
            'data'    => $request->data ?? "",
            "response" => $request->response ?? "",
            'status'  => $request->status ?? "",
        ]);

        return response()->json([
            "is_success" => true,
            "messages" => "Updated Successful",
        ]);
    }

    public function transactionDelete(Request $request)
    {
        $transaction = Transaction::find($request->id);
        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully',
        ]);
    }

    public function index()
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransactionResource(Transaction::with(['account'])->get());
    }

    public function store(StoreTransactionRequest $request)
    {
        $transaction = Transaction::create($request->validated());

        return (new TransactionResource($transaction))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransactionResource($transaction->load(['account']));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());

        return (new TransactionResource($transaction))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
