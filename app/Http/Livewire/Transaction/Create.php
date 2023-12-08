<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Account;
use App\Models\Transaction;
use Livewire\Component;

class Create extends Component
{
    public Transaction $transaction;

    public array $listsForFields = [];

    public function mount(Transaction $transaction)
    {
        $this->transaction = $transaction;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.transaction.create');
    }

    public function submit()
    {
        $this->validate();

        $this->transaction->save();

        return redirect()->route('admin.transactions.index');
    }

    protected function rules(): array
    {
        return [
            'transaction.account_id' => [
                'integer',
                'exists:accounts,id',
                'nullable',
            ],
            'transaction.value' => [
                'string',
                'nullable',
            ],
            'transaction.data' => [
                'string',
                'nullable',
            ],
            'transaction.response' => [
                'string',
                'nullable',
            ],
            'transaction.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['account'] = Account::pluck('data', 'id')->toArray();
        $this->listsForFields['status']  = $this->transaction::STATUS_SELECT;
    }
}
