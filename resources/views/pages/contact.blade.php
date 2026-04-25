@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-[calc(100vh-16rem)] py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight mb-4">Hubungi Kami</h1>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto">
                Kami siap membantu Anda. Jangan ragu untuk menghubungi tim kami melalui kontak di bawah ini.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            
            <!-- Contact Info Cards -->
            <div class="space-y-6">
                <!-- Address -->
                <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm flex gap-6 items-start group hover:border-primary-200 hover:shadow-md transition-all">
                    <div class="w-14 h-14 bg-primary-50 rounded-xl flex items-center justify-center flex-shrink-0 text-primary-600 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Alamat Kami</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $settings['store_address'] ?? 'Alamat Belum Diatur' }}</p>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm flex gap-6 items-start group hover:border-[#25D366]/20 hover:shadow-md transition-all">
                    <div class="w-14 h-14 bg-[#25D366]/10 rounded-xl flex items-center justify-center flex-shrink-0 text-[#25D366] group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">WhatsApp</h3>
                        <p class="text-gray-600 mb-4">{{ $settings['whatsapp_number'] ?? '-' }}</p>
                        @if(isset($settings['whatsapp_number']))
                        <a href="https://wa.me/{{ $settings['whatsapp_number'] }}" target="_blank" class="inline-flex items-center text-[#25D366] font-semibold hover:text-[#128C7E]">
                            Chat Sekarang &rarr;
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Email & Hours -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm group hover:border-primary-200 transition-all">
                        <div class="w-12 h-12 bg-primary-50 rounded-lg flex items-center justify-center text-primary-600 mb-4 group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Email</h3>
                        <p class="text-gray-600 break-all">{{ $settings['store_email'] ?? '-' }}</p>
                    </div>

                    <div class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm group hover:border-primary-200 transition-all">
                        <div class="w-12 h-12 bg-primary-50 rounded-lg flex items-center justify-center text-primary-600 mb-4 group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Jam Operasional</h3>
                        <p class="text-gray-600">{{ $settings['store_hours'] ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Maps/Image Area -->
            <div class="h-full min-h-[400px] bg-gray-200 rounded-3xl overflow-hidden shadow-inner relative border border-gray-100">
                @if(isset($settings['maps_embed_url']) && $settings['maps_embed_url'])
                    <iframe src="{{ $settings['maps_embed_url'] }}" width="100%" height="100%" style="border:0; position:absolute; top:0; left:0; width:100%; height:100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                @else
                    <div class="absolute inset-0 flex items-center justify-center flex-col text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 mb-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        <p class="font-medium">Peta Belum Ditambahkan</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
