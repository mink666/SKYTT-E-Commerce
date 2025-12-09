<div class="bg-gray-50 py-16 mt-12">
        <div class="container mx-auto px-4 max-w-4xl">
            <h2 class="text-2xl font-bold text-center uppercase mb-8">Thông số kỹ thuật</h2>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden p-6">
                <div class="grid grid-cols-1 divide-y divide-gray-100">

                    @foreach($bike->specs as $spec)
                        <div class="flex justify-between py-4 hover:bg-gray-50 px-2 transition-colors">
                            <span class="text-gray-600 font-medium">{{ $spec->label }}</span>
                            <span class="font-bold text-gray-900 text-right">{{ $spec->value }}</span>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
