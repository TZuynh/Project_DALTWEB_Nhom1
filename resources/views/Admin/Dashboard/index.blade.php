@include('layouts.app')
@include('components.Menu.menu')
<div class="content-page">
    <div class="content">
        <h4>Bảng Điều Khiển</h4>
        <!-- //filter by year and month -->
            <!-- start row -->
        <div class="container">
            <div class="container">
                <h4>Thống kê</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Tổng số khách hàng</h5>
                                <p class="card-text">{{ $totalCustomers }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Tổng số sản phẩm</h5>
                                <p class="card-text">{{ $totalProducts }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Tổng số đơn hàng</h5>
                                <p class="card-text">{{ $totalOrders }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Chỉnh sửa thông tin website</h4>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.dashboard.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="site_name">Tên website</label>
                    <input type="text" name="site_name" id="site_name" class="form-control"
                           value="{{ $settings['site_name'] ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="site_description">Mô tả website</label>
                    <textarea name="site_description" id="site_description" class="form-control">{{ $settings['site_description'] ?? '' }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </form>
        </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->
