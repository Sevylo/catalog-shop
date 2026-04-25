@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-12" x-data="{ 
    waNumber: '{{ $whatsappNumber }}',
    greeting: '{{ $checkoutGreeting }}',
    closing: '{{ $checkoutClosing }}',
    buyerName: '',
    buyerAddress: '',
    buyerNotes: '',
    
    checkout() {
        if (!this.buyerName || !this.buyerAddress) {
            window.dispatchEvent(new CustomEvent('notify', {
                detail: { message: 'Nama dan Alamat Pengiriman wajib diisi!' }
            }));
            return;
        }

        let message = `${this.greeting}\n\n`;
        
        $store.cart.items.forEach((item, index) => {
            const subtotal = item.effective_price * item.qty;
            message += `${index + 1}. ${item.name} - Qty: ${item.qty} - ${$store.cart.formatPrice(item.effective_price)} = ${$store.cart.formatPrice(subtotal)}\n`;
        });
        
        message += `\nTotal Pesanan: ${$store.cart.formatPrice($store.cart.subtotal)}\n\n`;
        message += `Nama: ${this.buyerName}\n`;
        message += `Alamat Pengiriman: ${this.buyerAddress}\n`;
        if (this.buyerNotes) {
            message += `Catatan: ${this.buyerNotes}\n`;
        }
        message += `\n${this.closing}`;
        
        const encodedMessage = encodeURIComponent(message);
        window.open(`https://wa.me/${this.waNumber}?text=${encodedMessage}`, '_blank');
        
        // Optional: clear cart after checkout
        // $store.cart.items = [];
        // $store.cart.save();
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Keranjang Belanja</h1>

        <div class="flex flex-col lg:flex-row gap-8" x-cloak>
            
            <!-- Empty Cart State -->
            <div x-show="$store.cart.items.length === 0" class="w-full bg-white rounded-2xl border border-gray-100 p-16 text-center shadow-sm">
                <div class="w-24 h-24 bg-primary-50 rounded-full flex items-center justify-center mx-auto mb-6 text-primary-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Keranjang Anda kosong</h2>
                <p class="text-gray-500 mb-8 max-w-md mx-auto">Sepertinya Anda belum menambahkan produk apapun ke dalam keranjang. Yuk mulai belanja!</p>
                <a href="{{ route('catalog.index') }}" class="inline-flex items-center justify-center bg-primary-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-primary-700 transition-colors shadow-md">
                    Lihat Katalog Produk
                </a>
            </div>

            <!-- Cart Items -->
            <div x-show="$store.cart.items.length > 0" class="w-full lg:w-2/3">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <ul class="divide-y divide-gray-100">
                        <template x-for="item in $store.cart.items" :key="item.id">
                            <li class="p-6 flex flex-col sm:flex-row gap-6 items-center">
                                <div class="w-24 h-24 bg-gray-50 rounded-xl flex-shrink-0 border border-gray-100 overflow-hidden">
                                    <img :src="item.image" :alt="item.name" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 text-center sm:text-left w-full">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1" x-text="item.name"></h3>
                                    <div class="text-primary-600 font-bold mb-4 sm:mb-0" x-text="$store.cart.formatPrice(item.effective_price)"></div>
                                </div>
                                <div class="flex items-center justify-between w-full sm:w-auto gap-6">
                                    <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden h-10 w-28">
                                        <button @click="$store.cart.updateQty(item.id, item.qty - 1)" class="px-3 bg-gray-50 hover:bg-gray-100 h-full text-gray-600 font-bold transition-colors">-</button>
                                        <input type="number" x-model="item.qty" class="w-full text-center h-full border-0 focus:ring-0 text-sm font-medium p-0" readonly>
                                        <button @click="$store.cart.updateQty(item.id, item.qty + 1)" class="px-3 bg-gray-50 hover:bg-gray-100 h-full text-gray-600 font-bold transition-colors">+</button>
                                    </div>
                                    <button @click="$store.cart.remove(item.id)" class="text-gray-400 hover:text-red-500 transition-colors p-2" title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>

            <!-- Order Summary -->
            <div x-show="$store.cart.items.length > 0" class="w-full lg:w-1/3">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Ringkasan Pesanan</h2>
                    
                    <div class="space-y-4 mb-6 pb-6 border-b border-gray-100">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal (<span x-text="$store.cart.totalItems"></span> item)</span>
                            <span class="font-medium" x-text="$store.cart.formatPrice($store.cart.subtotal)"></span>
                        </div>
                        <div class="flex justify-between text-gray-900 text-xl font-black">
                            <span>Total</span>
                            <span x-text="$store.cart.formatPrice($store.cart.subtotal)"></span>
                        </div>
                    </div>

                    <div class="space-y-4 mb-6">
                        <h3 class="font-semibold text-gray-900">Data Pembeli</h3>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap *</label>
                            <input type="text" x-model="buyerName" class="w-full px-4 py-2.5 border-gray-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Pengiriman *</label>
                            <textarea x-model="buyerAddress" rows="3" class="w-full px-4 py-2.5 border-gray-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500" placeholder="Alamat lengkap (beserta kode pos)" required></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Catatan Tambahan (Opsional)</label>
                            <input type="text" x-model="buyerNotes" class="w-full px-4 py-2.5 border-gray-300 rounded-lg shadow-sm focus:ring-primary-500 focus:border-primary-500" placeholder="Pesan untuk penjual">
                        </div>
                    </div>

                    <button @click="checkout()" class="w-full bg-[#25D366] hover:bg-[#128C7E] text-white py-4 rounded-xl font-bold text-lg transition-colors shadow-md shadow-green-500/20 flex justify-center items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                        </svg>
                        Checkout via WhatsApp
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
