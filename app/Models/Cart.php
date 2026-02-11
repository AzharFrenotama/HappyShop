<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'product_id',
        'quantity',
    ];

    /**
     * Get the product in this cart item
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get cart items for the current session
     */
    public static function getSessionCart()
    {
        return static::where('session_id', session()->getId())
            ->with('product')
            ->get();
    }

    /**
     * Get total items count in cart
     */
    public static function getCartCount()
    {
        return static::where('session_id', session()->getId())
            ->sum('quantity');
    }

    /**
     * Get cart total price
     */
    public static function getCartTotal()
    {
        $cart = static::where('session_id', session()->getId())
            ->with('product')
            ->get();

        return $cart->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    }
}
