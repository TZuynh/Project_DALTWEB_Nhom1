@include('layouts.app')
@include('components.Menu.menu')
<div class="content-page">
    <div class="content m-3">
        <h4>Quản lý đơn hàng</h4>
        <div class="col-xl-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="text-center h-50">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Thông tin đơn hàng</th>
                                    <th scope="col">Thông tin đặt hàng</th>
                                    <th class="custom-col1 scope=" col">Tổng thanh toán</th>
                                    <th class="custom-col2" scope="col">Trạng thái đơn hàng</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <th class="text-center align-middle" scope="row">1</th>

                                    <td class="align-middle wrap">
                                        <ul class="m-0">
                                            <li><strong>Đơn hàng:</strong> #{{ $order->id }}</li>
                                            <li><strong>Ngày tạo:</strong> {{ $order->created_at->format('d/m/Y') }}
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="align-middle address-column">
                                        <ul class="m-0">
                                            <li><strong>Khách hàng:</strong>
                                                {{ $order->shippingAddress->receiver_name }}
                                            </li>
                                            <li><strong>Số điện thoại:</strong>
                                                {{ $order->shippingAddress->receiver_phone }}
                                            </li>
                                            <li><strong>Địa chỉ:</strong>{{ $order->shippingAddress->address }},
                                                {{ $order->shippingAddress->ward }},
                                                {{ $order->shippingAddress->district }},
                                                {{ $order->shippingAddress->city }}
                                            </li>
                                            <li><strong>Hình thức thanh toán:</strong>
                                                {{ $order->payment->paymentMethod->name ?? 'Không xác định' }}
                                            </li>
                                            <li><strong>Trạng thái thanh toán:</strong>
                                                {{ $order->payment->paymentMethod->id != 4 ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                                            </li>
                                        </ul>
                                    </td>
                                    <td class=" text-center align-middle">
                                        <strong>{{ number_format($order->total_order_value, 0, ',', '.') }} VNĐ</strong>

                                    </td>
                                    <td class="text-center align-middle">
                                        @if($order->shipment_status_id == 1)
                                        <div class="status" data-order-id="{{ $order->id }}">
                                            {{$order->shipmentStatus->status_name}}
                                        </div>
                                        @elseif($order->shipment_status_id == 2)
                                        <div class="status2" data-order-id="{{ $order->id }}">
                                            {{$order->shipmentStatus->status_name}}
                                        </div>
                                        @elseif($order->shipment_status_id == 3)
                                        <div class="status3" data-order-id="{{ $order->id }}">
                                            {{$order->shipmentStatus->status_name}}
                                        </div>
                                        @elseif($order->shipment_status_id == 4)
                                        <div class="status4" data-order-id="{{ $order->id }}">
                                            {{$order->shipmentStatus->status_name}}
                                        </div>
                                        @elseif($order->shipment_status_id == 5)
                                        <div class="status5" data-order-id="{{ $order->id }}">
                                            {{$order->shipmentStatus->status_name}}
                                        </div>
                                        @endif
                                    </td>

                                    <td class="align-middle">
                                        <ul class="list-unstyled  m-0 box-custom">
                                            <li class="border w-auto p-2 mb-2 text-left pointer custom"
                                                data-bs-toggle="modal" data-bs-target="#orderDetailModal"
                                                data-order-id="{{ $order->id }}" data-order-details="{{ $orderdetails}}"
                                                data-total-product-value="{{ $order->total_product_value }}"
                                                data-delivery-charge="{{ $order->delivery_change }}"
                                                data-discount-id="{{ $order->voucher_id  }}"
                                                data-discount="{{ $order->voucher->money_discount }}"
                                                data-total-order-value="{{ $order->total_order_value }}">
                                                <span class="mdi mdi-alert-circle"></span>
                                                Chi tiết đơn hàng
                                            </li>
                                            <li class="border w-auto p-2 mb-2 text-left pointer custom2"
                                                data-bs-toggle="modal" data-bs-target="#updataStatus"
                                                data-order-id="{{ $order->id }}"
                                                data-current-status="{{ $order->shipmentStatus->id }}">
                                                <span class="mdi mdi-clock-edit" </span>
                                                    Trạng thái
                                            </li>
                                            <!-- <li class="border w-auto p-2 text-left pointer custom3">
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

                <div class="modal fade" id="updataStatus" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="updataStatusLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-3" id="updataStatusLabel">Cập nhật trạng thái đơn hàng</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <h5>Trạng thái đơn hàng</h5>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <!-- Select Dropdown without icon -->
                                    <div class="btn-group">
                                        <select class="form-select form-select-lg no-dropdown-icon colortext"
                                            aria-label="Select menu" id="statusSelect" data-order-id="">
                                            @foreach($shipmentStatus as $status)
                                            <option value="{{ $status->id }}" @if($status->id ==
                                                $order->shipmentStatus->id) selected @endif>
                                                {{ $status->status_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade bs-example-modal-xl" id="orderDetailModal" tabindex="-1"
                    aria-labelledby="orderDetailModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div>
                                <h1 class="text-center w-100 pt-3">
                                    <div class="icondetail">
                                        <span class="mdi mdi-alert-circle"></span>
                                    </div>
                                    <div>
                                        Chi tiết đơn hàng
                                    </div>
                                </h1>

                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead class="text-center h-50">
                                                <tr>
                                                    <th scope="col">Hình ảnh</th>
                                                    <th scope="col">Chi tiết sản phẩm</th>
                                                    <th scope="col">Giá bán</th>
                                                    <th scope="col">số lượng</th>
                                                    <th scope="col">Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody id="orderDetailsTableBody">

                                            </tbody>
                                        </table>
                                        </ div>
                                    </div>
                                </div>
                                <div class=" text-center">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const orderDetailModal = document.getElementById('orderDetailModal');

        orderDetailModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget; // Nút được nhấn để mở modal
            const orderId = button.getAttribute('data-order-id'); // Lấy id đơn hàng
            const orderDetails = JSON.parse(button.getAttribute(
                'data-order-details')); // Lấy danh sách sản phẩm
            const filteredDetails = orderDetails.filter(detail => detail.order_id ==
                orderId); // Lọc theo order_id

            const totalProductValue = parseInt(button.getAttribute('data-total-product-value'));
            const deliveryCharge = parseInt(button.getAttribute('data-delivery-charge'));
            const discountid = parseInt(button.getAttribute('data-discount-id'));
            let discount = 0; // Mặc định là không giảm giá

            // Áp dụng giảm giá theo discountid
            if (discountid === 1) {
                discount = 0
            } else if (discountid === 2 && totalProductValue > 600000) {
                discount = totalProductValue * 0.1; // Giảm 10%
            } else if (discountid === 3) {
                discount = 50000; // Giảm 50,000 VNĐ
            } else if (discountid === 4) {
                discount = deliveryCharge; // Miễn phí vận chuyển
            }

            const totalOrderValue = totalProductValue + deliveryCharge - discount;

            // Tạo nội dung bảng chi tiết sản phẩm
            const tableBody = document.getElementById('orderDetailsTableBody');
            let html = '';

            filteredDetails.forEach(detail => {
                html += `
                <tr>
                    <td class="text-center align-middle">
                        <img class="custom-img" src="{{asset('assets/images/sp/${detail.product_detail.productImages}')}}" alt="Hình ảnh sản phẩm" width="100">
                    </td>
                    <td class="align-middle">
                        <ul class="m-0">
                            <li><strong>Tên sản phẩm:</strong> ${detail.product_detail.product.name}</li>
                            <li><strong>Size:</strong> ${detail.product_detail.size.name}</li>
                            <li><strong>Màu:</strong> ${detail.product_detail.color.color_name}</li>
                            <li> <div class = "colorcircle" style = "background-color: ${detail.product_detail.color.hex}";/></li>
                        </ul>
                   </td>
                    <td class="text-center align-middle">${parseInt(detail.price).toLocaleString('vi-VN')} VNĐ</td>
                    <td class="text-center align-middle">${detail.quality}</td>
                    <td class="text-center align-middle">${(detail.price * detail.quality).toLocaleString('vi-VN')} VNĐ</td>
                </tr>
            `;
            });

            html += `
    <tr>
        <th class="text-center align-middle" scope="row" colspan="2">
            <div><strong class="p-4">Tổng giá trị sản phẩm</strong></div>
        </th>
        <td class="align-middle px-3" colspan="3" style="text-align: right;">
            <strong id="totalProductValue"></strong>
        </td>
    </tr>
    <tr>
        <th class="text-center align-middle" scope="row" colspan="2">
            <div><strong class="p-4">Phí vận chuyển</strong></div>
        </th>
        <td class="align-middle px-3" colspan="3" style="text-align: right;">
            <strong id="deliveryCharge"></strong>
        </td>
    </tr>
    <tr>
        <th class="text-center align-middle" scope="row" colspan="2">
            <div><strong class="p-4">Giảm giá áp dụng</strong></div>
        </th>
        <td class="align-middle px-3" colspan="3" style="text-align: right;">
            <strong id="discount"></strong>
        </td>
    </tr>
    <tr>
        <th class="text-center align-middle" scope="row" colspan="2">
            <div><strong class="p-4">Tổng giá trị đơn hàng</strong></div>
        </th>
        <td class="align-middle px-3" colspan="3" style="text-align: right;">
            <strong id="totalOrderValue"></strong>
        </td>
    </tr>
`;

            tableBody.innerHTML = html;

            // Cập nhật thông tin tổng cộng
            document.getElementById('totalProductValue').innerText =
                `${totalProductValue.toLocaleString('vi-VN')} VNĐ`;
            document.getElementById('deliveryCharge').innerText =
                `${deliveryCharge.toLocaleString('vi-VN')} VNĐ`;
            document.getElementById('discount').innerText = '-' +
                `${discount.toLocaleString('vi-VN')} VNĐ`;
            document.getElementById('totalOrderValue').innerText =
                `${totalOrderValue.toLocaleString('vi-VN')} VNĐ`;
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Listen for the event when the modal is about to be shown
        const updateStatusModal = document.getElementById('updataStatus');
        updateStatusModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget; // The button that triggered the modal
            const orderId = button.getAttribute('data-order-id'); // Get order ID
            const currentStatus = button.getAttribute('data-current-status'); // Get current status ID

            // Set the order ID in the dropdown to keep track of which order is being updated
            const statusSelect = updateStatusModal.querySelector('#statusSelect');
            statusSelect.setAttribute('data-order-id', orderId); // Store orderId in the select dropdown

            // Set the currently selected status
            statusSelect.value = currentStatus;


        });
    });
