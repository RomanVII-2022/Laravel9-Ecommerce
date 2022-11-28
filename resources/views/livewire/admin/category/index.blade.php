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
                            <td><a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-light">Update</a> - <a href="" class="btn btn-danger">Delete</a></td>
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
</div>
