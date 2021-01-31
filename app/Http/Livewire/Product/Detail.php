<?php

namespace App\Http\Livewire\Product;

use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $product, $number_set, $name_set;
    public $value = 1;

    public function check()
    {
        if ($this->value < 0) {
            $this->value = 1;
        }
    }

    public function increment()
    {
        return $this->value++;
    }
    public function decrement()
    {
        return $this->value--;
    }
    public function mount($id)
    {
        $detailProduct = Product::find($id);

        $this->product = $detailProduct;

        if ($detailProduct->is_ready == 0) {
            $this->value = 0;
        }
    }
    public function addToCart()
    {
        if ($this->value < 0) {
            $this->validate([
                'name_set' => ['required'],
                'number_set' => ['required'],
            ]);
        }

        if (Auth::guest()) {
            return redirect()->route('login');
        }

        if ($this->name_set) {
            $total = $this->value * $this->product->price + $this->product->namesetPrice;
        } else {
            $total = $this->value * $this->product->price;
        }

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (empty($order)) {
            Order::create([
                'user_id' => Auth::user()->id,
                'total' => $total,
                'status' => 0,
                'uniqueId' => mt_rand(100, 999)
            ]);

            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $order->orderId = 'JP' . $order->id;
            $order->update();
        } else {
            $order->total = $order->total + $total;
            $order->update();
        }

        OrderDetail::create([
            'jumlah_pesanan' => $this->value,
            'product_id' => $this->product->id,
            'order_id' => $order->id,
            'total' => $total,
            'name' => $this->name_set,
            'number' => $this->number_set,
            'nameset' => $this->name_set ? true : false,
        ]);

        session()->flash('success', 'Berhasil dimasukan ke Keranjang');

        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.product.detail');
    }
}
