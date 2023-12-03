@props(['value'])

<label class="mb-1.5 block">{{ Str::ucfirst($value) ?? Str::ucfirst($slot) }}</label>