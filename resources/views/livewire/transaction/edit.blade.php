<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('transaction.account_id') ? 'invalid' : '' }}">
        <label class="form-label" for="account">{{ trans('cruds.transaction.fields.account') }}</label>
        <x-select-list class="form-control" id="account" name="account" :options="$this->listsForFields['account']" wire:model="transaction.account_id" />
        <div class="validation-message">
            {{ $errors->first('transaction.account_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.account_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('transaction.value') ? 'invalid' : '' }}">
        <label class="form-label" for="value">{{ trans('cruds.transaction.fields.value') }}</label>
        <input class="form-control" type="text" name="value" id="value" wire:model.defer="transaction.value">
        <div class="validation-message">
            {{ $errors->first('transaction.value') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.value_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('transaction.data') ? 'invalid' : '' }}">
        <label class="form-label" for="data">{{ trans('cruds.transaction.fields.data') }}</label>
        <input class="form-control" type="text" name="data" id="data" wire:model.defer="transaction.data">
        <div class="validation-message">
            {{ $errors->first('transaction.data') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.data_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('transaction.response') ? 'invalid' : '' }}">
        <label class="form-label" for="response">{{ trans('cruds.transaction.fields.response') }}</label>
        <input class="form-control" type="text" name="response" id="response" wire:model.defer="transaction.response">
        <div class="validation-message">
            {{ $errors->first('transaction.response') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.response_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('transaction.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.transaction.fields.status') }}</label>
        <select class="form-control" wire:model="transaction.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('transaction.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>