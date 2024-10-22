<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item;

class Opportunities extends Component
{
    use WithPagination;

    public $sort;
    public $search;
    public $perPage = 20; // Default number of items per page
    public $options = [20, 50, 100, 250]; // Options for items per page
    public $sortOptions = ['ascending', 'descending']; // Options for sorting
    protected $queryString = ['perPage', 'sort', 'search']; // Keep perPage in the URL

    public function updatingPerPage()
    {
        $this->resetPage(); // Reset to the first page when perPage changes
    }

    public function render()
    {
        $items = Item::select('id', 'name')
            ->when($this->search, fn($query) => $query->where('name', 'like', "%{$this->search}%"))
            ->when($this->sort && $this->sort == 'ascending', fn($query) => $query->orderBy('id'))
            ->when($this->sort && $this->sort == 'descending', fn($query) => $query->orderByDesc('id'))
            ->paginate($this->perPage);

        return view('livewire.opportunities', [
            'items' => $items
        ]);
    }
}
