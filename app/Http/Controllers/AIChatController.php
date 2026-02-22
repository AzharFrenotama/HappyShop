<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;

class AIChatController extends Controller
{
    /**
     * System prompt untuk AI Customer Service Happy Shop.
     */
    private function getSystemPrompt(): string
    {
        return <<<'PROMPT'
Kamu adalah Customer Service profesional Happy Shop — toko mainan anak terlengkap di Brebes, Indonesia.

IDENTITAS:
- Nama: CS Happy Shop
- Jangan pernah mengaku sebagai AI, asisten virtual, atau model bahasa
- Jika ditanya "apakah kamu AI?", jawab: "Saya tim Customer Service Happy Shop, siap membantu Anda! 😊"

GAYA KOMUNIKASI:
- Bahasa Indonesia yang formal namun friendly
- Jawaban singkat, jelas, dan to the point
- Gunakan emoji secukupnya untuk kesan ramah
- Sapa dengan "Kak" atau "Bunda/Ayah" jika konteksnya tentang anak

AREA KEAHLIAN (jawab dengan percaya diri):
1. Informasi produk mainan (stok, harga, detail, rekomendasi usia)
2. Cara pemesanan (via website atau WhatsApp ke 0852-0106-0671)
3. Pengiriman (tersedia ke seluruh Indonesia via ekspedisi terpercaya)
4. Kebijakan pengembalian (maks 3 hari setelah barang diterima, kondisi tertentu)
5. Garansi produk (tergantung produsen, info diberikan saat pembelian)
6. Jam operasional (Setiap Hari, 09:00 - 21:00 WIB)
7. Lokasi toko (Jl. KH. Ahmad Dahlan, Kabupaten Brebes, Indonesia)
8. Sertifikasi (semua produk bersertifikasi SNI)
9. Navigasi website Happy Shop

INFORMASI TOKO:
- Alamat: Jl. KH. Ahmad Dahlan, Kabupaten Brebes, Indonesia
- WhatsApp: 0852-0106-0671
- Email: brebeshappyshop@gmail.com
- Jam Buka: Setiap Hari 09:00 - 21:00 WIB
- Kategori: Boneka, Puzzle, Lego & Building Blocks, Mainan Edukatif, dll.

ATURAN:
- Jika pertanyaan di luar konteks toko mainan, arahkan kembali dengan sopan: "Mohon maaf, saya hanya bisa membantu seputar produk dan layanan Happy Shop ya 😊"
- Jangan memberikan informasi harga spesifik kecuali diminta, arahkan untuk cek halaman produk
- Untuk stok real-time, arahkan ke halaman produk atau hubungi WhatsApp
- Jangan pernah membahas kompetitor
- Selalu akhiri dengan tawaran bantuan lebih lanjut
PROMPT;
    }

    /**
     * Handle AI chat request.
     */
    public function chat(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'message' => 'required|string|max:500',
            'history' => 'nullable|array|max:20',
            'history.*.role' => 'required_with:history|string|in:user,assistant',
            'history.*.content' => 'required_with:history|string|max:2000',
        ]);

        // Rate limiting: 15 requests per menit per IP
        $key = 'ai-chat:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 15)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json([
                'success' => false,
                'message' => "Terlalu banyak permintaan. Silakan coba lagi dalam {$seconds} detik.",
            ], 429);
        }
        RateLimiter::hit($key, 60);

        try {
            $apiKey = config('services.groq.api_key');

            if (empty($apiKey)) {
                Log::error('Groq API key tidak dikonfigurasi');
                return response()->json([
                    'success' => false,
                    'message' => 'Layanan chat sedang tidak tersedia. Silakan hubungi kami via WhatsApp.',
                ], 503);
            }

            // Bangun messages array dengan conversation history
            $messages = [
                [
                    'role' => 'system',
                    'content' => $this->getSystemPrompt(),
                ]
            ];

            if (!empty($validated['history'])) {
                foreach ($validated['history'] as $msg) {
                    $messages[] = [
                        'role' => $msg['role'],
                        'content' => $msg['content'],
                    ];
                }
            }

            // Tambahkan pesan user terbaru
            $messages[] = [
                'role' => 'user',
                'content' => $validated['message'],
            ];

            // Call Groq API (OpenAI-compatible format)
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->timeout(30)->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => 'llama-3.3-70b-versatile', // Updated model (3.1 was decommissioned)
                'messages' => $messages,
                'max_tokens' => 1024,
                'temperature' => 0.7,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['choices'][0]['message']['content'] ?? 'Maaf, saya tidak bisa memproses permintaan Anda saat ini.';

                return response()->json([
                    'success' => true,
                    'reply' => $reply,
                ]);
            }

            Log::error('Groq API error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Maaf, layanan sedang sibuk. Silakan coba lagi atau hubungi kami via WhatsApp.',
            ], 500);

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('Groq API timeout', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Koneksi timeout. Silakan coba lagi.',
            ], 504);
        } catch (\Exception $e) {
            Log::error('AI Chat error', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan. Silakan hubungi kami via WhatsApp di 0852-0106-0671.',
            ], 500);
        }
    }
}
