<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Livewire\Forms\Admin\ProductForm;
use App\Enums\ProductStatus;
use App\Models\Product;

#[Title("Edit product")]
#[Layout("layouts.app")]
class EditProduct extends Component
{
    public $title = 'Edit Product';
    public ProductForm $form;

    public $productStatus;


    public function mount(Product $product)
    {
        $this->productStatus = ProductStatus::cases();
        $this->form->setProduct($product);
    }

    public function save()
    {
        // update
        $this->form->update();
        return $this->redirect('/admin/products');
    }
    public function render()
    {
        return view('livewire.admin.products.edit-product');
    }
}
