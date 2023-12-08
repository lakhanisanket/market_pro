@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.transaction.title_singular') }}:
                    {{ trans('cruds.transaction.fields.id') }}
                    {{ $transaction->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.id') }}
                            </th>
                            <td>
                                {{ $transaction->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.account') }}
                            </th>
                            <td>
                                @if($transaction->account)
                                    <span class="badge badge-relationship">{{ $transaction->account->data ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.value') }}
                            </th>
                            <td>
                                {{ $transaction->value }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.data') }}
                            </th>
                            <td>
                                {{ $transaction->data }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.response') }}
                            </th>
                            <td>
                                {{ $transaction->response }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.status') }}
                            </th>
                            <td>
                                {{ $transaction->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('transaction_edit')
                    <a href="{{ route('admin.transactions.edit', $transaction) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection