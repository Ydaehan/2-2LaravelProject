@props (['posts'])
<style>
    /* Your custom Tailwind CSS styles */

</style>
<div class="flex items-center justify-between border-b-2 border-x-2 border-black bg-white px-4 py-3 sm:px-6">
  <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
    <div>
        <nav class="font-3xl" aria-label="Pagination">
            {{ $posts->onEachSide(5)->links('vendor.pagination.tailwind') }}
        </nav>
    </div>
  </div>
</div>