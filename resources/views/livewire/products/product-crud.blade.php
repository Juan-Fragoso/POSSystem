<div>
    <flux:main>
        <div class="mb-6">
            <flux:heading size="xl">{{ $isEdit ? 'Editar Producto' : 'Nuevo Producto' }}</flux:heading>
        </div>

        <flux:separator class="my-6" />

        <form wire:submit="save" class="space-y-8">
            @include('livewire.products.form-fields')

            <div class="flex justify-end gap-3 pt-6">
                <flux:button :href="route('products.index')" wire:navigate variant="ghost">Cancelar</flux:button>
                <flux:button type="submit" variant="primary" color="zinc" icon="check">
                    {{ $isEdit ? 'Actualizar' : 'Guardar' }}
                </flux:button>
            </div>
        </form>
    </flux:main>
</div>
