<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ListingController extends Controller
{
    //
    public function index(Request $request) {
        return view('listings.index', [ 
            'listing' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function show($id) {
        $listing = Listing::find(decrypt($id));
        if ($listing->exists) {
            return view('listings.show', $listing);
        } else {
            abort('404');
        }
    }

    public function create() {
        return view('listings.create');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'title' => 'required',
            'company' => 'required|unique:listings,company',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $fields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $fields['user_id'] = auth()->id();

        Listing::create($fields);

        return redirect(route('dashboard'))->with('success', 'Successfully posted a job');
    }

    public function edit($id) {
        return view('listings.edit', Listing::find(decrypt($id)));
    }

    public function update($id, Request $request) {

        if (Listing::find(decrypt($id))->user_id != auth()->id()) 
            abort(403, 'Unathorized access');

        $fields = $request->validate([
            'title' => 'required',
            'company' => "required|unique:listings,company,".decrypt($id),
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $fields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $post = Listing::find(decrypt($id))->update($fields);

        return redirect(route('dashboard'))->with('success', 'Job posted update successfully');
    }

    public function destroy($id) {
        $list = Listing::find(decrypt($id));

        if ($list->user_id != auth()->id()) 
            abort(403, 'Unathorized access');

        $list->delete();

        return redirect(route('dashboard'))->with('success', 'Deleted post successfully');
    }

    public function manage() {
        return view('listings.manage', ['listing' => auth()->user()->listings()->latest()->paginate(6)]);
    }
}
