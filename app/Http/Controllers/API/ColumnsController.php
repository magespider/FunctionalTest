<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Column;
use Illuminate\Http\Request;

class ColumnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $columns = Column::with('cards')->orderBy('position', 'ASC')->paginate(25);

        return $columns;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $column = Column::create($request->all());

        return response()->json($column, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $column = Column::findOrFail($id);

        return $column;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $column = Column::findOrFail($id);
        $column->update($request->all());

        return response()->json($column, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Column::destroy($id);

        return response()->json(null, 204);
    }
}
