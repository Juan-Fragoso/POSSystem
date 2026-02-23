<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    public ?Product $product;

    public $sku, $barcode, $name, $cost_price, $sale_price, $stock_qty, $min_stock_alert = 0, $tax_object, $fiscal_product_code, $fiscal_unit_code;

    public function rules()
    {
        return [
            'sku' => 'required|unique:products,sku,' . ($this->product->id ?? 'NULL'),
            'name' => 'required|min:3',
            'sale_price' => 'required|numeric|min:0',
            'cost_price' => 'numeric|min:0',
            'stock_qty' => 'required|numeric|min:0'
        ];
    }

    public function setProduct(Product $product)
    {
        $this->product = $product;
        $this->fill($product->only([
            'sku', 'barcode', 'name', 'cost_price', 'sale_price',
            'stock_qty', 'min_stock_alert', 'tax_object',
            'fiscal_product_code', 'fiscal_unit_code'
        ]));
    }

    public function store()
    {
        $this->validate();
        Product::create($this->all());
    }

    public function update()
    {
        $this->validate();
        $this->product->update($this->all());
    }
}
