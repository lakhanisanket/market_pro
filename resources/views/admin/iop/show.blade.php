@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.iop.title_singular') }}:
                    {{ trans('cruds.iop.fields.id') }}
                    {{ $iop->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.iop.fields.id') }}
                            </th>
                            <td>
                                {{ $iop->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.iop.fields.country') }}
                            </th>
                            <td>
                                @if($iop->country)
                                    <span class="badge badge-relationship">{{ $iop->country->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.iop.fields.isp') }}
                            </th>
                            <td>
                                {{ $iop->isp }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.iop.fields.port') }}
                            </th>
                            <td>
                                {{ $iop->port }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.iop.fields.status') }}
                            </th>
                            <td>
                                {{ $iop->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('iop_edit')
                    <a href="{{ route('admin.iops.edit', $iop) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.iops.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection