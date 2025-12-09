@extends('layouts.app')

@section('title', $bike->name)

@section('content')
<div class="bg-white font-sans text-[#1A1A1A]" x-data="{
    selectedVariant: {{ $bike->variants->first() }},
    formatPrice(price) {
        return new Intl.NumberFormat('vi-VN').format(price);
    }
}">

    @include('products.sections.hero')
    @include('products.sections.feature_highlight')
    @include('products.sections.details', ['bike' => $bike])
    @include('products.sections.bottom')
</div>
@endsection
