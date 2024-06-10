<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addUserLabel">Thêm Thành Viên</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger text-center text-uppercase">
                        Kiểm tra lại dữ liệu!
                    </div>
                @endif
                <form method="POST" class="{{ route('admin.users.store') }}">
                    @csrf
                    {{-- HỌ TÊN --}}
                    <div class="mb-3 d-flex justify-content-between">
                        <div>
                            <label for="ho" class="form-label">Họ</label>
                            <input value="{{ old('ho') }}" type="name" class="form-control" name='ho'
                                id="ho" aria-describedby="nameHelp">
                            @error('ho')
                                <span class="text-danger">* {{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="ten" class="form-label">Tên</label>
                            <input value="{{ old('ten') }}" type="name" class="form-control" name='ten'
                                id="ten" aria-describedby="nameHelp">
                            @error('ten')
                                <span class="text-danger">* {{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- giới tính --}}

                    <div class="mb-3 d-flex gap-3">
                        <label for="" class="form-label">Giới Tính:</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input value="0" class="form-check-input" type="radio" name="gioitinh"
                                    id="gioitinh1" checked>
                                <label class="form-check-label" for="gioitinh1">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input value="1" class="form-check-input" type="radio" name="gioitinh"
                                    id="gioitinh2">
                                <label class="form-check-label" for="gioitinh2">
                                    Nữ
                                </label>
                            </div>
                        </div>
                        @error('gioitinh')
                            <span class="text-danger">* {{ $message }}</span>
                        @enderror
                    </div>


                    {{-- ngày sinh --}}
                    <div class="mb-3 d-flex gap-3">
                        <div class="w-100">
                            <label for="ngaysinh" class="form-label">Ngày Sinh:</label>
                            <input type="date" class="form-control" name='ngaysinh' id="ngaysinh"
                                aria-describedby="nameHelp">
                            @error('ngaysinh')
                                <span class="text-danger">* {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 d-flex gap-3">
                        <div class="w-100">
                            <label for="sodt" class="form-label">Số điện thoại:</label>
                            <input value="{{ old('sodt') }}" type="text" class="form-control" name='sodt'
                                id="sodt" aria-describedby="nameHelp">
                        </div>
                    </div>
                    <div class="mb-3 d-flex gap-3">
                        <div class="w-100">
                            <label for="diachi" class="form-label">Địa chỉ:</label>
                            <input value="{{ old('diachi') }}" type="text" class="form-control" name='diachi'
                                id="diachi" aria-describedby="nameHelp">
                            @error('diachi')
                                <span class="text-danger">* {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>