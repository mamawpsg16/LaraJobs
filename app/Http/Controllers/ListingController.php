<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request());
        return view('listings.index',
        [
            'header'=>'Software Developer',
            'jobs'=>Listing::latest()->filter(request(['tag','search']))->paginate(4)
                    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required',Rule::unique('listings','company')],
            'description' => 'required',
            'tags' => 'required',
            'email' => ['required','email'],
            'website' => 'required',
            'location' => 'required',
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);
        // Session::flash('message','Job Created');
        return redirect('/')->with('message','Job created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $job)
    {
        return view('listings.show',
        [
            'job'=>$job
                    
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $job)
    {
        return view('listings.edit',['job'=>$job]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Listing $job)
    {
        //Make sure logged in user is owner
        if($job->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
         $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'description' => 'required',
            'tags' => 'required',
            'email' => ['required','email'],
            'website' => 'required',
            'location' => 'required',
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        // $formFields['user_id'] = auth()->id();
        $job->update($formFields);
        // Session::flash('message','Job Created');
        return back()->with('message','Job updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $job)
    {
        if($job->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
        $job->delete();
        return redirect('/')->with('message','Job deleted successfully!');
    }

    public function manage(){
        return view('listings.manage',['jobs'=>auth()->user()->listings()->get()]);
    }
}
