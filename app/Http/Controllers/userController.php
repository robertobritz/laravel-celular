<?php

namespace App\Http\Controllers;

use App\Chip;
use App\Http\Requests\validationRequest;
use App\Phone;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('chip')->with('phone')->where('adm',0)->get();
        
        //$users = User::all();
        return view('users.index', compact('users'));
    }

    public function home()
    {
        $chip = Chip::with('user')->first();

        //dd($chip->user->name);

        $users = User::with('chip')->with('phone')->where('adm',0)->get();

        //dd($users);
   
        return view('welcome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \app\Http\Requests\validationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(validationRequest $request)
    {
        $data = $request->all();
        //dd($request);
        $User =  User::create($data);
        return redirect()->route('user.index');
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
        $user = User::where('id', $id)->first();

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \app\Http\Requests\validationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $user = User::where('id', $id)->first();
        
        $data = $request->all();
        //dd($data);
        if($request->numero){
            $chip = Chip::where('numero', $request->numero)->first();
            if($request->numero == '-'){

               $attchip = DB::table('users')->where('id', $request->userId)->update(['chip_id' => null]);        
            }
            else{
                $attchip = DB::table('users')->where('chip_id', $chip->id)->update(['chip_id' => null]);
                $attchip2 = DB::table('users')->where('id', $request->userId)->update(['chip_id' => $chip->id]); 
            }  
        }

        if( $request->serial_number){
            $phone = Phone::where('serial_number', $request->serial_number)->first();
            if($request->serial_number == '-'){

                $attphone = DB::table('users')->where('id', $request->userId)->update(['phone_id' => null]);      
             }
             else{
                $attphone = DB::table('users')->where('phone_id', $phone->id)->update(['phone_id' => null]);
                $attphone2 = DB::table('users')->where('id', $request->userId)->update(['phone_id' => $phone->id]);   
                }
            }

        $user->update($data);

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
        $user = User::where('id', $id)->first();
        
        $user->delete();

        return redirect()->back();
    }

    public function select($id)
    {
        //dd($request->all());
        $user = User::where('id', $id)->where('adm',0)->with('chip')->with('phone')->first();
        //dd($user);
        $chips = Chip::all();
        $phones = Phone::all(); 

        return view('users.select', compact('user', 'chips', 'phones'));

    }

}
