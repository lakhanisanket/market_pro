<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('transaction_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Transaction" format="csv" />
                <livewire:excel-export model="Transaction" format="xlsx" />
                <livewire:excel-export model="Transaction" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.transaction.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.account') }}
                            @include('components.table.sort', ['field' => 'account.data'])
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.value') }}
                            @include('components.table.sort', ['field' => 'value'])
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.data') }}
                            @include('components.table.sort', ['field' => 'data'])
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.response') }}
                            @include('components.table.sort', ['field' => 'response'])
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $transaction)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $transaction->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $transaction->id }}
                            </td>
                            <td>
                                @if($transaction->account)
                                    <span class="badge badge-relationship">{{ $transaction->account->data ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $transaction->value }}
                            </td>
                            <td>
                                {{ $transaction->data }}
                            </td>
                            <td>
                                {{ $transaction->response }}
                            </td>
                            <td>
                                {{ $transaction->status_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('transaction_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.transactions.show', $transaction) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('transaction_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.transactions.edit', $transaction) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('transaction_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $transaction->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $transactions->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush