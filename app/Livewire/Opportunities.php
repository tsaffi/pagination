<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;

class Opportunities extends Component
{
    use WithPagination;

    public $sort = null;
    public $search = null;
    public $perPage = 20; // Default number of items per page
    public $options = [20, 50, 100, 250]; // Options for items per page
    public $sortOptions = ['ascending', 'descending']; // Options for sorting
    protected $queryString = ['perPage', 'sort', 'search']; // Keep perPage, sort and search url params in the URL

    public function updatingPerPage()
    {
        $this->resetPage(); // Reset to the first page when perPage changes
    }

    public function render()
    {
        $cacheKey = $this->perPage.$this->sort.$this->search; // It should be unique based on the query params

        $items = Cache::remember('items-'.$cacheKey, 3600, function () { // Cache the result for 1 hour. Just for illustration
            return Item::select('id', 'name')
                ->when($this->search, fn($query) => $query->where('name', 'like', "%{$this->search}%"))
                ->when($this->sort && $this->sort == 'ascending', fn($query) => $query->orderBy('name'))
                ->when($this->sort && $this->sort == 'descending', fn($query) => $query->orderByDesc('name'))
                ->when(!$this->sort, fn($query) => $query->orderBy('id'))
                ->paginate($this->perPage);
        });

        return view('livewire.opportunities', [
            'items' => $items
        ]);
    }
}
