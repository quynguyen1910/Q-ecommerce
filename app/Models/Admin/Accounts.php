<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class Accounts extends Model implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tai_khoan';
    public function getAuthIdentifierName()
    {
        return 'ten_tk'; // Tên trường chứa tên tài khoản trong database
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->matkhau_tk;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getAll()
    {
        $table = $this->table;
        $list = DB::table($table)
            ->select('tai_khoan.*', 'nhan_vien.ho', 'nhan_vien.ten')
            ->leftJoin('nhan_vien', 'tai_khoan.ma_nv', '=', 'nhan_vien.ma_nv')
            ->get();

        return $list;
    }
}
