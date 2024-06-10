<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    protected $table = "nhan_vien";

    use HasFactory;
    public function getAllUsers(){
        $users = DB::select('SELECT * FROM ' . $this->table . ' ORDER BY ma_nv DESC');
return $users;
    }
    public function insertUser($data){
        DB::insert('INSERT into ' . $this->table . ' (ho,ten,gioitinh,ngaysinh,sodt,diachi) values (?, ?, ?, ?, ?, ?)', $data);
    }
    public function updateUser($data,$id){
        $fields = [];
    $values = [];

    foreach ($data as $key => $value) {
        // Bỏ qua các trường không phải là cột trong bảng
        if ($key !== '_token' && $key !== '_method' && $key !=='ma_nv') {
            $fields[] = "$key = ?";
            $values[] = $value;
        }
    }

    // Thêm giá trị ID vào cuối mảng giá trị
    $values[] = $id;

    // Xây dựng câu lệnh SQL
    $sql = 'UPDATE ' . $this->table . ' SET ' . implode(', ', $fields) . ' WHERE ma_nv = ?';

    // Thực thi câu lệnh SQL với các giá trị
    DB::update($sql, $values);
    }
public function getUser($id){
    $userDetail = DB::selectOne('SELECT * FROM ' . $this->table . ' WHERE ma_nv = ?', [$id]);
    return $userDetail;
}

    public function deleteUser($id) {
        DB::delete('DELETE FROM ' . $this->table . ' WHERE ma_nv = ?', [$id]);
    }
}
