<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Form;

class CustomerForm extends Form
{
    public ?Customer $customer;

    public $folio, $name, $last_name, $legal_name, $rfc, $fiscal_address_zip, $tax_regime, $phone, $email, $address, $user_id;

    public function rules()
    {
        return [
            "name"=> "required|min:3",
            "last_name"=> "required|min:3",
            "phone"=> "required|numeric",
            "email"=> "required|string|email|max:255"
        ];
    }

    public function store()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            $nextId = (Customer::max('id') ?? 0) + 1;

            $this->folio = 'CL-' . str_pad($nextId, 5, '0', STR_PAD_LEFT);

            Customer::create($this->all());

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function update()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            $this->customer->update($this->all());

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        $this->fill($customer->only(["folio","name", "last_name", "legal_name", "rfc", "fiscal_address_zip", "tax_regime", "phone", "email", "address"]));
    }
}
