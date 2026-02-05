<a href="{{ route('products.show', $product->slug) }}" class="group block">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover">
        <!-- Image -->
        <div class="aspect-square relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
            @if($product->image)
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            @else
                <div class="w-full h-full flex items-center justify-center">
                    <span class="text-6xl opacity-50">🧸</span>
                </div>
            @endif
            
            <!-- Badges -->
            <div class="absolute top-3 left-3 flex flex-col gap-2">
                @if($product->is_bestseller)
                    <span class="px-3 py-1.5 bg-yellow-400 text-yellow-900 text-sm font-bold rounded-full">
                        ⭐ Best Seller
                    </span>
                @endif
                @if($product->discount_percentage)
                    <span class="px-3 py-1.5 bg-red-500 text-white text-sm font-bold rounded-full">
                        -{{ $product->discount_percentage }}%
                    </span>
                @endif
                @if($product->is_featured)
                    <span class="px-3 py-1.5 bg-primary-500 text-white text-sm font-bold rounded-full">
                        Unggulan
                    </span>
                @endif
            </div>
            
            <!-- Stock Badge -->
            @if($product->stock <= 0)
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                    <span class="px-4 py-2 bg-red-500 text-white font-bold rounded-full">Habis</span>
                </div>
            @elseif($product->stock < 10)
                <div class="absolute bottom-3 right-3">
                    <span class="px-3 py-1.5 bg-orange-500 text-white text-sm font-bold rounded-full">
                        ⚠️ Sisa {{ $product->stock }} stok!
                    </span>
                </div>
            @endif
        </div>
        
        <!-- Content -->
        <div class="p-4">
            <!-- Category -->
            <span class="text-xs text-primary-600 font-semibold">
                {{ $product->category->name ?? 'Uncategorized' }}
            </span>
            
            <!-- Title -->
            <h3 class="font-bold text-gray-900 mt-1 line-clamp-2 group-hover:text-primary-600 transition-colors">
                {{ $product->name }}
            </h3>
            
            <!-- Age Range -->
            @if($product->age_range)
                <p class="text-xs text-gray-500 mt-1">
                    <span class="inline-flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        {{ $product->age_range }}
                    </span>
                </p>
            @endif
            
            <!-- Price -->
            <div class="mt-3 flex items-center gap-2">
                <span class="text-lg font-bold text-secondary-600">
                    {{ $product->formatted_price }}
                </span>
                @if($product->original_price && $product->original_price > $product->price)
                    <span class="text-sm text-gray-400 line-through">
                        {{ $product->formatted_original_price }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</a>
