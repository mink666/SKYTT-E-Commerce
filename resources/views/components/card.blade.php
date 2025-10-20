@props([
  'image' => null,
  'title',
  'badge' => 'Xe điện',
  'price' => null,
  'stats' => [], // e.g. [['label' => 'Tốc độ tối đa','value' => '49 km/h*'], ...]
  'cta' => ['label' => 'Tìm hiểu thêm','href' => '#'],
])

<article class="rounded-xl border shadow-sm overflow-hidden bg-white">
  @if($image)
    <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-48 object-cover">
  @endif
  <div class="p-5">
    <div class="text-xs uppercase tracking-wide text-slate-500">{{ $badge }}</div>
    <h3 class="mt-1 text-xl font-semibold">{{ $title }}</h3>
    @if($price)
      <div class="mt-1 font-medium text-emerald-600">{{ $price }}</div>
    @endif

    @if(!empty($stats))
      <dl class="mt-4 grid grid-cols-3 gap-4 text-sm">
        @foreach($stats as $s)
          <div>
            <dt class="text-slate-500">{{ $s['label'] }}</dt>
            <dd class="font-medium">{{ $s['value'] }}</dd>
          </div>
        @endforeach
      </dl>
    @endif

    <div class="mt-5">
  <x-btn :href="$cta['href'] ?? '#'"
         :label="$cta['label'] ?? 'Tìm hiểu thêm'" />
</div>

  </div>
</article>