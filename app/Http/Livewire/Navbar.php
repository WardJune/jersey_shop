<?php

namespace App\Http\Livewire;

use App\Liga;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $cart = 0;
    protected $listeners = ['updateKeranjang'];

    public function updateKeranjang()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if ($order) {
            $this->cart = OrderDetail::where('order_id', $order->id)->count();
        } else {
            $this->cart = 0;
        }
    }
    public function mount()
    {
        if (Auth::check()) {

            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($order) {
                $this->cart = OrderDetail::where('order_id', $order->id)->count();
            } else {
                $this->cart = 0;
            }
        }
    }

    public function render()
    {
        return view('livewire.navbar', [
            'ligas' => Liga::all(),
            'cart' => $this->cart
        ]);
    }
}
