<div {{ $attributes->merge(['class'=>'relative mb-5 pb-4 before:absolute before:bottom-0 before:left-0 before:h-px
  before:w-6 before:bg-gray-950 after:absolute after:bottom-0 after:left-8 after:right-0 after:h-px
  after:bg-gray-900/20']) }}>
  {{ $slot }}
</div>