<div>
    <flux:main>
        <div class="flex justify-end mb-4">
            <flux:button href="{{ route('products.create') }}" wire:navigate variant="primary" color="zinc"
                icon="plus">
                Nuevo Producto
            </flux:button>
        </div>
        <flux:separator variant="subtle" />
        <flux:table>
            <flux:table.columns>
                <flux:table.column>SKU</flux:table.column>
                <flux:table.column>Codigo de Barras</flux:table.column>
                <flux:table.column>Nombre del producto</flux:table.column>
                <flux:table.column>Costo</flux:table.column>
                <flux:table.column>Precio</flux:table.column>
                <flux:table.column>Stock</flux:table.column>
                <flux:table.column>Alerta Stock Mín.</flux:table.column>
                <flux:table.column>Objeto Ipuesto</flux:table.column>
                <flux:table.column>Codigo Fiscal Producto</flux:table.column>
                <flux:table.column>Unidad Fiscal</flux:table.column>
                <flux:table.column>Accion</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @foreach ($products as $product)
                    <flux:table.row>
                        <flux:table.cell>{{ $product->sku }}</flux:table.cell>
                        <flux:table.cell>{{ $product->barcode }}</flux:table.cell>
                        <flux:table.cell>{{ $product->name }}</flux:table.cell>
                        <flux:table.cell>{{ $product->cost_price }}</flux:table.cell>
                        <flux:table.cell>{{ $product->sale_price }}</flux:table.cell>
                        <flux:table.cell>{{ $product->stock_qty }}</flux:table.cell>
                        <flux:table.cell>{{ $product->min_stock_alert }}</flux:table.cell>
                        <flux:table.cell>{{ $product->tax_object }}</flux:table.cell>
                        <flux:table.cell>{{ $product->fiscal_product_code }}</flux:table.cell>
                        <flux:table.cell>{{ $product->fiscal_unit_code }}</flux:table.cell>
                        <flux:table.cell>
                            <flux:button variant="ghost" size="sm" icon="pencil-square" inset="top bottom"
                                :href="route('products.edit', $product->id)" wire:navigate />
                            <flux:button variant="ghost" size="sm" icon="trash" class="text-red-500"
                                wire:click="confirmDelete({{ $product->id }})" />
                        </flux:table.cell>
                    </flux:table.row>
                @endforeach
            </flux:table.rows>
        </flux:table>
    </flux:main>

    <flux:modal name="delete-product" class="min-w-88">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">¿Eliminar registro?</flux:heading>
                <flux:subheading>Estás a punto de eliminar este producto. Esta acción no se puede deshacer.
                </flux:subheading>
            </div>

            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">Cancelar</flux:button>
                </flux:modal.close>

                <flux:button wire:click="delete" variant="danger">
                    Confirmar Eliminación
                </flux:button>
            </div>

        </div>
