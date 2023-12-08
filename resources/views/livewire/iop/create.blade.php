<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('iop.country_id') ? 'invalid' : '' }}">
        <label class="form-label" for="country">{{ trans('cruds.iop.fields.country') }}</label>
        <x-select-list class="form-control" id="country" name="country" :options="$this->listsForFields['country']" wire:model="iop.country_id" />
        <div class="validation-message">
            {{ $errors->first('iop.country_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.iop.fields.country_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('iop.isp') ? 'invalid' : '' }}">
        <label class="form-label" for="isp">{{ trans('cruds.iop.fields.isp') }}</label>
        <input class="form-control" type="text" name="isp" id="isp" wire:model.defer="iop.isp">
        <div class="validation-message">
            {{ $errors->first('iop.isp') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.iop.fields.isp_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('iop.port') ? 'invalid' : '' }}">
        <label class="form-label" for="port">{{ trans('cruds.iop.fields.port') }}</label>
        <input class="form-control" type="text" name="port" id="port" wire:model.defer="iop.port">
        <div class="validation-message">
            {{ $errors->first('iop.port') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.iop.fields.port_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('iop.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.iop.fields.status') }}</label>
        <select class="form-control" wire:model="iop.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('iop.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.iop.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.iops.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>