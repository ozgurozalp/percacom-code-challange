<?php

namespace App\Listeners;

use App\Events\StockEvent;
use App\Models\Log;
use App\Models\Product;

class IncreaseStock
{
    /**
     * Handle the event.
     *
     * @param StockEvent $event
     * @return void
     */
    public function handle(StockEvent $event)
    {
        // stogu azalan ana urunun id'si
        foreach ($event->product->pieces as $piece) {
            // parçanın yeterli stoğu olup olmadığına bakıyoruz
            if ($piece->stock > 0) {
                $piece->stock--; // stoğu yeterliyse 1 adet azalttıp
                $piece->save(); // db'ye kayıt ettik

                // loglamamızı yaptık
                Log::create([
                    'detail' => sprintf('<strong>%s (%d)</strong> adlı ürünün satışından dolayı <strong>%s (%d)</strong> adlı parça stokdan 1 adet azaltılmıştır.', $event->product->name, $event->product->id, $piece->name, $piece->id)
                ]);
            }
        }
    }
}