</script>

<script>
    document.querySelector('.btn-primary').addEventListener('click', function() {
        console.log('Button clicked'); // This will help check if the event is fired.

        const orderId = document.querySelector('#statusSelect').getAttribute('data-order-id');
        const statusId = document.querySelector('#statusSelect').value;

        // Log the orderId and statusId to make sure they are correct
        console.log('Order ID:', orderId);
        console.log('Status ID:', statusId);

        // Send POST request to update the order status
        fetch(`/orders/${orderId}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    status_id: statusId
                })
            })
            .then(response => response.json())
            .then(data => {
                // console.log(data); // Log the response data for debugging
                // if (data.message === 'successfully') {}
                // const statusElement = document.querySelector(`.status[data-order-id="${orderId}"]`);

                // console.log(statusElement);
                // console.log(data.status);

                // if (data.status === 1) {
                //     statusElement.style.color = '#ffab40'; // Change the text color
                //     statusElement.style.borderColor = '#ffab40'; // Change the border color
                // } else if (data.status === 2) {
                //     statusElement.style.color = 'green';
                //     statusElement.style.borderColor = 'green';
                // } else if (data.status === 3) {
                //     statusElement.style.color = '#ffab40';
                //     statusElement.style.borderColor = '#ffab40';
                // }

                window.location.href = window.location.href;
                window.location.reload();


            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>