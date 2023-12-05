@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center p-3">
  <div class="block sm:flex sm:items-center sm:justify-center">
    <div class="relative z-0 inline-flex shadow-sm rounded-md w-full">
      {{-- Previous Page Link --}}
      @unless ($paginator->onFirstPage())
      <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
        Previous
      </a>
      @endunless

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
      @foreach ($element as $page => $url)
      @if ($page == $paginator->currentPage())
      <span aria-current="page">
        <span
          class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white border bg-gray-600 border-gray-300 cursor-default leading-5">{{
          $page }}</span>
      </span>
      @else
      <a href="{{ $url }}"
        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
        {{ $page }}
      </a>
      @endif
      @endforeach
      @endforeach

      {{-- Next Page Link --}}
      @unless (!$paginator->hasMorePages())
      <a href="{{ $paginator->nextPageUrl() }}" rel="next"
        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
        Next
      </a>
      @endunless
    </div>
  </div>
</nav>
@endif