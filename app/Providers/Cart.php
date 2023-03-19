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

    public function add($id, $name, $price, $quantity)
    {
        $item = $this->items->get($id);

        if ($item) {
            $item['quantity'] += $quantity;
        } else {
            $item = collect([
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
            ]);

            $this->items->put($id, $item);
        }
    }
    public function update($id, $quantity)
    {
        $item = $this->items->get($id);

        if ($item) {
            $item['quantity'] = $quantity;
            $this->items->put($id, $item);
        }
    }
    public function remove($id)
    {
        $this->items->forget($id);
    }

    public function count()
    {
        return $this->items->count();
    }

    public function content()
    {
        return $this->items;
    }
}
