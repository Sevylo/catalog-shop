@props(['product'])

<div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full transform hover:-translate-y-1">
    <a href="{{ route('catalog.show', $product->slug) }}" class="block relative aspect-[4/3] overflow-hidden bg-gray-50">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500 ease-out">
        
        <!-- Badges -->
        <div class="absolute top-3 left-3 flex flex-col gap-2">
            @if($product->isOnSale())
                <span class="bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-md shadow-sm">
                    Diskon
                </span>
            @endif
            @if($product->is_featured)
                <span class="bg-amber-400 text-amber-900 text-xs font-bold px-2.5 py-1 rounded-md shadow-sm">
                    Unggulan
                </span>
            @endif
        </div>
        
        @if(!$product->isAvailable())
            <div class="absolute inset-0 bg-white/60 backdrop-blur-sm flex items-center justify-center">
                <span class="bg-gray-900 text-white text-sm font-bold px-4 py-1.5 rounded-full">Stok Habis</span>
            </div>
        @endif
    </a>
    
    <div class="p-5 flex flex-col flex-grow">
        <div class="text-xs font-medium text-primary-600 mb-2 uppercase tracking-wide">
            {{ $product->category->name ?? 'Kategori' }}
        </div>
        
        <a href="{{ route('catalog.show', $product->slug) }}" class="block mb-2 group-hover:text-primary-600 transition-colors">
            <h3 class="font-bold text-gray-900 leading-snug line-clamp-2">
                {{ $product->name }}
            </h3>
        </a>
        
        <div class="mt-auto pt-4 flex items-center justify-between">
            <div>
                @if($product->isOnSale())
                    <div class="text-xs text-gray-400 line-through mb-0.5">{{ $product->formatted_price }}</div>
                    <div class="text-lg font-bold text-red-600">{{ $product->formatted_effective_price }}</div>
                @else
                    <div class="text-lg font-bold text-gray-900">{{ $product->formatted_price }}</div>
                @endif
            </div>
            
            @if($product->isAvailable())
                <button 
                    @click.prevent="$store.cart.add({{ json_encode(['id' => $product->id, 'name' => $product->name, 'price' => (float)$product->price, 'sale_price' => (float)$product->sale_price, 'image_url' => $product->image_url]) }})"
                    class="w-10 h-10 rounded-full bg-primary-50 text-primary-600 flex items-center justify-center hover:bg-primary-600 hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                    title="Tambah ke Keranjang"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            @endif
        </div>
    </div>
</div>
