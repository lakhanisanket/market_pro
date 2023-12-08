<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('option_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Option" format="csv" />
                <livewire:excel-export model="Option" format="xlsx" />
                <livewire:excel-export model="Option" format="pdf" />
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
                            {{ trans('cruds.option.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.option.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.option.fields.key') }}
                            @include('components.table.sort', ['field' => 'key'])
                        </th>
                        <th>
                            {{ trans('cruds.option.fields.value') }}
                            @include('components.table.sort', ['field' => 'value'])
                        </th>
                        <th>
                            {{ trans('cruds.option.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.option.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($options as $option)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $option->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $option->id }}
                            </td>
                            <td>
                                @if($option->user)
                                    <span class="badge badge-relationship">{{ $option->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $option->key }}
                            </td>
                            <td>
                                {{ $option->value }}
                            </td>
                            <td>
                                @foreach($option->file as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $option->status_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('option_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.options.show', $option) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('option_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.options.edit', $option) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('option_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $option->id }})" wire:loading.attr="disabled">
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
            {{ $options->links() }}
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