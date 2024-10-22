<div>
    <!-- Items per page selection -->
    <div>
        <label for="perPage">Items per page:</label>
        <select wire:model.change="perPage" id="perPage">
            @foreach($options as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>

        <label>Search</label>
        <input wire:model.change="search" type="search" placeholder="Search by name...">

        <label>Sort:</label>
        <select wire:model.change="sort" id="sort">
            @foreach($sortOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    </div>

    <!-- Items list -->
    <div>
        @foreach($items as $item)
            <div>{{ $item->name }}</div>
        @endforeach
    </div>
    <!-- Pagination links -->
    {{ $items->links() }}
</div>
