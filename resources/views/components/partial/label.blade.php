<div class="mt-6">
  @if ($attributes->get('name') == 'password_confirmation')
  <label class="capitalize mb-1.5 block" for="{{ $attributes['name'] }}">Confirm Password</label>
  @elseif ($attributes->get('name') == 'usermail')
  <label class="capitalize mb-1.5 block" for="{{ $attributes['name'] }}">Username / Email</label>
  @else
  <label class="capitalize mb-1.5 block" for="{{ $attributes['name'] }}">{{ $attributes['name'] }}</label>
  @endif

  <input type="{{ $attributes['type'] }}" id="{{ $attributes['name'] }}" name="{{ $attributes['name'] }}" class="block w-full rounded-md border-0 @error($attributes['name']) animate-shake ring-red-600 ring-2 @enderror px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-600 sm:text-sm sm:leading-6 outline-none" value="{{ old($attributes['name']) }}">
  
  @error($attributes['name'])
  <span class="text-red-500 text-xs" role="alert">
    {{ $message }}
  </span>
  @enderror
</div>