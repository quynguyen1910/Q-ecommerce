<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\userFormRequest;
use App\Models\Admin\Users;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = new Users();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userList = $this->users->getAllUsers();
        return response()->view("admin.users.index", compact('userList'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('admin.users.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userFormRequest $request): RedirectResponse
    {
        // dd($request->all());
        $validated = $request->validated();
        $data = [
            $request->input('ho'),
            $request->input('ten'),
            $request->input('gioitinh'),
            $request->input('ngaysinh'),
            $request->input('sodt'),
            $request->input('diachi'),
        ];
        try {
            $this->users->insertUser($data);
            $user = $request->input('ho') . " " . $request->input('ten');
            return redirect()->back()->with('success', "Đăng ký thành công: $user");
        } catch (\Exception $e) {
            return redirect()->back()->with('show_modal', 'addUser'); // Thêm biến để hiển thị modal thêm người dùng
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(userFormRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $data = $request->all();  // Lấy tất cả dữ liệu từ request
        $id = $request->input('ma_nv');
        try {
            $this->users->updateUser($data, $id);
            $user = $data['ho'] . ' ' . $data['ten'];
            return redirect()->back()->with('success', "Cập nhật thành công: $user");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['update' => 'Cập nhật thất bại'])->withInput()->with('show_modal', 'editUserModal');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $userDetail = $this->users->getUser($user);
        if ($userDetail) {
            $name = $userDetail->ho . " " . $userDetail->ten;
            $this->users->deleteUser($user); // Truyền ID của người dùng
            return redirect()->back()->with('success', "Xóa thành công: $name");
        }
        return redirect()->back()->with('error', 'Người dùng không tồn tại');
    }
    
}
