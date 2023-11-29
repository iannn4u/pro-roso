<div class="mb-4">
  <label for="floatingTextarea2" class="mb-2 block text-sm font-medium text-gray-900 capitalize">{{
    $attributes->get('name') }}</label>
  <textarea
    class="block w-full rounded-lg border outline-none border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-red-500 focus:ring-2 ring-inset focus:ring-red-500 @error($attributes->get('name')) animate-shake ring-red-600 ring-2 @enderror"
    placeholder="Tambahkan {{ $attributes->get('name') }} disini" id="floatingTextarea2" style="height: 100px"
    name="{{ $attributes->get('name') }}">{{ old($attributes->get('name')) }}</textarea>
    @error($attributes->get('name'))
    <span class="text-red-500 text-xs" role="alert">
      {{ $message }}
    </span>
    @enderror
</div>
