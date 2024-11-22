@include('layouts.app')
@include('components.Menu.menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/bootstrap-5.2.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/tailwind.output.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <style>
        #sidebar {
            background-color: #f8f9fa;
            padding: 1px;
            min-height: 100vh;
        }
        main {
            background-color: #ffffff;
            padding:0px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            @include('components.Menu.menu')
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">THÊM SẢN PHẨM MỚI</h1>
            </div>
            
            <div class="form-container">
                <form class="row g-3" method="POST" action="{{ route('product.start-add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <!-- Tên sản phẩm -->
                        <div class="row">
                            <div class="col-md-8">
                                <label for="name" class="form-label">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                        </div>

                        <!-- Giá bán sản phẩm -->
                        <div class="row">
                            <div class="col-md-8">
                                <label for="price" class="form-label">Giá bán sản phẩm</label>
                                <input type="text" name="price" class="form-control" id="price">
                            </div>
                        </div>
                        <div class="row">
    <div class="col-md-8">
        <label for="quality" class="form-label">Số lượng muốn thêm</label>
        <input type="number" name="quality" class="form-control" id="quality" min="1" step="1" required>
    </div>
</div>

<!--                         
                        Giá nhập sản phẩm
                        <div class="row">
                            <div class="col-md-8">
                                <label for="selling_price" class="form-label">Giá Nhập Sản Phẩm</label>
                                <input type="text" name="selling_price" class="form-control" id="selling_price">
                            </div>
                        </div> -->

                        <!-- Hình ảnh sản phẩm -->
                        <!-- <div class="row">
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                    <label for="images" class="form-label">Thêm Hình Ảnh</label>
                                    <input type="file" name="images[]" multiple>
                                </div>
                            </div> -->
                        <!-- </div> -->

                        <!-- Loại sản phẩm -->
                        <div class="row">
                            <div class="col-md-8">
                                <label for="category_id" class="form-label">Loại sản phẩm</label>
                                <select name="category_id" class="form-select" id="category_id">
                                <option selected>Chọn loại sản phẩm</option>
                                       @foreach($dsLoaiSP as $loaiSP)
                                 <option value="{{ $loaiSP->id }}">{{ $loaiSP->name }}</option>
                                      @endforeach
                                </select>
                            </div>
                        </div>
                                <!-- Hình ảnh sản phẩm -->
        <div class="row">
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <label for="images" class="form-label">Thêm Hình Ảnh</label>
                    <input type="file" name="images[]" multiple>
                </div>
            </div>
        </div>
        <div class="row" id="image-preview" style="margin-top: 20px;"></div>

                        <!-- Nhà cung cấp -->
                        <!-- <div class="row">
                            <div class="col-md-8">
                                <label for="suppliers_id" class="form-label">Nhà cung cấp</label>
                                <select name="suppliers_id" class="form-select" id="suppliers_id">
                                    <option selected>Chọn nhà cung cấp</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div> -->

                        <!-- Size sản phẩm -->
                        <div class="row">
                            <div class="col-md-8">
                                <label for="size_id" class="form-label">Size sản phẩm</label>
                                <select name="size_id" class="form-select" id="size_id">
                                    <option selected>Chọn size sản phẩm</option>
                                    @foreach($dsSize as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Màu sản phẩm -->
                        <div class="row">
                            <div class="col-md-8">
                                <label for="color_id" class="form-label">Màu sản phẩm</label>
                                <select name="color_id" class="form-select" id="color_id">
                                    <option selected>Chọn màu sản phẩm</option>
                                    @foreach($dsMauSac as $mauSac)
                        <option value="{{ $mauSac->id }}">{{ $mauSac->color_name }}</option>
                           @endforeach                            
                                    </select>
                            </div>
                        </div>

                        <!-- Mô tả sản phẩm -->
                        <div class="row">
                            <div class="col-md-8">
                                <label for="description" class="form-label">Mô tả sản phẩm</label>
                                <input type="text" name="description" class="form-control" id="description">
                            </div>
                        </div>

                        <!-- Nút Lưu -->
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Thêm Mới</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer=""></script>
<script src="http://127.0.0.1:8000/assets/js/charts-lines.js"></script>
<script src="http://127.0.0.1:8000/assets/js/charts-pie.js"></script>
<script src="http://127.0.0.1:8000/assets/js/init-alpine.js"></script>
<script src="http://127.0.0.1:8000/assets/js/charts-bars.js"></script>
<script src="http://127.0.0.1:8000/assets/js/focus-trap.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer=""></script>
</body>
</html>
