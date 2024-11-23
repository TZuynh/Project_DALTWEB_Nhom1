@include('layouts.app')
@include('components.Menu.menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Chi Tiết Sản Phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/bootstrap-5.2.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/tailwind.output.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/button.css">
    <style>
        #sidebar {
            background-color: #f8f9fa;
            padding: 1px;
            min-height: 100vh;
        }
        main {
            background-color: #ffffff;
            padding: 0px;
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
                <h1 class="h2">THÊM CHI TIẾT SẢN PHẨM</h1>
            </div>
            
            <div class="form-container">
                <form class="row g-3" method="POST" action="{{ route('product-detail.store', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <!-- Tên sản phẩm -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-8">
                                <label class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" value="{{ $product->name }}" disabled>
                            </div>
                        </div>

                        <!-- Số lượng chi tiết -->
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <label for="quality" class="form-label">Số lượng chi tiết</label>
                                <input type="number" name="quality" class="form-control" id="quality" min="1" step="1" required>
                            </div>
                        </div>

                        <!-- Size -->
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <label for="size_id" class="form-label">Size</label>
                                <select name="size_id" class="form-select" id="size_id" required>
                                    <option selected>Chọn size</option>
                                    @foreach($dsSize as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Màu sắc -->
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <label for="color_id" class="form-label">Màu sắc</label>
                                <select name="color_id" class="form-select" id="color_id" required>
                                    <option selected>Chọn màu sắc</option>
                                    @foreach($dsColor as $mauSac)
                                        <option value="{{ $mauSac->id }}">{{ $mauSac->color_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Ảnh -->
                        <!-- <div class="row mt-3">
                            <div class="col-md-8">
                                <label for="image" class="form-label">Hình ảnh chi tiết</label>
                                <input type="file" name="image" class="form-control" id="image" required>
                            </div>
                        </div> -->

                        <!-- Nút Lưu -->
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Thêm Chi Tiết</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<script src="http://127.0.0.1:8000/assets/js/init-alpine.js"></script>
</body>
</html>
