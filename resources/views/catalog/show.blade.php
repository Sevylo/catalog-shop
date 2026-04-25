@extends('layouts.app')

@section('content')
<div class="bg-gray-50 pt-8 pb-16 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <nav class="flex text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('catalog.index') }}" class="hover:text-primary-600 font-medium">Katalog</a>
                </li>
                @if($product->category)
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('catalog.index', ['category' => $product->category->slug]) }}" class="hover:text-primary-600 font-medium">{{ $product->category->name }}</a>
                    </div>
                </li>
                @endif
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-900 font-medium line-clamp-1">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex flex-col lg:flex-row">
                <!-- Product Image -->
                <div class="lg:w-1/2 bg-gray-50 p-8 flex items-center justify-center border-r border-gray-100">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full max-w-md h-auto object-cover rounded-xl shadow-lg mix-blend-multiply">
                </div>
                
                <!-- Product Info -->
                <div class="lg:w-1/2 p-8 lg:p-12" x-data="{ qty: 1 }">
                    <div class="mb-2 flex items-center justify-between">
                        <span class="text-sm font-semibold text-primary-600 tracking-wider uppercase">{{ $product->category->name ?? 'Uncategorized' }}</span>
                        
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-{{ $product->stock_status_color }}-100 text-{{ $product->stock_status_color }}-800">
                                {{ $product->stock_status }} ({{ $product->stock }})
                            </span>
                        </div>
                    </div>
                    
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4 leading-tight">{{ $product->name }}</h1>
                    
                    <div class="mb-6">
                        @if($product->isOnSale())
                            <div class="flex items-center gap-3">
                                <span class="text-3xl font-black text-red-600">{{ $product->formatted_effective_price }}</span>
                                <span class="text-xl text-gray-400 line-through font-medium">{{ $product->formatted_price }}</span>
                                <span class="bg-red-100 text-red-700 text-xs font-bold px-2 py-1 rounded">Promo</span>
                            </div>
                        @else
                            <span class="text-3xl font-black text-gray-900">{{ $product->formatted_price }}</span>
                        @endif
                        <div class="text-sm text-gray-500 mt-1">per {{ $product->unit }}</div>
                    </div>
                    
                    <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                        {{ $product->description }}
                    </p>
                    
                    @if($product->isAvailable())
                        <div class="border-t border-gray-100 pt-8 mt-8">
                            <div class="flex flex-col sm:flex-row gap-4 items-end">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                                    <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden h-12 w-32">
                                        <button @click="qty > 1 ? qty-- : null" class="px-3 bg-gray-50 hover:bg-gray-100 h-full text-gray-600 font-bold transition-colors">-</button>
                                        <input type="number" x-model="qty" min="1" max="{{ $product->stock }}" class="w-full text-center h-full border-0 focus:ring-0 text-lg font-medium p-0" readonly>
                                        <button @click="qty < {{ $product->stock }} ? qty++ : null" class="px-3 bg-gray-50 hover:bg-gray-100 h-full text-gray-600 font-bold transition-colors">+</button>
                                    </div>
                                </div>
                                
                                <button 
                                    @click="$store.cart.add({{ json_encode(['id' => $product->id, 'name' => $product->name, 'price' => (float)$product->price, 'sale_price' => (float)$product->sale_price, 'image_url' => $product->image_url]) }}, qty)"
                                    class="flex-1 bg-primary-600 text-white h-12 px-8 rounded-lg font-bold text-lg hover:bg-primary-700 transition-colors shadow-md shadow-primary-600/30 flex items-center justify-center gap-2"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                    Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="border-t border-gray-100 pt-8 mt-8">
                            <div class="bg-gray-100 text-gray-500 text-center py-4 rounded-lg font-bold">
                                Maaf, stok produk saat ini sedang habis.
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            @if($product->long_description)
            <div class="border-t border-gray-100">
                <div class="p-8 lg:p-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Deskripsi Lengkap</h2>
                    <div class="prose prose-primary max-w-none prose-lg text-gray-600">
                        {!! $product->long_description !!}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@if($relatedProducts->count() > 0)
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-2xl font-bold text-gray-900 mb-8">Produk Terkait</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($relatedProducts as $related)
            <x-product-card :product="$related" />
        @endforeach
    </div>
</div>
@endif
@endsection
