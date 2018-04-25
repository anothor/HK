<?php

namespace App\Http\Controllers\Setting;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::where('is_admin','0')->get();
        $data['users']=$users;
        $data['no']=0;
        return view('setting_user',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method']="post";
        $data['url']=url('setting/users');
        return view('update_user',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User;

        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->bank = $request->bank;
        $user->bank_acc = $request->bank_acc;

        $user->save();
        return redirect(url('setting/users'))->with('success','เพิ่มข้อมูลสมาชิกใหม่เรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::find($id);
        $data['user']=$user;
        $data['method']="put";
        $data['url']=url('setting/users/'.$id);
        return view('update_user',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->bank = $request->bank;
        $user->bank_acc = $request->bank_acc;

        $user->save();
        return redirect(url('setting/users'))->with('success','ปรับปรุงข้อมูลสมาชิกเรียบร้อย');
    }

    public function resetPassword(Request $request)
    {
        //
        $user = User::find($request->id);

        $user->password = bcrypt($request->password);

        $user->save();
        return redirect(url('setting/users'))->with('success','แก้ไขรหัสผ่านสมาชิกเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        
        if ($user->delete()) {
            return redirect(url('setting/users'))->with('success','ลบข้อมูลเรียบร้อย');
        }else{
            return back()->with('error','ไม่พบข้อมูลที่ต้องการลบ');
        }
    }
}
