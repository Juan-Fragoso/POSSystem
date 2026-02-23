<?php

namespace App\Livewire\Products;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Livewire\Component;

class ProductCrud extends Component
{
    public ProductForm $form;
    public bool $isEdit = false;

    public function mount(?Product $product = null)
    {
        if($product && $product->exists) {
            $this->isEdit = true;
            $this->form->setProduct($product);
        }
    }

    public function save()
    {
        $this->isEdit ? $this->form->update() : $this->form->store();

        return $this->redirect(route('products.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.products.product-crud');
    }
}
