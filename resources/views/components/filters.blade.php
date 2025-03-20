    <!--Search and filters section-->
    <section class="mb-8">
        <h2 class="text-2xl  font-bold text-gray-800 mb-4">Search & Filters</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!--Search bar-->
            <div>
                <label for="search-name" class="block text-sm font-medium text-gray-700">Search by Name</label>
                <input type="text" id="search-name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Enter Customer Name">
        </div>
        <!-- Filter by Date  -->
        <div>
            <label for="filter-date-start" class="block text-sm font-medium text-gray-700">Filter by Date Range</label>
    <div class="flex space-x-2">
        <input type="date" id="filter-date-start" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Start Date">
        <input type="date" id="filter-date-end" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="End Date">
        </div>
        <!-- Filter by Order Frequency -->
        <div>
            <label for="filter-frequency" class="block text-sm font-medium text-gray-700">Filter by Order Frequency</label>
            <select id="filter-frequency" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                <option value="all">All</option>
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>
        </div>
    </div>
    </section>
    <!-- Apply Filters Button -->
    <div class="flex items-end">
        <button id="apply-filters" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:text-blue-800">
            Apply Filters
        </button>
    </div>
</section>