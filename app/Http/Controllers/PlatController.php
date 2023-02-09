<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard',['plats'=>Plat::All()]);
    }
    
    public function landing(){
        return view('welcome',['plats'=>Plat::All()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'picture'=>'required',
            'title'=>'bail|required|min:4|max:100',
            'description'=>'required',
            'date'=>'required'

        ]);
        // $image_path = $request->file('picture')->store('picture', 'public');
        $data=$request->only(['picture','title','description','date']);
        $data['picture']= $request->file('picture')->store('picture', 'public');
        Plat::create($data);
        return redirect()->back()->with('success','Plat created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('plat.display',['plat'=>Plat::find($id)]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plat=Plat::findorfail($id);//recuper le plat de bdd
        return view('plat.edit',['plat'=>$plat]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Plat $plat)

    { 
        // $plat=Plat::findorfail($id);
        // $validatedData=$request->validate([
        //     'picture'=>'required',
        //     'title'=>'bail|required|min:4|max:100',
        //     'description'=>'required',
        //     'date'=>'required'

        // ]);
        // $plat->picture=$request->file('picture')->store('picture', 'public');
        // $plat->title=$request->input('title');
        // $plat->description=$request->input('description');
        // $plat->date=$request->input('date');
        // $plat->save();
        if($request->file('picture')!=null){
            $validatedData=$request->validate([
                'picture'=>'required',
                'title'=>'bail|required|min:4|max:100',
                'description'=>'required',
                'date'=>'required'
    
            ]);
            $validatedData['picture']=$request->file('picture')->store('picture', 'public');
            $plat->update($validatedData);
        }else{
            $validatedData=$request->validate([
                
                'title'=>'bail|required|min:4|max:100',
                'description'=>'required',
                'date'=>'required'
    
            ]);
            $plat->update($validatedData);

        }
        
        return redirect()->route('plats.index')->with('success','Plat updated successfully!');


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plat::destroy($id);
        return redirect()->route('plats.index')->with('success','Plat deleted successfully!');
    }
}
