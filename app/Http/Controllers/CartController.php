<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display cart page
     */
    public function index()
    {
        $cartItems = Cart::getSessionCart();
        $cartTotal = Cart::getCartTotal();

        return view('cart.index', compact('cartItems', 'cartTotal'));
    }

    /**
     * Add product to cart
     */
    public function add(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);

        // Check if product already in cart
        $cartItem = Cart::where('session_id', session()->getId())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Update quantity if already exists
            $newQuantity = $cartItem->quantity + $quantity;
            
            // Check stock availability
            if ($newQuantity > $product->stock) {
                return response()->json([
                    'success' => false,
                    'message' => 'Stok tidak mencukupi! Stok tersedia: ' . $product->stock
                ], 400);
            }

            $cartItem->update(['quantity' => $newQuantity]);
        } else {
            // Check stock availability
            if ($quantity > $product->stock) {
                return response()->json([
                    'success' => false,
                    'message' => 'Stok tidak mencukupi! Stok tersedia: ' . $product->stock
                ], 400);
            }

            // Create new cart item
            Cart::create([
                'session_id' => session()->getId(),
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang!',
            'cartCount' => Cart::getCartCount()
        ]);
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request, $id)
    {
        $quantity = $request->input('quantity', 1);

        // Find cart item for current session
        $cart = Cart::where('id', $id)
            ->where('session_id', session()->getId())
            ->first();

        if (!$cart) {
            return response()->json(['success' => false, 'message' => 'Item tidak ditemukan'], 404);
        }

        // Check stock availability
        if ($quantity > $cart->product->stock) {
            return response()->json([
                'success' => false,
                'message' => 'Stok tidak mencukupi! Stok tersedia: ' . $cart->product->stock
            ], 400);
        }

        if ($quantity <= 0) {
            $cart->delete();
        } else {
            $cart->update(['quantity' => $quantity]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Keranjang berhasil diperbarui!',
            'cartCount' => Cart::getCartCount(),
            'cartTotal' => 'Rp ' . number_format(Cart::getCartTotal(), 0, ',', '.')
        ]);
    }

    /**
     * Remove item from cart
     */
    public function remove($id)
    {
        // Find cart item for current session
        $cart = Cart::where('id', $id)
            ->where('session_id', session()->getId())
            ->first();

        if (!$cart) {
            return response()->json(['success' => false, 'message' => 'Item tidak ditemukan atau sudah dihapus'], 404);
        }

        $cart->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus dari keranjang!',
            'cartCount' => Cart::getCartCount(),
            'cartTotal' => 'Rp ' . number_format(Cart::getCartTotal(), 0, ',', '.')
        ]);
    }

    /**
     * Checkout via WhatsApp
     */
    public function checkout(Request $request)
    {
        $cartItems = Cart::getSessionCart();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong!');
        }

        // Build WhatsApp message
        $message = "Halo Happy Shop! 🧸\n\n";
        $message .= "Saya ingin memesan:\n\n";

        $total = 0;
        foreach ($cartItems as $index => $item) {
            $subtotal = $item->product->price * $item->quantity;
            $total += $subtotal;
            $message .= ($index + 1) . ". " . $item->product->name . "\n";
            $message .= "   Jumlah: " . $item->quantity . " pcs\n";
            $message .= "   Harga: Rp " . number_format($item->product->price, 0, ',', '.') . "\n";
            $message .= "   Subtotal: Rp " . number_format($subtotal, 0, ',', '.') . "\n\n";
        }

        $message .= "─────────────────\n";
        $message .= "Total: Rp " . number_format($total, 0, ',', '.') . "\n\n";

        // Add customer info if provided
        $name = $request->input('name', '');
        $address = $request->input('address', '');
        $notes = $request->input('notes', '');

        if ($name) {
            $message .= "Nama: " . $name . "\n";
        }
        if ($address) {
            $message .= "Alamat: " . $address . "\n";
        }
        if ($notes) {
            $message .= "Catatan: " . $notes . "\n";
        }

        $message .= "\nTerima kasih! 🎉";

        // WhatsApp number (ganti dengan nomor toko)
        $whatsappNumber = "6285201060671";
        $whatsappUrl = "https://wa.me/" . $whatsappNumber . "?text=" . urlencode($message);

        // Clear cart after checkout
        Cart::where('session_id', session()->getId())->delete();

        return redirect()->away($whatsappUrl);
    }

    /**
     * Get cart count for AJAX
     */
    public function count()
    {
        return response()->json([
            'count' => Cart::getCartCount()
        ]);
    }
}
