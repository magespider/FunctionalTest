<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $query = new Admin();  
        if (!empty($keyword)) {
            $query = $query->where(function($q) use($keyword){
                            $q->where('name', 'LIKE', "%$keyword%")
                            ->orWhere('email', 'LIKE', "%$keyword%");
                        });  
        }  
        $admins = $query->latest()->paginate($perPage);
		$admins->setPath('');
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|max:50',
			'email' => 'required|string|max:255|email|unique:admins',
			'password' => 'required|string|min:6|max:12|confirmed'
		]);
        $requestData = $request->except(['enabled', 'password', 'password_confirmation']);
        $requestData['enabled'] = ($request->enabled == 1)?1:0;
        $requestData['password'] = bcrypt($request->password);
        Admin::create($requestData);

        return redirect('admin/admins')->with('flash_message', 'Admin added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validationOptions = ['name' => 'required|max:50',
                            'email' => 'required|string|max:255|email|unique:admins,email,' . $id];
        if($request->has('change_password')){
            $validationOptions = array_merge($validationOptions, ['password' => 'required|string|min:6|max:12|confirmed']);
        }
        $this->validate($request, $validationOptions);
        $requestData = $request->except(['change_password', 'password', 'password_confirmation', 'enabled']); 
        $requestData['enabled'] = ($request->enabled == 1)?1:0;
        $admin = Admin::findOrFail($id);
        if($request->has('change_password')){
            $requestData['password'] = bcrypt($request->password);
        }
        $admin->update($requestData);

        return redirect('admin/admins')->with('flash_message', 'Admin updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Admin::destroy($id);

        return redirect()->back()->with('flash_message', 'Admin deleted!');
    }
}
