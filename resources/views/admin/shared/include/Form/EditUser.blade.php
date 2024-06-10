<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editUserModalLabel">Chỉnh Sửa Thành Viên</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger text-center text-uppercase">
                        Kiểm tra lại dữ liệu!
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.users.update', ['user' => 'edit']) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="ma_nv" name="ma_nv" value="">
                    {{-- HỌ TÊN --}}
                    <div class="mb-3 d-flex justify-content-between">
                        <div>
                            <label for="edit_ho" class="form-label">Họ</label>
                            <input value="" type="text" class="form-control" name='ho' id="edit_ho" aria-describedby="nameHelp">
                        </div>
                        <div>
                            <label for="edit_ten" class="form-label">Tên</label>
                            <input value="" type="text" class="form-control" name='ten' id="edit_ten" aria-describedby="nameHelp">
                        </div>
                    </div>

                    {{-- Giới tính --}}
                    <div class="mb-3 d-flex gap-3">
                        <label for="" class="form-label">Giới Tính:</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gioitinh" id="edit_gioitinh1" value="0">
                                <label class="form-check-label" for="edit_gioitinh1">Nam</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gioitinh" id="edit_gioitinh2" value="1">
                                <label class="form-check-label" for="edit_gioitinh2">Nữ</label>
                            </div>
                        </div>
                    </div>

                    {{-- Ngày sinh --}}
                    <div class="mb-3 d-flex gap-3">
                        <div class="w-100">
                            <label for="edit_ngaysinh" class="form-label">Ngày Sinh:</label>
                            <input type="date" class="form-control" name='ngaysinh' id="edit_ngaysinh" aria-describedby="nameHelp">
                        </div>
                    </div>
                    <div class="mb-3 d-flex gap-3">
                        <div class="w-100">
                            <label for="edit_sodt" class="form-label">Số điện thoại:</label>
                            <input value="" type="text" class="form-control" name='sodt' id="edit_sodt" aria-describedby="nameHelp">
                        </div>
                    </div>
                    <div class="mb-3 d-flex gap-3">
                        <div class="w-100">
                            <label for="edit_diachi" class="form-label">Địa chỉ:</label>
                            <input value="" type="text" class="form-control" name='diachi' id="edit_diachi" aria-describedby="nameHelp">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
