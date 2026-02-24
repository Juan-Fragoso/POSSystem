<div>
    <flux:main>
        <div class="flex justify-end mb-4">
            <flux:button href="{{ route('customers.create') }}" wire:navigate variant="primary" color="zinc"
                icon="plus">
                Nuevo Cliente
            </flux:button>
        </div>
        <flux:separator variant="subtle" />
        <flux:table>
            <flux:table.columns>
                <flux:table.column>Folio</flux:table.column>
                <flux:table.column>Nombre Completo</flux:table.column>
                <flux:table.column>RFC</flux:table.column>
                <flux:table.column>Telefono</flux:table.column>
                <flux:table.column>Correo</flux:table.column>
                <flux:table.column>CP</flux:table.column>
                <flux:table.column>Accion</flux:table.column>
            </flux:table.columns>
            <flux:table.rows>
                @foreach ($customers as $customer)
                    <flux:table.row>
                        <flux:table.cell>{{ $customer->folio }}</flux:table.cell>
                        <flux:table.cell>{{ $customer->name }} {{ $customer->last_name }}</flux:table.cell>
                        <flux:table.cell>{{ $customer->rfc }}</flux:table.cell>
                        <flux:table.cell>{{ $customer->phone }}</flux:table.cell>
                        <flux:table.cell>{{ $customer->email }}</flux:table.cell>
                        <flux:table.cell>{{ $customer->fiscal_address_zip }}</flux:table.cell>
                        <flux:table.cell>
                            <flux:button variant="ghost" size="sm" icon="pencil-square" inset="top bottom"
                                :href="route('customers.edit', $customer->id)" wire:navigate />
                            <flux:button variant="ghost" size="sm" icon="trash" class="text-red-500"
                                wire:click="confirmDelete({{ $customer->id }})" />
                        </flux:table.cell>
                    </flux:table.row>
                @endforeach
            </flux:table.rows>
        </flux:table>
    </flux:main>

    <flux:modal name="delete-customer" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">¿Eliminar registro?</flux:heading>
                <flux:subheading>Estás a punto de eliminar este cliente. Esta acción no se puede deshacer.
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
    </flux:modal>

</div>
