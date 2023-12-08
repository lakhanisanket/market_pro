<?php

namespace App\Http\Livewire\Country;

use App\Models\Country;
use Livewire\Component;

class Create extends Component
{
    public Country $country;

    public array $listsForFields = [];

    public function mount(Country $country)
    {
        $this->country = $country;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.country.create');
    }

    public function submit()
    {
        $this->validate();

        $this->country->save();

        return redirect()->route('admin.countries.index');
    }

    protected function rules(): array
    {
        return [
            'country.name' => [
                'string',
                'nullable',
            ],
            'country.short_code' => [
                'string',
                'nullable',
            ],
            'country.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->country::STATUS_SELECT;
    }
}
