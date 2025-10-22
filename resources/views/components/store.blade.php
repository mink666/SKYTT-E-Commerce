@props(['name','address','hotline'])
<div class="reveal rounded-xl border bg-white p-6 shadow-sm">
  <div class="font-semibold">{{ $name }}</div>
  <div class="mt-1 text-slate-600">{{ $address }}</div>
  <div class="mt-1 text-slate-600">Hotline: {{ $hotline }}</div>
</div>
