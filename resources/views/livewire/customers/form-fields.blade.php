<section>
    <flux:heading variant="anchor">Identificación General</flux:heading>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <flux:input wire:model="form.name" label="Nombre" />
        <flux:input wire:model="form.last_name" label="Apellido" />
        <flux:input wire:model="form.email" label="Correo Electronico" placeholder="Y0a8I@example.com" />
        <flux:input wire:model="form.phone" label="Telefono" placeholder="9999999999" />
    </div>
</section>

<section class="mt-5 mbt-5 bg-zinc-50 dark:bg-white/5 p-4 rounded-xl">
    <flux:heading variant="anchor">Datos Fiscales</flux:heading>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <flux:input wire:model="form.legal_name" label="Nombre Legal" />
        <flux:input wire:model="form.rfc" label="RFC" placeholder="RFC123456789" class="md:col-span-1" />
        <flux:input wire:model="form.fiscal_address_zip" label="Codigo Postal" class="md:col-span-1" />
        <flux:input wire:model="form.address" label="Direccion" class="md:col-span-1" />
        <flux:input wire:model="form.tax_regime" label="Regimen Fiscal" placeholder="605" />
    </div>
</section>
