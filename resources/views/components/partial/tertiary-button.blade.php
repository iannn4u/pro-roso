@props(['path'])

<a {{
  $attributes->class(['flex','gap-3','items-center','mb-3','px-4','py-2.5','rounded-full','bg-gray-300' => $path,'hover:bg-gray-200' => !$path])
  }}>
  {{ $slot }}
</a>