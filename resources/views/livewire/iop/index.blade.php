<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('iop_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Iop" format="csv" />
                <livewire:excel-export model="Iop" format="xlsx" />
                <livewire:excel-export model="Iop" format="pdf" />
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
                            {{ trans('cruds.iop.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.iop.fields.country') }}
                            @include('components.table.sort', ['field' => 'country.name'])
                        </th>
                        <th>
                            {{ trans('cruds.iop.fields.isp') }}
                            @include('components.table.sort', ['field' => 'isp'])
                        </th>
                        <th>
                            {{ trans('cruds.iop.fields.port') }}
                            @include('components.table.sort', ['field' => 'port'])
                        </th>
                        <th>
                            {{ trans('cruds.iop.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($iops as $iop)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $iop->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $iop->id }}
                            </td>
                            <td>
                                @if($iop->country)
                                    <span class="badge badge-relationship">{{ $iop->country->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $iop->isp }}
                            </td>
                            <td>
                                {{ $iop->port }}
                            </td>
                            <td>
                                {{ $iop->status_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('iop_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.iops.show', $iop) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('iop_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.iops.edit', $iop) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('iop_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $iop->id }})" wire:loading.attr="disabled">
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
            {{ $iops->links() }}
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