<div>
    <flux:main>
        <div class="mb-6">
            <flux:heading size="xl">{{ $isEdit ? 'Editar Cliente' : 'Nuevo Cliente' }}</flux:heading>
            @if ($isEdit)
                <flux:subheading>
                    <flux:badge color="amber">{{ $form->folio }}</flux:badge>
                </flux:subheading>
            @endif
        </div>
        <flux:separator class="my-6" />

        <form wire:submit="save" class="space-y-8">
            @include('livewire.customers.form-fields')

            <div class="flex justify-end gap-3 pt-6">
                <flux:button :href="route('customers.index')" wire:navigate variant="ghost">Cancelar</flux:button>
                <flux:button type="submit" variant="primary" color="zinc" icon="check">
                    {{ $isEdit ? 'Actualizar' : 'Guardar' }}
                </flux:button>
            </div>
        </form>

    </flux:main>
</div>
