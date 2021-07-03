<?php

namespace App\Http\Controllers\contact;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ContactU;
use Illuminate\Http\Request;
use Session;
use Helper;
use Storage;

class ContactUsController extends Controller
{

     public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $contactus = ContactU::where('Name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contactus = ContactU::latest()->paginate($perPage);
        }
         
        return view('contact.contact-us.index', compact('contactus'));
    }


    public function create()
    {
       
        return view('contact.contact-us.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'Name' => 'required',
			'email' => 'required',
			'address' => 'required'
		]);
        $requestData = $request->all();
        
        ContactU::create($requestData);
        Session::flash('success','Successfully Saved!');
        
        return redirect('user/contact-us');
    }


    public function show($id)
    {
        $contactu = ContactU::findOrFail($id);
        
        return view('contact.contact-us.show', compact('contactu'));
    }

    public function edit($id)
    {
        $contactu = ContactU::findOrFail($id);
        
        return view('contact.contact-us.edit', compact('contactu'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'Name' => 'required',
			'email' => 'required',
			'address' => 'required'
		]);
        $requestData = $request->all();
        
        $contactu = ContactU::findOrFail($id);
        $contactu->update($requestData);
        Session::flash('success','Successfully Updated!');
        
        return redirect('user/contact-us');
    }


    public function destroy($id)
    {
        ContactU::destroy($id);
        Session::flash('success','Successfully Deleted!');
        return redirect('user/contact-us');
    }
}
