@include('layouts.app')
@include('components.Menu.menu')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="container">
                <h1>Danh Sách Danh Mục</h1>
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6">
                        <form id="search-form" action="{{ route('admin.categories.index') }}" method="GET">
                            <div class="position-relative">
                                <input 
                                    type="text" 
                                    id="search-input" 
                                    name="search" 
                                    class="form-control rounded-pill pe-5 border-0" 
                                    placeholder="Tìm kiếm danh mục..." 
                                    value="{{ request('search') }}"
                                    style="background-color: white;"
                                >
                                <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
                            </div>
                        </form>
                    </div>                   
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal" style="margin-bottom: 15px">
                            Tạo Mới Danh Mục
                        </button>
                    </div>
                </div>

                <table class="table mt-3 table-striped" id="category-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Danh Mục Cha</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $startIndex = ($categories->currentPage() - 1) * $categories->perPage();
                        @endphp
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $startIndex + $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->parent ? $category->parent->name : 'Không có' }}</td>
                            <td>
                                <button class="btn btn-warning" 
                                        data-id="{{ $category->id }}" 
                                        data-name="{{ $category->name }}" 
                                        data-parent-id="{{ $category->parent_categories_id }}" 
                                        onclick="openEditModal(this)">
                                    Sửa
                                </button>                            
                                <form id="delete-form-{{ $startIndex + $loop->iteration }}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="openDeleteModal(this)" data-id="{{ $category->id }}">
                                        Xóa
                                    </button>                                    
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form id="editCategoryForm" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editCategoryModalLabel">Chỉnh sửa danh mục</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="edit-category-name" class="form-label">Tên danh mục</label>
                                                <input type="text" class="form-control" id="edit-category-name" name="name" placeholder="Nhập tên danh mục">
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit-category-parent" class="form-label">Danh mục cha</label>
                                                <select class="form-select" id="edit-category-parent" name="parent_categories_id">
                                                    <option value="">Không có</option>
                                                    @foreach($allCategories as $parent)
                                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn" data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>                                                
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.categories.store') }}" method="POST" id="createCategoryForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Tạo Mới Danh Mục</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên Danh Mục</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="mb-3">
                        <label for="parent" class="form-label">Danh Mục Cha</label>
                        <select class="form-select" id="parent" name="parent_categories_id">
                            <option value="">Không có</option>
                            @foreach($allCategories as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Tạo</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($categories as $category)
    <div class="modal fade" id="deleteModal-{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $category->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel-{{ $category->id }}">Xác Nhận Xóa</h5>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa danh mục này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger" form="delete-form-{{ $category->id }}">Xóa</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    function openEditModal(button) {
        const categoryId = button.getAttribute('data-id');
        const categoryName = button.getAttribute('data-name');
        const parentCategoryId = button.getAttribute('data-parent-id');

        // Điền dữ liệu vào form
        document.getElementById('edit-category-name').value = categoryName;
        document.getElementById('edit-category-parent').value = parentCategoryId || '';

        // Cập nhật action của form
        const form = document.getElementById('editCategoryForm');
        form.action = `/admin/categories/${categoryId}`;

        // Hiển thị modal
        const modal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
        modal.show();
    }

    function openDeleteModal(button) {
        const categoryId = button.getAttribute('data-id');
        
        // Cập nhật action của form xóa
        const form = document.getElementById('delete-form-' + categoryId);
        const modalElement = document.getElementById('deleteModal-' + categoryId);
        
        // Khởi tạo modal xóa
        const modal = new bootstrap.Modal(modalElement, { backdrop: 'static', keyboard: false });
        modal.show();
    }
</script>
@if($errors->any())
    <script>
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    </script>
@endif

@if(session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif

@php
    $startIndex = ($categories->currentPage() - 1) * $categories->perPage();
@endphp



