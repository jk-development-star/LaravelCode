<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\ListingAmenity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class AmenityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index()
    {
        $amenity = Amenity::all();
        return view('admin.amenity_view', compact('amenity'));
    }

    public function create()
    {
        return view('admin.amenity_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amenity_name' => 'required|unique:amenities',
            'amenity_slug' => 'unique:amenities'
        ],[
            'amenity_name.required' => ERR_NAME_REQUIRED,
            'amenity_name.unique' => ERR_NAME_EXIST,
            'amenity_slug.unique' => ERR_SLUG_UNIQUE,
        ]);
        $amenity = new Amenity();
        $data = $request->only($amenity->getFillable());
        if(empty($data['amenity_slug']))
        {
            unset($data['amenity_slug']);
            $data['amenity_slug'] = Str::slug($request->amenity_name);
        }
        $amenity->fill($data)->save();
        return redirect()->route('admin_amenity_view')->with('success', SUCCESS_DATA_ADD);
    }

    public function edit($id)
    {
        $amenity = Amenity::findOrFail($id);
        return view('admin.amenity_edit', compact('amenity'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'amenity_name'   =>  [
                'required',
                Rule::unique('amenities')->ignore($id),
            ],
            'amenity_slug'   =>  [
                Rule::unique('amenities')->ignore($id),
            ]
        ],[
            'amenity_name.required' => ERR_NAME_REQUIRED,
            'amenity_name.unique' => ERR_NAME_EXIST,
            'amenity_slug.unique' => ERR_SLUG_UNIQUE,
        ]);

        $amenity = Amenity::findOrFail($id);
        $data = $request->only($amenity->getFillable());
        if(empty($data['amenity_slug']))
        {
            unset($data['amenity_slug']);
            $data['amenity_slug'] = Str::slug($request->amenity_name);
        }
        $amenity->fill($data)->save();
        return redirect()->route('admin_amenity_view')->with('success', SUCCESS_DATA_UPDATE);
    }

    public function destroy($id)
    {
        // Check if this is in "listing_amenities" table
        $tot = ListingAmenity::where('amenity_id',$id)->count();
        if($tot) {
            return Redirect()->back()->with('error', ERR_ITEM_DELETE);
        }

        // Deleting data from "amenities" table
        $amenity = Amenity::findOrFail($id);
        $amenity->delete();        

        // Success Message and redirect
        return Redirect()->back()->with('success', SUCCESS_DATA_DELETE);
    }

}
