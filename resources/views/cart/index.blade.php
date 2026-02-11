@extends('layouts.app')

@section('title', 'Keranjang Belanja - Happy Shop')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Keranjang Belanja</h1>
            <p class="mt-2 text-gray-600">Review pesanan Anda sebelum checkout via WhatsApp</p>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        @if($cartItems->isEmpty())
            <!-- Empty Cart -->
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                <div class="text-6xl mb-4">🛒</div>
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Keranjang Anda Kosong</h2>
                <p class="text-gray-600 mb-6">Yuk, mulai belanja mainan seru untuk si kecil!</p>
                <a href="{{ route('products.index') }}" 
                   class="inline-block bg-primary hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-xl transition-colors">
                    Lihat Produk
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <h2 class="text-lg font-semibold text-gray-800">
                                <span id="cart-count-text">{{ $cartItems->sum('quantity') }}</span> Item dalam Keranjang
                            </h2>
                        </div>
                        
                        <div id="cart-items-container">
                            @foreach($cartItems as $item)
                                <div class="cart-item p-6 border-b border-gray-100 last:border-0" data-id="{{ $item->id }}">
                                    <div class="flex items-center gap-4">
                                        <!-- Product Image -->
                                        <div class="w-24 h-24 flex-shrink-0">
                                            @if($item->product->image)
                                                <img src="{{ asset('storage/' . $item->product->image) }}" 
                                                     alt="{{ $item->product->name }}"
                                                     class="w-full h-full object-cover rounded-xl">
                                            @else
                                                <div class="w-full h-full bg-gray-200 rounded-xl flex items-center justify-center">
                                                    <span class="text-3xl">🧸</span>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Product Info -->
                                        <div class="flex-grow">
                                            <h3 class="font-semibold text-gray-800">
                                                <a href="{{ route('products.show', $item->product->slug) }}" 
                                                   class="hover:text-primary transition-colors">
                                                    {{ $item->product->name }}
                                                </a>
                                            </h3>
                                            <p class="text-sm text-gray-500 mb-2">{{ $item->product->category->name ?? 'Uncategorized' }}</p>
                                            <p class="text-primary font-bold">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                                            
                                            @if($item->product->stock < 10)
                                                <p class="text-xs text-orange-600 mt-1">⚠️ Sisa {{ $item->product->stock }} stok!</p>
                                            @endif
                                        </div>

                                        <!-- Quantity & Actions -->
                                        <div class="flex flex-col items-end gap-2">
                                            <div class="flex items-center gap-2">
                                                <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})" 
                                                        class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition-colors"
                                                        {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                                    <span class="text-gray-600">−</span>
                                                </button>
                                                <input type="number" 
                                                       value="{{ $item->quantity }}" 
                                                       min="1" 
                                                       max="{{ $item->product->stock }}"
                                                       class="w-14 h-8 text-center border border-gray-200 rounded-lg text-sm qty-input"
                                                       data-id="{{ $item->id }}"
                                                       onchange="updateQuantity({{ $item->id }}, this.value)">
                                                <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})" 
                                                        class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition-colors"
                                                        {{ $item->quantity >= $item->product->stock ? 'disabled' : '' }}>
                                                    <span class="text-gray-600">+</span>
                                                </button>
                                            </div>
                                            
                                            <p class="text-sm font-semibold text-gray-700 item-subtotal">
                                                Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                            </p>
                                            
                                            <button onclick="removeItem({{ $item->id }})" 
                                                    class="text-red-500 hover:text-red-700 text-sm transition-colors">
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Order Summary & Checkout -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Pesanan</h2>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span id="subtotal-price">Rp {{ number_format($cartTotal, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Ongkir</span>
                                <span class="text-green-600">Konfirmasi via WA</span>
                            </div>
                            <hr class="border-gray-100">
                            <div class="flex justify-between text-lg font-bold text-gray-800">
                                <span>Total</span>
                                <span id="total-price" class="text-primary">Rp {{ number_format($cartTotal, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Customer Info Form -->
                        <form action="{{ route('cart.checkout') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="name" 
                                       class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition"
                                       placeholder="Masukkan nama Anda">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Pengiriman</label>
                                <textarea name="address" rows="2"
                                          class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none"
                                          placeholder="Masukkan alamat lengkap"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Catatan (opsional)</label>
                                <textarea name="notes" rows="2"
                                          class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none"
                                          placeholder="Catatan tambahan..."></textarea>
                            </div>

                            <button type="submit" 
                                    class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-xl transition-colors flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                Checkout via WhatsApp
                            </button>
                        </form>

                        <p class="text-xs text-gray-500 text-center mt-4">
                            Pesanan akan dikirim ke WhatsApp kami untuk konfirmasi lebih lanjut
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    const csrfToken = '{{ csrf_token() }}';

    function updateQuantity(cartId, quantity) {
        if (quantity < 1) {
            removeItem(cartId);
            return;
        }

        fetch(`/keranjang/update/${cartId}`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ quantity: parseInt(quantity) })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Reload page to update all values
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        });
    }

    function removeItem(cartId) {
        if (!confirm('Hapus produk ini dari keranjang?')) return;

        fetch(`/keranjang/hapus/${cartId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        });
    }

    // Update cart count in navbar
    function updateCartBadge() {
        fetch('/keranjang/count')
            .then(response => response.json())
            .then(data => {
                const badges = document.querySelectorAll('.cart-badge');
                badges.forEach(badge => {
                    badge.textContent = data.count;
                    if (data.count > 0) {
                        badge.classList.remove('hidden');
                    } else {
                        badge.classList.add('hidden');
                    }
                });
            });
    }
</script>
@endpush
@endsection
