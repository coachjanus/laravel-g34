<?php

namespace App\Livewire\Forms\Admin;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Product;

use Illuminate\Support\Facades\Storage;


class ProductForm extends Form
{
    public ?Product $product;
 
    #[Validate('required|min:5')]
    public $name = '';

    #[Validate('required')]
    public $price = 0;

    #[Validate('required')]
    public $status = 0;
    
    #[Validate('required|min:5')]
    public $description = '';

    #[Validate('required')]
    public $brand_id;

    #[Validate('required')]
    public $category_id;

    public $cover;
    public $oldCover;

    public function setProduct(Product $product)
    {
        $this->product = $product;

        $this->name = $product->name; 
        $this->price = $product->price; 
        $this->status = $product->status; 
        $this->description = $product->description; 
        $this->brand_id = $product->brand_id; 
        $this->category_id = $product->category_id; 
        $this->oldCover = $product->cover;
    }


    public function store()
    {
        $this->validate();
        $this->cover = $this->cover->store('products', 'public');
        Product::create($this->all());
    }

    public function update()
    {
        $this->validate();
        if ($this->cover) {
            if ($this->oldCover != null && Storage::disk('public')->exists($this->oldCover)) {
                Storage::disk('public')->delete($this->oldCover);
            }
            $this->cover = $this->cover->store('products', 'public');
        } else {
            $this->cover = $this->oldCover;
        }
        $this->product->update($this->all());

    }

}
