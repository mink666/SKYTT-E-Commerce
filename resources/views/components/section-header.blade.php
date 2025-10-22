@props(['title','subtitle' => null,'align' => 'center'])
<div class="mb-10 text-{{ $align }}">
  <h2 class="text-3xl font-bold">{{ $title }}</h2>
  @if($subtitle)
    <p class="mt-2 text-slate-600">{{ $subtitle }}</p>
  @endif
</div>