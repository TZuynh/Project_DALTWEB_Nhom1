@include('layouts.app')
@include('components.Menu.menu')

<div class="content-page">
    <div class="content m-3">
        <h4>Quản lý bình luận</h4>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="text-center h-50">
                                <tr>
                                    <th scope="col">Stt</th>
                                    <th scope="col">Khách hàng</th>
                                    <th scope="col">Chi tiết đánh giá</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $key => $comment)
                                <tr>
                                    <th class="align-middle text-center">{{ $key + 1 }}</th>
                                    <td class="align-middle address-column">
                                        <ul class="m-0">
                                            <li><strong>Tài khoản:</strong> {{ $comment->user->username }}</li>
                                            <li><strong>Tên khách hàng:</strong> {{ $comment->user->fullname }}</li>
                                            <li><strong>Số điện thoại:</strong>
                                                {{ $comment->user->shippingAddress->receiver_phone ?? 'N/A' }}
                                            </li>
                                        </ul>
                                    </td>

                                    <td class="align-middle address-column">
                                        <ul class="m-0">
                                            <img class="custom-img"
                                                src="{{ asset('assets/images/sp/' . $comment->productDetail->productImages) }}"
                                                alt="Hình ảnh sản phẩm" width="100">
                                            <li><strong>Tên sản phẩm:</strong>
                                                {{ $comment->productDetail->product->name ?? 'N/A' }}
                                            </li>
                                            <li><strong>Size:</strong>
                                                {{ $comment->productDetail->size->name ?? 'N/A' }}
                                            </li>
                                            <li><strong>Màu:</strong>
                                                {{ $comment->productDetail->color->color_name ?? 'N/A' }}
                                            </li>
                                            <li><strong>Đánh giá:</strong>
                                                @for ($i = 1; $i <= 5; $i++) <span
                                                    class="mdi mdi-star {{ $i <= $comment->star_rate ? 'coloryellow' : '' }}">
                                                    </span>
                                                    @endfor
                                            </li>

                                            <li><strong>Bình luận:</strong> {{ $comment->content }}</li>
                                        </ul>
                                    </td>

                                    <td class="align-middle text-center">
                                        @if($comment->status == 0 )
                                        <div class="status" ">
                                            Chờ duyệt
                                        </div>
                                        @elseif($comment->status == 1)
                                        <div class=" status4" ">
                                            Đã duyệt
                                        </div>
                                        @endif
                                    </td>

                                    <td class=" align-middle text-center">
                                            @if($comment->is_hide == 0 )
                                            <div class="status" ">
                                            InActive
                                        </div>
                                        @elseif($comment->is_hide == 1)
                                        <div class=" status4" ">
                                        Active
                                        </div>
                                        @endif
                                    </td>
                                    <td class=" align-middle">
                                                <ul class="list-unstyled m-0 box-custom">
                                                    <li class="border w-auto p-2 mb-2 text-left pointer custom "
                                                        data-id="{{ $comment->id }}">
                                                        <span class="mdi mdi-alert-circle"></span>
                                                        Duyệt đơn
                                                    </li>
                                                    <li class="border w-auto p-2 mb-2 text-left pointer custom2"
                                                        data-id="{{ $comment->id }}">
                                                        <span class=" mdi mdi-clock-edit"></span>
                                                        Ẩn bình luận
                                                    </li>
                                                    <!-- <li class="border w-auto p-2 text-left pointer custom3"
                                                        data-id="{{ $comment->id }}">
                                                        <span class="mdi mdi-delete-forever"></span>
                                                        Xóa
                                                    </li> -->
                                                </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).on('click', '.custom[data-id]', function() {
    var commentId = $(this).data('id');

    $.ajax({
        url: 'comments/approve/' + commentId,
        type: 'post',
        data: {
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            if (response.success) {
                window.location.reload();
                // alert(response.message); // Optionally, show a success message
            } else {
                alert(response.message); // Show error message if any
            }
        },
        error: function(xhr, status, error) {
            alert('Có lỗi xảy ra. Vui lòng thử lại.');
        }
    });
});
</script>

<script>
$(document).on('click', '.custom2[data-id]', function() {
    var commentId = $(this).data('id');

    $.ajax({
        url: 'comments/update/' + commentId,
        type: 'post',
        data: {
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            if (response.success) {
                window.location.reload();
                // alert(response.message); // Optionally, show a success message
            } else {
                alert(response.message); // Show error message if any
            }
        },
        error: function(xhr, status, error) {
            alert('Có lỗi xảy ra. Vui lòng thử lại.');
        }
    });
});
</script>

<!-- <script>
    $(document).on('click', '.custom3[data-id]', function() {
        var commentId = $(this).data('id');

        $.ajax({
            url: 'comments/delete/' + commentId,
            type: 'post',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                if (response.success) {
                    window.location.reload();
                    // alert(response.message); // Optionally, show a success message
                } else {
                    alert(response.message); // Show error message if any
                }
            },
            error: function(xhr, status, error) {
                alert('Có lỗi xảy ra. Vui lòng thử lại.');
            }
        });
    });
</script> -->
