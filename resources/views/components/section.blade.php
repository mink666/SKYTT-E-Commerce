{{-- resources/views/components/section.blade.php --}}
@props(['id' => null])

<section id="{{ $id }}" {{ $attributes->merge(['class' => 'py-16']) }}>
  <div class="max-w-5xl mx-auto px-4">
    {{ $slot }}
  </div>
</section>
