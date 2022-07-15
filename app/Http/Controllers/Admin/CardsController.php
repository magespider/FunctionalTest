<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Card;
use Illuminate\Http\Request;

class CardsController extends Controller
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

        $cards = Card::when($keyword, function($query, $keyword){
                    $query->where('title', 'LIKE', "%$keyword%")
                            ->orWhere('description', 'LIKE', "%$keyword%")
                            ->orWhere('position', 'LIKE', "%$keyword%");
                })->orderBy('position', 'ASC')->paginate($perPage); 

        return view('admin.cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.cards.create');
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
            'column_id' => 'required',
            'description' => 'required|string',
		]);
        $requestData = $request->all();
        
        Card::create($requestData);

        return redirect('admin/cards')->with('flash_message', 'Card added!');
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
        $card = Card::findOrFail($id);

        return view('admin.cards.show', compact('card'));
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
        $card = Card::findOrFail($id);

        return view('admin.cards.edit', compact('card'));
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
            'column_id' => 'required',
            'description' => 'required|string',
		]);
        $requestData = $request->all();
        
        $card = Card::findOrFail($id);
        $card->update($requestData);

        return redirect('admin/cards')->with('flash_message', 'Card updated!');
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
        Card::destroy($id);

        return redirect('admin/cards')->with('flash_message', 'Card deleted!');
    }
}
