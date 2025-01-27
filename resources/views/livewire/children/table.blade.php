<?php

use App\Models\Child;
use Livewire\Volt\Component;
use Illuminate\Database\Eloquent\Builder;

new class extends Component {

    public ?int $quantity = 100;
    public ?string $search = null;

    public function with(): array
    {
        return [
            'headers' => [
                ['index' => 'name', 'label' => 'Nombre del Niño'],
                ['index' => 'gradeLevel.name', 'label' => 'Grado'],
                ['index' => 'gradeLevel.classroom.name', 'label' => 'Salón'],
                ['index' => 'action', 'label' => 'Acciones'],
            ],
            'rows' => Child::query()
                ->when($this->search, function (Builder $query) {
                    return $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%']);
                })
                ->paginate($this->quantity)
                ->withQueryString(),
            'type' => 'data',
        ];
    }
}; ?>

<div>
    <x-ts-table :$headers :$rows filter loading paginate :paginator="null">
        @interact('column_action', $row) 
            <x-ts-button.circle color="amber"
                                icon="chevron-double-right"
                                href="{{ route('child.show', $row->id) }}"/>
        @endinteract
    </x-ts-table>
</div>
