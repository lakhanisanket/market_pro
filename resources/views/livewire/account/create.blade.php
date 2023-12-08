<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('account.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.account.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="account.user_id" />
        <div class="validation-message">
            {{ $errors->first('account.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.account.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('account.data') ? 'invalid' : '' }}">
        <label class="form-label" for="data">{{ trans('cruds.account.fields.data') }}</label>
        <input class="form-control" type="text" name="data" id="data" wire:model.defer="account.data">
        <div class="validation-message">
            {{ $errors->first('account.data') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.account.fields.data_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('account.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.account.fields.status') }}</label>
        <select class="form-control" wire:model="account.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('account.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.account.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.accounts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>