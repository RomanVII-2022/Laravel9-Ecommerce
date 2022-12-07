<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name;
    public $slug;
    public $status;
    public $brandid;

    public $search = '';

    protected function rules()
    {
        return [
            'name' => 'required|min:6',
            'slug' => 'required|min:6',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function addBrand()
    {
        $validatedData = $this->validate();

        Brand::create([
            'name'=> $validatedData['name'],
            'slug'=> Str::slug($validatedData['slug']),
            'status'=> $this->status == true ? '1':'0',
        ]);
        session()->flash('message', 'Brand was added successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInput()
    {
        $this->name = '';
        $this->slug = '';
        $this->status = '';
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function editBrandBtn(int $brand_id)
    {
        $this->brandid = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }

    public function editBrand()
    {
        $validatedData = $this->validate();

        Brand::findOrFail($this->brandid)->update([
            'name'=> $validatedData['name'],
            'slug'=> Str::slug($validatedData['slug']),
            'status'=> $this->status == true ? '1':'0',
        ]);
        session()->flash('message', 'Brand was updated successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteBrandBtn(int $brand_id)
    {
        $this->brandid = $brand_id;
    }

    public function deleteBrand()
    {
        Brand::findOrFail($this->brandid)->delete();
        session()->flash('message', 'Brand was deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $brands = Brand::orderBy('name')->where('name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.brand.index', ['brands'=>$brands]);
    }
}
