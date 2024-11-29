@include('layouts.app')
@include('components.Menu.menu')
<div class="content-page">
    <div class="content">
        <div class="container">
            <h1>Danh Sách Liên Hệ</h1>

            <!-- Tìm kiếm -->
            <div class="row mb-3 align-items-center">
                <div class="col-md-6">
                    <form id="search-form" action="{{ route('admin.contacts.index') }}" method="GET">
                        <div class="position-relative">
                            <input
                                type="text"
                                id="search-input"
                                name="search"
                                class="form-control rounded-pill pe-5 border-0"
                                placeholder="Tìm kiếm liên hệ..."
                                value="{{ request('search') }}"
                                style="background-color: white;"
                            >
                            <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Bảng danh sách liên hệ -->
            <table class="table mt-3 table-striped" id="contact-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Điện Thoại</th>
                        <th>Tin Nhắn</th>
                        <th>Chủ Đề</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $startIndex = ($contacts->currentPage() - 1) * $contacts->perPage();
                    @endphp
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $startIndex + $loop->iteration }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>
                            <button class="btn btn-warning"
                                    data-id="{{ $contact->id }}"
                                    data-name="{{ $contact->name }}"
                                    data-email="{{ $contact->email }}"
                                    data-phone="{{ $contact->phone }}"
                                    data-message="{{ $contact->message }}"
                                    data-subject="{{ $contact->subject }}"
                                    onclick="openEditModal(this)">
                                Sửa
                            </button>
                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        Xóa
                                    </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Phân trang -->
            <div class="d-flex justify-content-center">
                {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<!-- Modal Chỉnh Sửa -->
<div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="editContactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editContactForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editContactModalLabel">Chỉnh sửa liên hệ</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-contact-name" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="edit-contact-name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-contact-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit-contact-email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-contact-phone" class="form-label">Điện Thoại</label>
                        <input type="text" class="form-control" id="edit-contact-phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-contact-message" class="form-label">Tin Nhắn</label>
                        <input type="text" class="form-control" id="edit-contact-message" name="message" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-contact-subject" class="form-label">Chủ Đề</label>
                        <input type="text" class="form-control" id="edit-contact-subject" name="subject" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function openEditModal(button) {
        const contactId = button.getAttribute('data-id');
        const contactName = button.getAttribute('data-name');
        const contactEmail = button.getAttribute('data-email');
        const contactPhone = button.getAttribute('data-phone');
        const contactMessage = button.getAttribute('data-message');
        const contactSubject = button.getAttribute('data-subject');

        // Điền dữ liệu vào form
        document.getElementById('edit-contact-name').value = contactName;
        document.getElementById('edit-contact-email').value = contactEmail;
        document.getElementById('edit-contact-phone').value = contactPhone;
        document.getElementById('edit-contact-message').value = contactMessage;
        document.getElementById('edit-contact-subject').value = contactSubject;

        // Cập nhật action của form
        const form = document.getElementById('editContactForm');
        form.action = `/admin/contacts/${contactId}`;

        // Hiển thị modal
        const modal = new bootstrap.Modal(document.getElementById('editContactModal'));
        modal.show();
    }
</script>
