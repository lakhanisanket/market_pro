@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.account.title_singular') }}:
                    {{ trans('cruds.account.fields.id') }}
                    {{ $account->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.account.fields.id') }}
                            </th>
                            <td>
                                {{ $account->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.account.fields.user') }}
                            </th>
                            <td>
                                @if($account->user)
                                    <span class="badge badge-relationship">{{ $account->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.account.fields.data') }}
                            </th>
                            <td>
                                {{ $account->data }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.account.fields.status') }}
                            </th>
                            <td>
                                {{ $account->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('account_edit')
                    <a href="{{ route('admin.accounts.edit', $account) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.accounts.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection