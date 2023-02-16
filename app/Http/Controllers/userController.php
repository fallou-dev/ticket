<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\users;
class userController extends Controller
{
    public function insertform() {
        return view('admin.user_create');
     }
      
     public function insert(Request $request) {


        $name    = $request->input('user_name');
        $email = $request->input('user_email');
        $role = $request->input('user_role');
        $password = $request->input('user_password'); 
        $hashed = Hash::make($password);
        DB::insert('insert into users (name,email,password,role) values(?,?,?,?)',[$name,$email,$hashed,$role]);
        return redirect('listUser');
     }

     public function view() {
        $users = users::all();
        return view('admin.user_view',['users'=>$users]);
     }

     public function show($id) {
      $users = DB::select('select * from users where id = ?',[$id]);
      return view('admin.user_edit',['users'=>$users]);
   }
   public function edit(Request $request,$id) {
      $name = $request->input('user_name');
      $email = $request->input('user_email');
      $role = $request->input('user_role');
     
      DB::update('update users set name = ?,email=?,role=? where id = ?',[$name,$email,$role,$id]);
      
      return redirect('listUser');
   }

   public function destroy($id) {
      DB::delete('delete from users where id = ?',[$id]);
      return redirect('listUser');
   }
}
