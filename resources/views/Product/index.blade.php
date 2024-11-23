@include('layouts.app')
@include('components.Menu.menu')
<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Todo List</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active">Todo List</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div class="datatable-wrapper datatable-loading no-footer sortable fixed-height fixed-columns"><div class="datatable-top">
    
</div>


        <form action="{{ route('product.search') }}" method="GET">
           
        <div id="key-table_filter" class="dataTables_filter">
    <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="key-table"  aria-label="Search" name="keyword">

</label>

                </div>
                <div class="col-md-6 text-end">
    <a href="{{ route('product.add') }}" class="btn btn-primary" style="margin-bottom: 15px">
        Tạo Mới Sản Phẩm
    </a>
</div>
               
            </div>
        </form>

<div class="row">
                            <div class="col-md-12">
                                <div class="card overflow-hidden">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h5 class="card-title mb-0 text-black">Tasks</h5>
                                        </div>
                                    </div>

                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-traffic mb-0">

                                                <thead>
                                                    <tr>
                                                        <th>Ảnh Sản Phẩm</th>
                                                        <th>Tên Sản Phẩm </th>
                                                        <th>Loại Sản Phẩm</th>
                                                        <th>Giá Bán</th>
                                                        <th>Trạng thái</th>
                                                       <th>Mô tả</th>

                                                    </tr>
                                                </thead>
                                                @foreach($dsProducts as $product)

                                                <tbody  >

                                               

                                                    <td onclick="window.location.href = '{{ route('product.detail', ['id' => $product->id]) }}';">
                                                    @foreach ($product->images as $detail)
                                                        @if ($detail)
                                                            <img src="{{ asset('img/add/' . $detail->url) }}" alt="Hình ảnh sản phẩm" style="width: 100px; height: auto;">
                                                        @else
                                                            <span>Không có hình ảnh</span>
                                                        @endif
                                                    @endforeach

                                                    </td>
                                                    <td class="text-nowrap text-reset" onclick="window.location.href = '{{ route('product.detail', ['id' => $product->id]) }}';">
                                                        <i data-feather="calendar" style="height: 18px; width: 18px;" class="me-1"></i> {{ $product->name }}                                                    </td>
                                                    <td onclick="window.location.href = '{{ route('product.detail', ['id' => $product->id]) }}';">
                                                        <a href="#" class="text-reset">
                                                            <i data-feather="check" style="height: 18px; width: 18px;" class="me-1"></i>
                                                            {{ $product->category->name }}
                                                        </a>
                                                    </td>
                                                    <td class="text-nowrap text-reset" onclick="window.location.href = '{{ route('product.detail', ['id' => $product->id]) }}';">
                                                        <i data-feather="calendar" style="height: 18px; width: 18px;" class="me-1"></i>
                                                        {{ $product->price }}

                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-reset" onclick="window.location.href = '{{ route('product.detail', ['id' => $product->id]) }}';">
                                                            <i data-feather="folder" style="height: 18px; width: 18px;" class="me-1"></i>
                                                            @if($product->productDetails->sum('quality') > 0)
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            Còn hàng
                        </span>
                        @else
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                            Hết hàng
                        </span>
                        @endif
                                                        </a>
                                                    </td>
                                                    <td onclick="window.location.href = '{{ route('product.detail', ['id' => $product->id]) }}';">
                                                    {{ $product->description }}<td class="text-end">
                                                            <a aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                            </a>

      <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirmDelete(event);" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete">
        <i class="mdi mdi-delete fs-14 text-danger"></i>
    </button>
</form>

<script>
    function confirmDelete(event) {
        // Ngừng hành động mặc định của form (submit)
        event.preventDefault();
        
        // Hiển thị hộp thoại xác nhận
        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
            // Nếu người dùng xác nhận, thì mới cho phép submit
            event.target.submit();  // Gửi form đi
        }
        // Nếu người dùng không xác nhận, sẽ không có hành động gì xảy ra
    }
</script>


                                                @endforeach

                                               
                                                </table>
                                            </tbody>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="row">
   <div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="scroll-horizontal-datatable_info" role="status" aria-live="polite">
            Hiển thị {{ $dsProducts->firstItem() }} đến {{ $dsProducts->lastItem() }} trong số {{ $dsProducts->total() }} mục
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="scroll-horizontal-datatable_paginate">
            <ul class="pagination">
                <!-- Nút trước -->
                <li class="paginate_button page-item {{ $dsProducts->onFirstPage() ? 'disabled' : '' }}">
                    <a href="{{ $dsProducts->previousPageUrl() }}" class="page-link">Trước</a>
                </li>

                <!-- Liệt kê các trang -->
                @for ($i = 1; $i <= $dsProducts->lastPage(); $i++)
                    <li class="paginate_button page-item {{ $i == $dsProducts->currentPage() ? 'active' : '' }}">
                        <a href="{{ $dsProducts->url($i) }}" class="page-link">{{ $i }}</a>
                    </li>
                @endfor

                <!-- Nút kế tiếp -->
                <li class="paginate_button page-item {{ $dsProducts->hasMorePages() ? '' : 'disabled' }}">
                    <a href="{{ $dsProducts->nextPageUrl() }}" class="page-link">Kế tiếp</a>
                </li>
            </ul>
        </div>
    </div>
</div>



                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col fs-13 text-muted text-center">
                                © <script>document.write(new Date().getFullYear())</script>2024 - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">Zoyothemes</a> 
                            </div>
                        </div>
                    </div>
                </footer>
                
                <!-- end Footer -->

            </div>