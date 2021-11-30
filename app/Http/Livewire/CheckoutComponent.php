<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutComponent extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];
    public $cartItems = [];


    public function render()
    {
        $this->cartItems = \Cart::getContent()->toArray();
        return view('livewire.checkout-component');
    }

}
