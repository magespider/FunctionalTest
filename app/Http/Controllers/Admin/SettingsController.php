<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
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
        //Query
        $query = new Setting();  
        if (!empty($keyword)) {
            $query = $query->where(function($q) use($keyword){
                            $q->where('title', 'LIKE', "%$keyword%")
                            ->orWhere('key', 'LIKE', "%$keyword%");
                        });  
        }  
        $settings = $query->where('type','general')->latest()->paginate($perPage);   
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.settings.create');
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
			'title' => 'required|string|max:255',
			'key' => 'required|string|max:100|unique:settings',
			'value' => 'required|string'
		]);
        $requestData = $request->all();
        
        Setting::create($requestData);

        return redirect('admin/settings')->with('flash_message', 'Setting added!');
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
        $setting = Setting::findOrFail($id);

        return view('admin.settings.edit', compact('setting'));
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
        $this->validate($request, [
			'title' => 'required|string|max:255',
			'key' => 'required|string|max:100|unique:settings,key,' . $id,
			'value' => 'required|string'
		]);
        $requestData = $request->all();
        
        $setting = Setting::findOrFail($id);
        $setting->update($requestData);

        return redirect('admin/settings')->with('flash_message', 'Setting updated!');
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
        Setting::destroy($id);
        return redirect()->back()->with('flash_message', 'Setting deleted!');
    }
}
