<?php

namespace App\Http\Livewire\Account;

use App\Models\Account;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Account $account;

    public array $listsForFields = [];

    public function mount(Account $account)
    {
        $this->account = $account;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.account.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->account->save();

        return redirect()->route('admin.accounts.index');
    }

    protected function rules(): array
    {
        return [
            'account.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'account.data' => [
                'string',
                'nullable',
            ],
            'account.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']   = User::pluck('name', 'id')->toArray();
        $this->listsForFields['status'] = $this->account::STATUS_SELECT;
    }
}
