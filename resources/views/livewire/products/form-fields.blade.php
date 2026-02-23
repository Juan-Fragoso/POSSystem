   <section>
       <flux:heading variant="anchor">Identificación General</flux:heading>
       <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
           <flux:input wire:model="form.sku" label="SKU (Interno)" placeholder="PROD-001" />
           <flux:input wire:model="form.barcode" label="Código de Barras" placeholder="750123456789" />
           <flux:input wire:model="form.name" label="Nombre de Producto" class="md:col-span-1" />
       </div>
   </section>

   <section class="mt-5">
       <flux:heading variant="anchor">Precios e Inventario</flux:heading>
       <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
           <flux:input wire:model="form.cost_price" type="number" step="0.01" label="Costo Compra"
               icon="banknotes" />
           <flux:input wire:model="form.sale_price" type="number" step="0.01" label="Precio Venta"
               icon="currency-dollar" />
           <flux:input wire:model="form.stock_qty" type="number" step="0.01" label="Stock Actual"
               icon="archive-box" />
           <flux:input wire:model="form.min_stock_alert" type="number" step="0.01" label="Alerta Stock Mín."
               icon="bell-alert" />
       </div>
   </section>

   <section class="bg-zinc-50 dark:bg-white/5 p-4 rounded-xl mt-5 mb-5">
       <flux:heading variant="anchor">Configuración Fiscal</flux:heading>
       <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
           <flux:select wire:model="form.tax_object" label="Objeto de Impuesto">
               <option value="01">No objeto de impuesto</option>
               <option value="02">Sí objeto de impuesto</option>
               <option value="03">Sí objeto de impuesto y no obligado al desglose</option>
           </flux:select>

           <flux:input wire:model="form.fiscal_product_code" label="Clave Producto (Fiscal)"
               placeholder="Ej: 43231500" />
           <flux:input wire:model="form.fiscal_unit_code" label="Clave Unidad" placeholder="Ej: H87" />
       </div>
   </section>
