<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

use App\Livewire\Forms\Admin\ProductForm;
use App\Enums\ProductStatus;

#[Title("Create new product")]
#[Layout("layouts.app")]
class CreateProduct extends Component
{

    public $title = 'New Product';
    public ProductForm $form;

    public $productStatus;

    public function mount()
    {
        $this->productStatus = ProductStatus::cases();
    }

    public function save()
    {
        // store
        $this->form->store();
        return $this->redirect('/admin/products');
    }
    public function render()
    {
        return view('livewire.admin.products.create-product');
    }
}
