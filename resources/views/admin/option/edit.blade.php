@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.option.title_singular') }}:
                    {{ trans('cruds.option.fields.id') }}
                    {{ $option->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('option.edit', [$option])
        </div>
    </div>
</div>
@endsection