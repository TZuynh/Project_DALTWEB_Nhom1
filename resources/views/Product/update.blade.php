@include('layouts.app')
@include('components.Menu.menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/bootstrap-5.2.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/tailwind.output.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <style>
        #sidebar {
            background-color: #f8f9fa;
            padding: 5px;
            min-height: 100vh;
        }
        main {
            background-color: #ffffff;
            padding: 30px;
            margin-left: 270px; /* Điều chỉnh khoảng cách từ sidebar */
        }
        .img-thumbnail {
            width: 100px;
            margin: 5px;
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
                <h1 class="h2">CẬP NHẬT</h1>
            </div>
            
            <form class="row g-3" method="POST" action="{{ route('product.start-update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="col-md-8">
                        <label for="name" class="form-label">Tên Sản Phẩm</label>
                        <input value="{{ $product->name }}" type="text" name="name" class="form-control" id="name">
                    </div>
                </div>
                
                @if ($productDetail)
                    <!-- Hiển thị lựa chọn Size và Màu nếu có Product Detail -->
                    <div class="row">
                        <div class="col-md-8">
                            <label for="size_id" class="form-label">Size sản phẩm</label>
                            <select name="size_id" class="form-select" id="size_id">
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}" {{ $productDetail->size_id == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="color_id" class="form-label">Màu sản phẩm</label>
                            <select name="color_id" class="form-select" id="color_id">
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}" {{ $productDetail->color_id == $color->id ? 'selected' : '' }}>{{ $color->color_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @else
                    <!-- Nếu không có Product Detail, cho phép chọn tất cả Size và Màu -->
                    <div class="row">
                        <div class="col-md-8">
                            <label for="size_id" class="form-label">Size sản phẩm</label>
                            <select name="size_id" class="form-select" id="size_id">
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="color_id" class="form-label">Màu sản phẩm</label>
                            <select name="color_id" class="form-select" id="color_id">
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-md-8">
                        <label for="selling_price" class="form-label">Giá Bán</label>
                        <input value="{{ $product->price }}" type="text" name="price" class="form-control" id="price">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-8">
                        <label for="category" class="form-label">Loại sản phẩm</label>
                        <select name="category_id" class="form-select" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-8">
                        <label for="images" class="form-label">Hình ảnh</label>
                        <input type="file" name="images[]" class="form-control" id="images" multiple onchange="previewImages(event)">
                    </div>
                </div>
                <div class="row">
    <div class="col-md-8">
        <label for="quality" class="form-label">Số lượng</label>
        <input type="number" name="quality" class="form-control" id="quality" value="{{ $productDetail ? $productDetail->quality : '' }}" min="1">
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <label for="description" class="form-label">Mô tả số lượng</label>
        <textarea name="description" class="form-control" id="description">{{ $productDetail ? $productDetail->description : '' }}</textarea>
    </div>
</div>

                <!-- Hiển thị ảnh đã có nếu có -->
                <div id="image-preview" class="mt-3">
                    @if (isset($productDetail) && $productDetail->images->count() > 0)
                        @foreach ($productDetail->images as $image)
                            <img src="{{ asset('storage/img/add/' . $image->url) }}" class="img-thumbnail" alt="Hình ảnh sản phẩm">
                        @endforeach
                    @endif
                </div>

                <div class="row pt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>

<script>
    function previewImages(event) {
        var files = event.target.files;
        var preview = document.getElementById('image-preview');
        preview.innerHTML = '';  // Xóa tất cả ảnh cũ khi chọn ảnh mới

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-thumbnail';
                img.style = 'width: 100px; margin: 5px;';
                preview.appendChild(img);
            }

            reader.readAsDataURL(file);
        }
    }
</script>
</body>
</html>
