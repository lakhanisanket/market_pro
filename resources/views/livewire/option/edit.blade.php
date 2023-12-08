<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('option.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.option.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="option.user_id" />
        <div class="validation-message">
            {{ $errors->first('option.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.option.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('option.key') ? 'invalid' : '' }}">
        <label class="form-label" for="key">{{ trans('cruds.option.fields.key') }}</label>
        <input class="form-control" type="text" name="key" id="key" wire:model.defer="option.key">
        <div class="validation-message">
            {{ $errors->first('option.key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.option.fields.key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('option.value') ? 'invalid' : '' }}">
        <label class="form-label" for="value">{{ trans('cruds.option.fields.value') }}</label>
        <input class="form-control" type="text" name="value" id="value" wire:model.defer="option.value">
        <div class="validation-message">
            {{ $errors->first('option.value') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.option.fields.value_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.option_file') ? 'invalid' : '' }}">
        <label class="form-label" for="file">{{ trans('cruds.option.fields.file') }}</label>
        <x-dropzone id="file" name="file" action="{{ route('admin.options.storeMedia') }}" collection-name="option_file" max-file-size="2" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.option_file') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.option.fields.file_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('option.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.option.fields.status') }}</label>
        <select class="form-control" wire:model="option.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('option.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.option.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.options.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>