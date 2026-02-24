<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $search = '';

    public ?int $productIdBeingDeleted = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('code', 'like', '%'.$this->search.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.products.product-index', ['products' => $products]);
    }

    public function confirmDelete($id)
    {
        $this->productIdBeingDeleted = $id;

        $this->js('$flux.modal("delete-product").show()');
    }

    public function delete()
    {
        Product::findOrFail($this->productIdBeingDeleted)->delete();

        $this->js('$flux.modal("delete-product").close()');
        $this->productIdBeingDeleted = null;
    }
}
