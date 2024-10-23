<div class="mt-4 grid grid-cols-3 gap-4 justify-center">
    <!-- Items per page selection -->
    <div class="flex">
        <div class="flex-none w-14">
            <label for="perPage">Items per page:</label>
            <select wire:model.change="perPage" id="perPage">
                @foreach($options as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex-none w-14">
            <label>Search</label>
            <input wire:model.change="search" type="search" placeholder="Search by name...">
        </div>

        <div class="flex-none w-14">
            <label>Sort:</label>
            <select wire:model.change="sort" id="sort">
                <option value="">Please Select</option>
                @foreach($sortOptions as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>
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
