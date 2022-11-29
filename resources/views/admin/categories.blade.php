@extends('layouts.admin')


@section('content')

<div>
    <livewire:admin.category.index />
</div>

@endsection

@section('script')

<script>
    window.addEventListener('close-modal', event => {
        $('#deleteCategoryModal').modal('hide');
    })
</script>

@endsection