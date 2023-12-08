<?php

namespace App\Http\Livewire\Iop;

use App\Models\Country;
use App\Models\Iop;
use Livewire\Component;

class Create extends Component
{
    public Iop $iop;

    public array $listsForFields = [];

    public function mount(Iop $iop)
    {
        $this->iop = $iop;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.iop.create');
    }

    public function submit()
    {
        $this->validate();

        $this->iop->save();

        return redirect()->route('admin.iops.index');
    }

    protected function rules(): array
    {
        return [
            'iop.country_id' => [
                'integer',
                'exists:countries,id',
                'nullable',
            ],
            'iop.isp' => [
                'string',
                'nullable',
            ],
            'iop.port' => [
                'string',
                'nullable',
            ],
            'iop.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['country'] = Country::pluck('name', 'id')->toArray();
        $this->listsForFields['status']  = $this->iop::STATUS_SELECT;
    }
}
