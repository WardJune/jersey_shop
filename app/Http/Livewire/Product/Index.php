<?php

namespace App\Http\Livewire\Product;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $keyword;
    protected $updatesQueryString = ['keyword'];

    public function updatingKeyword()
    {
        return $this->resetPage();
    }

    public function render()
    {
        return view('livewire.product.index', [
            'products' => $this->keyword ? Product::where('name', 'like', "%$this->keyword%")->latest()->paginate(8) : Product::latest()->paginate(8),
            'title' => 'List All Jersey'
        ]);
    }
}
