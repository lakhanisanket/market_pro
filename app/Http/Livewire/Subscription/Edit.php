<?php

namespace App\Http\Livewire\Subscription;

use App\Models\Subscription;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public Subscription $subscription;

    public function mount(Subscription $subscription)
    {
        $this->subscription = $subscription;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.subscription.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->subscription->save();

        return redirect()->route('admin.subscriptions.index');
    }

    protected function rules(): array
    {
        return [
            'subscription.plan_type' => [
                'string',
                'nullable',
            ],
            'subscription.amount' => [
                'string',
                'nullable',
            ],
            'subscription.start_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'subscription.end_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'subscription.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'subscription.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->subscription::STATUS_SELECT;
        $this->listsForFields['user']   = User::pluck('name', 'id')->toArray();
    }
}
