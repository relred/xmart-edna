<?php

use App\Models\Guardian;
use Livewire\Volt\Component;
use Illuminate\Database\Eloquent\Builder;

new class extends Component {

    public ?int $quantity = 10;
    public ?string $search = null;

    public function with(): array
    {
        return [
            'headers' => [
                ['index' => 'name', 'label' => 'Nombre del Adulto'],
                ['index' => 'action', 'label' => 'Acciones'],
            ],
            'rows' => Guardian::query()
                ->when($this->search, function (Builder $query) {
                    return $query->where('name', 'like', "%{$this->search}%");
                })
                ->paginate($this->quantity)
                ->withQueryString(),
            'type' => 'data',
        ];
    }
}; ?>

<div>
    <x-ts-table :$headers :$rows filter loading >
        @interact('column_action', $row) 
            <x-ts-button.circle color="amber"
                                icon="chevron-double-right"
                                href="{{ route('guardians.show', $row->id) }}"/>
        @endinteract
    </x-ts-table>
</div>
