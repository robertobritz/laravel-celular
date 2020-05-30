<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneRequest;
use App\Phone;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class phoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::with('User')->get();
              
        return view('phones.index', compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('adm',0)->get();
        // dd($users);
         return view('phones.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \app\Http\Requests\PhoneRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        $data = $request->all();
        $phone =  Phone::create($data);

        if($request->name != '-'){
            
            $attchip = DB::table('users')->where('name', $request->name)->update(['phone_id' => $phone->id]);
        }
        return redirect()->route('phone.index');
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
        $phone = Phone::where('id', $id)->first();
        $users = User::where('adm',0)->get();
        return view('phones.edit', compact('phone', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \app\Http\Requests\PhoneRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, $id)
    {
        $phone = Phone::where('id', $id)->first();

        if($request->name != '-'){
            
            $attchip = DB::table('users')->where('phone_id', $id)->update(['phone_id' => null]);
            $attchip = DB::table('users')->where('name', $request->name)->update(['phone_id' => $id]);
            
        }
        else{

            $attchip = DB::table('users')->where('phone_id', $id)->update(['phone_id' => null]);
        }
        $data = $request->all();
       
        $phone->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phone::where('id', $id)->first();
        
        $phone->delete();

        return redirect()->back();
    }
}
