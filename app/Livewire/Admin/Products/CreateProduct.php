<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

use App\Livewire\Forms\Admin\ProductForm;
use App\Enums\ProductStatus;

use App\Models\{Brand, Category};

use Livewire\WithFileUploads;

#[Title("Create new product")]
#[Layout("layouts.app")]
class CreateProduct extends Component
{

    use WithFileUploads;

    public $title = 'New Product';
    public ProductForm $form;

    public $productStatus;

    public $categories;
    public $brands;

    public function mount()
    {
        $this->productStatus = ProductStatus::cases();
        $this->categories = Category::pluck('name', 'id');
        $this->brands = Brand::pluck('name', 'id');
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
