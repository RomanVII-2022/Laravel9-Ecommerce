<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination; 

    protected $paginationTheme = 'bootstrap';

    public $search = ''; 

    public function render()
    {
        $categories = Category::orderBy('name')->where('name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.category.index', ['categories'=>$categories]);
    }
}
