<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function listUsers(){
        $listUsers = DB::table('users')
        ->join('phongban', 'users.phongban_id', '=', 'phongban.id')
        ->select('users.id', 'users.name', 'users.email', 'users.phongban_id', 'phongban.ten_donvi')
        ->get();
        return view('users/listUsers')->with([
            'listUsers' => $listUsers
        ]);
    }

    public function addUsers(){
        $phongBan = DB::table('phongban')
        ->select('id', 'ten_donvi')
        ->get();
        return view('users/addUsers')->with([
            'phongban' => $phongBan
        ]);
    }

    public function addPostUsers(Request $req){
        $data = [
            'name' => $req->name, // $req->name <=> $_POST['name]
            'email' => $req->email,
            'phongban_id' => $req->phongban,
            'tuoi' => $req->tuoi,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        DB::table('users')->insert($data);

        return redirect()->route('users.listUsers');
    }


    public function deleteUser($UserId){
        DB::table('users')->where('id', $UserId)->delete();
        return redirect()->route('users.listUsers');
    }

    public function updateUser($UserId){
        $phongBan = DB::table('phongban')
        ->select('id', 'ten_donvi')
        ->get();
        $user = DB::table('users')->where('id', $UserId)->first();

        return view('users/updateUser')->with([
            'phongban' => $phongBan,
            'user' => $user
        ]);
    }

    public function updatePostUsers(Request $req){
        $data = [
            'name' => $req->name, // $req->name <=> $_POST['name]
            'email' => $req->email,
            'phongban_id' => $req->phongban,
            'tuoi' => $req->tuoi,
            'songaynghi' => $req->ngaynghi,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        DB::table('users')->where('id', $req->userId)->update($data);

        return redirect()->route('users.listUsers');
    }
}
