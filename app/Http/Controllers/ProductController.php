<?php

namespace App\Http\Controllers;

use App\Events\StockEvent;
use App\Listeners\IncreaseStock;
use App\Models\Log;
use App\Models\Piece;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // urunleri model yardimiyla cekiyoruz select * from producst ile es deger
        $pieces = Piece::all(); // Urunlerin gereksinim duydugu parcalari cektik
        return view('product.index', compact('products', 'pieces')); //html templatimizi bastiriyoruz ekrana urunleri parametre gondererek
    }

    /**
     * Urunun stogunu azalttigim method
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(Product $product): RedirectResponse
    {
        // yeterli stoklari yoksa hata mesajiyla geri redirect ettik
        if ($product->stock === 0) {
            return back()->with('message', [
                'type' => 'danger',
                'text' => 'Ürün stoğu yetersiz'
            ]);
        }

        // if'e takilmadigina gore stogumuz yeteri kadar var

        $product->stock--; // ilgili urunun stogunu 1 azalttik
        $product->save(); // ve kaydettik

        // loglamamızı yaptık
        Log::create([
            'detail' => sprintf('<strong>%s (%d)</strong> adlı ürün stokdan 1 adet azaltılmıştır.', $product->name, $product->id)
        ]);

        // bir urun satildiginda parcalarinin da azalmasini tetikleyecek methodumuz
        StockEvent::dispatch($product);

        return back()->with('message', [
            'type' => 'success',
            'text' => 'Seçilen ürünün ve parcalarinin stoğu azaltıldı'
        ]);
    }
}
