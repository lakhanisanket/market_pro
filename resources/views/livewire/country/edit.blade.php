<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('country.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.country.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="country.name">
        <div class="validation-message">
            {{ $errors->first('country.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.country.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('country.short_code') ? 'invalid' : '' }}">
        <label class="form-label" for="short_code">{{ trans('cruds.country.fields.short_code') }}</label>
        <input class="form-control" type="text" name="short_code" id="short_code" wire:model.defer="country.short_code">
        <div class="validation-message">
            {{ $errors->first('country.short_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.country.fields.short_code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('country.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.country.fields.status') }}</label>
        <select class="form-control" wire:model="country.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('country.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.country.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>