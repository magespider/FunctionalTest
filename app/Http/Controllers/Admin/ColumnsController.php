<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Column;
use Illuminate\Http\Request;

class ColumnsController extends Controller
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

        $columns = Column::when($keyword, function($query, $keyword){
                            $query->where('title', 'LIKE', "%$keyword%");
                        })->orderBy('position', 'ASC')->paginate($perPage);  

        return view('admin.columns.index', compact('columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.columns.create');
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
			'title' => 'required|string|max:255'
		]);
        $requestData = $request->all();
        
        Column::create($requestData);

        return redirect('admin/columns')->with('flash_message', 'Column added!');
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
        $column = Column::findOrFail($id);

        return view('admin.columns.show', compact('column'));
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
        $column = Column::findOrFail($id);

        return view('admin.columns.edit', compact('column'));
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
			'title' => 'required|string|max:255'
		]);
        $requestData = $request->all();
        
        $column = Column::findOrFail($id);
        $column->update($requestData);

        return redirect('admin/columns')->with('flash_message', 'Column updated!');
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
        Column::destroy($id);

        return redirect('admin/columns')->with('flash_message', 'Column deleted!');
    }
}
