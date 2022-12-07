<div>
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            @if (session('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
            @endif
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Brands</h6>
                <input type="search" wire:model="search" style="width: 230px; padding-left: 2mm;" placeholder="Search..." />
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBrandModal">
                    Add Brand
                </button>
            </div>
            <div class="table-responsive">

                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td>{{ $brand->status == '0' ? 'visible':'hidden' }}</td>
                            <td><button wire:click="editBrandBtn({{ $brand->id }})" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editBrandModal">
                                Update
                              </button> - 
                              <button wire:click="deleteBrandBtn({{ $brand->id }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteBrandModal">
                                Delete
                              </button></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No Data Available</td>
                        </tr>
                        @endforelse
                        
                    </tbody>
                </table>
                {{ $brands->links() }}
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

    <!-- Add Brand Modal -->
    <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="deleteCategoryModalLabel">Add Brand</h1>
                    <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addBrand" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" wire:model="slug" class="form-control">
                            @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" wire:model="status" class="form-check-input">
                            <label class="form-check-label">Status</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                    </form>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Brand Modal -->
    <div wire:ignore.self class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="editBrandModalLabel">Edit Brand</h1>
                    <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div wire:loading style="padding-left: 10%; padding-right: 10%">
                    <div class="d-flex align-items-center">
                        <strong>Loading...</strong>
                        <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                    </div>
                </div>
                <div wire:loading.remove class="modal-body">
                    <form wire:submit.prevent="editBrand" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" wire:model="slug" class="form-control">
                            @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" wire:model="status" class="form-check-input">
                            <label class="form-check-label">Status</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                    </form>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Brand Modal -->
    <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="deleteBrandModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="deleteBrandModalLabel">Delete Brand</h1>
                    <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div wire:loading style="padding-left: 10%; padding-right: 10%">
                    <div class="d-flex align-items-center">
                        <strong>Loading...</strong>
                        <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                    </div>
                </div>
                <div wire:loading.remove class="modal-body">
                    <form wire:submit.prevent="deleteBrand" method="POST">
                        <h5 class="text-danger">Are you sure you want to delete this brand?</h5>
                        <button type="submit" class="btn btn-primary">Delete Brand</button>
                    </form>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>



    @section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide')
        })
    </script>

    <script>
        window.addEventListener('close-modal', event => {
            $('#editBrandModal').modal('hide')
        })
    </script>

    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteBrandModal').modal('hide')
        })
    </script>
    @endsection
</div>
