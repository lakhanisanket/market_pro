<?php

namespace App\Http\Livewire\Option;

use App\Models\Option;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Option $option;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->option->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Option $option)
    {
        $this->option = $option;
        $this->initListsForFields();
        $this->mediaCollections = [

            'option_file' => $option->file,

        ];
    }

    public function render()
    {
        return view('livewire.option.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->option->save();
        $this->syncMedia();

        return redirect()->route('admin.options.index');
    }

    protected function rules(): array
    {
        return [
            'option.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'option.key' => [
                'string',
                'nullable',
            ],
            'option.value' => [
                'string',
                'nullable',
            ],
            'mediaCollections.option_file' => [
                'array',
                'nullable',
            ],
            'mediaCollections.option_file.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'option.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']   = User::pluck('name', 'id')->toArray();
        $this->listsForFields['status'] = $this->option::STATUS_SELECT;
    }
}
