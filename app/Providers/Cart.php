<?php

namespace App\Providers;

use Illuminate\Support\Collection;

class Cart
{
    protected $items;

    public function __construct()
    {
        $this->items = collect();
    }

    public function add($product_id, $name, $price, $quantity)
    {
        $item = $this->items->get($product_id);

        if ($item) {
            $item['quantity'] += $quantity;
        } else {
            $item = collect([
                'product_id' => $product_id,
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
            ]);

            $this->items->put($product_id, $item);
        }
    }

    public function update($product_id, $quantity)
    {
        $item = $this->items->get($product_id);

        if ($item) {
            $item['quantity'] = $quantity;
            $this->items->put($product_id, $item);
        }
    }

    public function remove($product_id)
    {
        $this->items->forget($product_id);
    }

    public function count()
    {
        return $this->items->count();
    }

    public function content()
    {
        return $this->items->values();
    }
}
