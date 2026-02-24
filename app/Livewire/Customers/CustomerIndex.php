<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;

class CustomerIndex extends Component
{
    public $customerIdBeingDeleted = null;

    public function render()
    {
        $customers = Customer::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.customers.customer-index', ['customers' => $customers]);
    }

    public function confirmDelete($id)
    {
        $this->customerIdBeingDeleted = $id;

        $this->js('$flux.modal("delete-customer").show()');
    }

    public function delete()
    {
        try {
            Customer::findOrFail($this->customerIdBeingDeleted)->delete();
            $this->js('$flux.modal("delete-customer").close()');

            $this->dispatch('notify',
                variant: 'success',
                title: '¡Exitoso!',
                message: 'Cliente eliminado correctamente.'
            );

        } catch (\Exception $e) {
            $this->dispatch('notify',
                variant: 'error',
                title: '¡Error!',
                message: 'No se pudo eliminar: '.$e->getMessage()
            );
            throw $e;
        }

        $this->customerIdBeingDeleted = null;
    }
}
