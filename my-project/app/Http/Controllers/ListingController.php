<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class ListingController extends Controller
{
    // Display all listing of the resource.
    
    public function index( )
    {
       //dd(Listing::latest()->filter(request(['tag', 'search']))->get()   );
        return view('listings.index', [
        'listing'=>Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(4)   
    ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('listings.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'discription' => 'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = Auth::id();

        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully!!!');


    }

    // Display the specified resource.
    
    public function show(Listing $listings){
 return view('listings.show', [
'listings' => $listings
    ]);
    }

    // Show the form for editing the specified resource.
    public function edit(Listing $listings)
    {
        return view('listings.edit', [
        "listing"=> $listings
        ]); 
    } 
  /*  public function edit($id)
    {
        $listing = Listing::findOrFail($id);
        return view('listings.edit', [
            'listing'=>$listing
        ]);
    } */


    // Update the specified resource in storage.
    
    public function update(Request $request, Listing $listing)
    {

    //make sure logged in user is owner of listing
    if($listing->user_id != Auth::id()){
        abort(403, 'Unauthorized Action');
    }
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'discription' => 'required'
        ]);       

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($formFields);
         return back()->with('message', 'Listing updated successfully!');
    }

    // delet the specified resource from storage.
    
    public function destroy(Listing $listings)
    {
        //make sure logged in user is owner of listing
    if($listings->user_id != Auth::id()){
        abort(403, 'Unauthorized Action');
    }
        $listings->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }

// manage function to manage listings of the logged in user
    public function manage() {
        return view('listings.manage', ['listings' => Auth::user()->listings()->get()]);
    }
}
