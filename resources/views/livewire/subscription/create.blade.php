<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('subscription.plan_type') ? 'invalid' : '' }}">
        <label class="form-label" for="plan_type">{{ trans('cruds.subscription.fields.plan_type') }}</label>
        <input class="form-control" type="text" name="plan_type" id="plan_type" wire:model.defer="subscription.plan_type">
        <div class="validation-message">
            {{ $errors->first('subscription.plan_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subscription.fields.plan_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('subscription.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.subscription.fields.amount') }}</label>
        <input class="form-control" type="text" name="amount" id="amount" wire:model.defer="subscription.amount">
        <div class="validation-message">
            {{ $errors->first('subscription.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subscription.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('subscription.start_date') ? 'invalid' : '' }}">
        <label class="form-label" for="start_date">{{ trans('cruds.subscription.fields.start_date') }}</label>
        <x-date-picker class="form-control" wire:model="subscription.start_date" id="start_date" name="start_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('subscription.start_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subscription.fields.start_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('subscription.end_date') ? 'invalid' : '' }}">
        <label class="form-label" for="end_date">{{ trans('cruds.subscription.fields.end_date') }}</label>
        <x-date-picker class="form-control" wire:model="subscription.end_date" id="end_date" name="end_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('subscription.end_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subscription.fields.end_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('subscription.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.subscription.fields.status') }}</label>
        <select class="form-control" wire:model="subscription.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('subscription.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subscription.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('subscription.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.subscription.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="subscription.user_id" />
        <div class="validation-message">
            {{ $errors->first('subscription.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subscription.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>