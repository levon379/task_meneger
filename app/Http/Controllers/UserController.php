<?php

namespace App\Http\Controllers;
use App\User;
use App\Tasks;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function __construct()
    {
//        if (isset(Auth::user()->isAdmin) && Auth::user()->isAdmin == 'admin'){
//             return redirect('login');
//        }
    }
     public function getData(){
       $users = DB::table('users')
            ->select('users.id AS usersId','users.name','users.isAdmin','users.email','users.group_id','tasks.*')   
            ->leftJoin('tasks', 'users.id', '=', 'tasks.user_id')
            ->get();
      //dd($users);
       return view('user/users')->with('users',$users);

       
   }
     public function editUser($id){
       $user = User::findOrFail($id);
       return view('user/user_edit')->with('user',$user);
   }
     public function deleteUser($id){
       User::find($id)->delete();
       return redirect('users')->with('success', 'Hello');
   }
     public function updateUser($id, Request $req){
         $req->validate([
            'name' => 'required|string|max:255',
            'isAdmin' => 'required|string|max:255',
            'password' => 'required|string|min:4|confirmed',
            'password_confirmation' => 'required',
        ]);
       $user = User::findOrFail($id);
       $data = User::find($id);
       $data->name = $req->input('name');
       $data->isAdmin = $req->input('isAdmin');
       $data->group_id = $req->input('group_id');
       $data->save();
       return redirect()->back()->with('user',$user);
   }
    
     public function myGroup(){
        $group_id = Auth::user()->group_id;
          $users = DB::table('users')
            ->select('users.name')
            ->where('group_id', '=', $group_id)      
            ->get();
         
//         $result = array_map(function ($value) {
//    return (array)$value;
//}, $result);

////////////////////////////////
//        $result = array();
//        
//        foreach ($users as $element) {
//            $result[$element['id']][] = $element;
//        }
//        dd($result);
       return view('group/my_group')->with('users',$users);
   }
     public function allGroup(){
        $group_id = Auth::user()->group_id;
          $users = DB::table('users')
            ->select('users.group_id')
            ->groupBy('group_id')      
            ->get();
         
     $b = array();
        foreach ($users as $value)
        {
            $b[]=$value->group_id;
        }
      // var_dump($b); die;
       for($i = 0; $i<count($b);$i++){
//       for($j = 0; $j<count($b);$j++){
           $groups[$b[$i]] = DB::table('users')
            ->select('users.*')
            ->where('group_id', '=', $b[$i])      
            ->get();
       }
//       }
      // dd($groups);
       return view('group/all_group')->with('users',$groups);
   }
 // $post = Post::find(1);
 
//$comments = $post->comments;
 
//dd($comments);
}
