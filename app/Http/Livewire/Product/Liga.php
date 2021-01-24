<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithPagination;

class Liga extends Component
{
    use WithPagination;

    public $keyword, $liga;
    protected $updatesQueryString = ['keyword'];

    public function updatingKeyword()
    {
        return $this->resetPage();
    }
    public function mount($slug)
    {
        $liga = \App\Liga::where('slug', $slug)->first();
        $this->liga = $liga;
    }
    public function render()
    {
        if ($this->keyword) {
            $product = $this->liga->products()->where('name', 'like', "%$this->keyword%")->latest()->paginate(8);
        } else {
            $product = $this->liga->products()->latest()->paginate(8);
        }
        return view('livewire.product.index', [
            'products' => $product,
            'title' => "Jersey " . $this->liga->name
        ]);
    }
}
