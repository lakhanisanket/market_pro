@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.subscription.title_singular') }}:
                    {{ trans('cruds.subscription.fields.id') }}
                    {{ $subscription->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.subscription.fields.id') }}
                            </th>
                            <td>
                                {{ $subscription->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subscription.fields.plan_type') }}
                            </th>
                            <td>
                                {{ $subscription->plan_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subscription.fields.amount') }}
                            </th>
                            <td>
                                {{ $subscription->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subscription.fields.start_date') }}
                            </th>
                            <td>
                                {{ $subscription->start_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subscription.fields.end_date') }}
                            </th>
                            <td>
                                {{ $subscription->end_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subscription.fields.status') }}
                            </th>
                            <td>
                                {{ $subscription->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.subscription.fields.user') }}
                            </th>
                            <td>
                                @if($subscription->user)
                                    <span class="badge badge-relationship">{{ $subscription->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('subscription_edit')
                    <a href="{{ route('admin.subscriptions.edit', $subscription) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection