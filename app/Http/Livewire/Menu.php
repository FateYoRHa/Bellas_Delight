<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
class Menu extends Component
{
    public $byCategory = null;
    public $orderBy = 'productName';
    public $sortBy = 'asc';
    public $search;
    public $perPage = 5;
    public function render()
    {
        $categories = array(
            'Bread',
            'Cookie',
            'Dessert',
            'Muffin',
            'Pizza',
            'Snack Cakes',
            'Sweet Goods',
            'Tortilla'
        );
        //$products = DB::table('products')->paginate(4);
        $menu = Product::when($this->byCategory, function($query){
            $query->where('category', $this->byCategory);
        })
        ->search(trim($this->search))
        ->orderBy($this->orderBy, $this->sortBy)
        ->paginate($this->perPage);
        return view('livewire.menu', compact('menu'))->with('categories', $categories);
    }
}
