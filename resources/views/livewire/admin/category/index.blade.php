<div>
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            @if (session('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
            @endif
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Categories</h6>
                <input type="search" wire:model="search" style="width: 230px; padding-left: 2mm;" placeholder="Search..." />
                <a href="{{ route('addcategory') }}">Add Category</a>
            </div>
            <div class="table-responsive">

                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->status == '1' ? 'Hidden':'Visible' }}</td>
                            <td><a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-success">Update</a> - 
                                <a href="" wire:click="deleteCategoryBtn({{ $category->id }})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Delete</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No Data Available</td>
                        </tr>
                        @endforelse
                        
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="deleteCategoryModalLabel">Delete Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p class="text-danger">Are you sure you want to delete this category?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form wire:submit.prevent="deleteCategory" method="POST">
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
