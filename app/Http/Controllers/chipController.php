<?php

namespace App\Http\Controllers;

use App\Chip;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\validationChipRequest;
use Illuminate\Support\Facades\DB;

class chipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chips = Chip::with('User')->get();
       // dd($chips);
        return view('chips.index', compact('chips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('adm',0)->get();
       //dd($users);
        return view('chips.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \app\Http\Requests\validationChipRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(validationChipRequest $request)
    {
        $data = $request->all();

        $chips =  Chip::create($data);
        if($request->name != '-'){
            
            $attchip = DB::table('users')->where('name', $request->name)->update(['chip_id' => $chips->id]);
        }

        return redirect()->route('chip.index');
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
        $chip = Chip::where('id', $id)->first();
        $users = User::where('adm',0)->get();
        return view('chips.edit', compact('chip','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \app\Http\Requests\validationChipRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(validationChipRequest $request, $id)
    {
        $chip = Chip::where('id', $id)->first();

        if($request->name != '-'){
            
            $attchip = DB::table('users')->where('chip_id', $id)->update(['chip_id' => null]);
            $attchip = DB::table('users')->where('name', $request->name)->update(['chip_id' => $id]);
            //dd($attchip);
        }
        else{

            $attchip = DB::table('users')->where('chip_id', $id)->update(['chip_id' => null]);
        }

        $data = $request->all();
        
        $chip->update($data);

        return redirect()->back();
;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chip = Chip::where('id', $id)->first();
        
        $chip->delete();

        return redirect()->back();
    }
}
