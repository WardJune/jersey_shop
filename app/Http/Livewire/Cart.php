<?php

namespace App\Http\Livewire;

use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    protected $order;
    protected $orderDetails = [];

    public function destroy($id)
    {
        $order_Detail = OrderDetail::find($id);
        if (!empty($order_Detail)) {

            $orderr = Order::where('id', $order_Detail->order_id)->first();
            $orderCount = OrderDetail::where('order_id', $orderr->id)->count();
            if ($orderCount == 1) {
                $orderr->delete();
            } else {
                $orderr->total = $orderr->total - $order_Detail->total;
                $orderr->update();
            }

            $order_Detail->delete();

            $this->emit('updateKeranjang');

            session()->flash('success', 'Data berhasil dihapus dari keranjang');
        }
    }
    public function render()
    {
        if (Auth::check()) {
            $this->order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($this->order) {
                $this->orderDetails = OrderDetail::where('order_id', $this->order->id)->get();
            }
        }
        return view('livewire.cart', [
            'order' => $this->order,
            'orderDetails' => $this->orderDetails
        ]);
    }
}
