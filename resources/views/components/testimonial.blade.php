@props(['quote','author' => 'Khách hàng'])
<figure class="rounded-xl border bg-white p-6 shadow-sm">
  <blockquote class="text-slate-700">“{{ $quote }}”</blockquote>
  <figcaption class="mt-3 text-sm text-slate-500">— {{ $author }}</figcaption>
</figure>