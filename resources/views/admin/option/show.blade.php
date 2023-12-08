@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.option.title_singular') }}:
                    {{ trans('cruds.option.fields.id') }}
                    {{ $option->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.option.fields.id') }}
                            </th>
                            <td>
                                {{ $option->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.option.fields.user') }}
                            </th>
                            <td>
                                @if($option->user)
                                    <span class="badge badge-relationship">{{ $option->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.option.fields.key') }}
                            </th>
                            <td>
                                {{ $option->key }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.option.fields.value') }}
                            </th>
                            <td>
                                {{ $option->value }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.option.fields.file') }}
                            </th>
                            <td>
                                @foreach($option->file as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.option.fields.status') }}
                            </th>
                            <td>
                                {{ $option->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('option_edit')
                    <a href="{{ route('admin.options.edit', $option) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.options.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection