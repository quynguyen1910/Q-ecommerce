@extends('admin.shared.layouts.master-layout')
@section('title')
    Thành Viên
@endsection
@section('main')

@if (session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
@endif




    <div class="py-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
            <i class="fa fa-plus" aria-hidden="true"></i>
            <span>Thêm Thành Viên</span></button>
    </div>



    <div class="row">
        <table class="table table-hover">
            <thead class="text-capitalize">
                <tr>
                    <th scope="col">stt</th>
                    <th scope="col">Họ Tên</th>
                    <th scope="col">giới tính</th>
                    <th scope="col">Ngày Sinh</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa Chỉ</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($userList) == 0)
                    <p>Không có người dùng nào.</p>
                @else
                    @foreach ($userList as $key => $user)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td class="text-capitalize">{{ $user->ho . ' ' . $user->ten }}</td>
                            <td>{{ $user->gioitinh === 0 ? 'Nam' : 'Nữ' }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->ngaysinh)->format('d/m/Y') }}</td>
                            <td>{{ $user->sodt ?? '...' }}</td>
                            <td>{{ $user->diachi }}</td>
                            <td>
                                <button type="button" class="btn btn-primary edit-user-btn"
                                    data-user="{{ json_encode($user) }}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button value="{{ $user->ma_nv }}" data-name='{{ $user->ho . ' ' . $user->ten }}'
                                    class="btn btn-danger deleteUser" data-bs-toggle="modal"
                                    data-bs-target="#requestForm">X</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
@push('modal')
    {{-- form add user --}}
    @include('admin.shared.include.Form.CreateUser')
    {{-- form edit user --}}
    @include('admin.shared.include.Form.EditUser')
    {{-- form delete user --}}
    @include('admin.shared.include.Form.RequestForm', [
        'titleModal' => 'Xóa Thành Viên',
        'content' => 'Bạn Có Muốn Xóa Thành Viên Này Không?',
    ])
@endpush
@push('ct-js')
    <script>
        const addUser = document.getElementById('addUser')
        if (addUser) {
            addUser.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const recipient = button.getAttribute('data-bs-whatever')
            })
        }

        //chưa xác định được form nào bị lỗi do error->any
        @if ($errors->any())
            var errorModal = new bootstrap.Modal(document.getElementById('addUser'));
            var errorModal2 = new bootstrap.Modal(document.getElementById('editUserModal'));
            errorModal.show();
        @endif


        $(document).ready(function() {
            // Gắn sự kiện click vào nút chỉnh sửa
            $('.edit-user-btn').click(function() {
                // Lấy dữ liệu người dùng từ thuộc tính data
                var userData = $(this).data('user');
                // Điền dữ liệu người dùng vào form chỉnh sửa
                $('#edit_ho').val(userData.ho);
                $('#edit_ten').val(userData.ten);
                $('#edit_ngaysinh').val(userData.ngaysinh);
                $('#edit_sodt').val(userData.sodt);
                $('#edit_diachi').val(userData.diachi);
                $('#ma_nv').val(userData.ma_nv);

                // Kiểm tra và chọn giới tính
                if (userData.gioitinh === 0) {
                    $('#edit_gioitinh1').prop('checked', true);
                } else {
                    $('#edit_gioitinh2').prop('checked', true);
                }

                // Mở modal chỉnh sửa
                $('#editUserModal').modal('show');
            });

            let userId = ''
            let userName = ''
            $('button.deleteUser').click(function(e) {
                userId = $(this).val();
                userName = $(this).data('name');

                // Thiết lập nội dung cho modal
                let modalBody = document.querySelector('#requestForm .modal-body');
                modalBody.innerHTML = `Bạn có chắc chắn muốn xóa thành viên: <span class="text-danger">${userName}</span>`;
            })
            $('#requestForm-accept').click(function() {
                let nodeForm = document.getElementById('deleteForm')
                let actionUrl = "{{ route('admin.users.destroy', ['user' => 'userId']) }}";
                actionUrl = actionUrl.replace('userId', userId);
                nodeForm.action = actionUrl;
                $('#deleteForm').submit();
            })


                    //tắt thông báo
        let successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(function() {
                successAlert.style.transition = 'opacity 0.5s ease-out';
                successAlert.style.opacity = '0';
                setTimeout(function() {
                    successAlert.remove();
                }, 500); // Thời gian trễ thêm để đảm bảo transition kết thúc trước khi xóa phần tử
            }, 1500); // 5000 milliseconds = 5 seconds
        }
        });




    </script>
@endpush
