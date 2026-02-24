<?php

namespace App\Livewire\Customers;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class CustomerCrud extends Component
{
    public CustomerForm $form;

    public bool $isEdit = false;

    public function mount(?Customer $customer = null)
    {
        if ($customer && $customer->exists) {
            $this->isEdit = true;
            $this->form->setCustomer($customer);
        }
    }

    public function save()
    {
        try {
            $this->isEdit ? $this->form->update() : $this->form->store();

            session()->flash('notify', [
                'variant' => 'success',
                'title' => '¡Existoso!',
                'message' => $this->isEdit ? 'Cliente actualizado correctamente.' : 'Cliente guardado correctamente.',
            ]);

            return $this->redirect(route('customers.index'), navigate: true);

        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            session()->flash('notify', [
                'variant' => 'error',
                'title' => '¡Error!',
                'message' => 'No se pudo guardar: '.$e->getMessage(),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.customers.customer-crud');
    }
}
