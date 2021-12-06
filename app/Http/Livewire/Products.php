<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class Products extends Component
{
    public $byCategory = null;
    public $orderBy = 'created_at';
    public $sortBy = 'desc';
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
        $products = Product::when($this->byCategory, function($query){
            $query->where('category', $this->byCategory);
        })
        ->search(trim($this->search))
        ->orderBy($this->orderBy, $this->sortBy)
        ->paginate($this->perPage);
        return view('livewire.products', compact('products'))->with('categories', $categories);
    }
}
