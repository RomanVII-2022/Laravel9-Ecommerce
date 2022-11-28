@extends('layouts.admin')


@section('content')

<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-10">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit Category Form</h6>
                <form method="POST" action="{{ url('admin/category/'.$category->id.'/edit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description">{{ $category->description }}</textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input class="form-control bg-dark" name="image" type="file">
                        <img src="{{ asset('uploads/category/'.$category->image) }}" width="50px" height="50px" />
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
                        @error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Keyword</label>
                        <input type="text" name="meta_keyword" value="{{ $category->meta_keyword }}" class="form-control">
                        @error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea class="form-control" name="meta_description">{{ $category->meta_description }}"</textarea>
                        @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input"{{ $category->status == '1' ? 'checked':'' }} >
                        <label class="form-check-label">Status</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection