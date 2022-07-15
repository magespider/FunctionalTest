<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;  
use Illuminate\Http\Request;  
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25; 

        $query = new User();  
        if (!empty($keyword)) {
            $query = $query->where('name', 'LIKE', "%$keyword%")
                        ->orWhere('email', 'LIKE', "%$keyword%");  
        }  
        $users = $query->latest()->paginate($perPage);  

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|max:100',
			'email' => 'required|string|max:255|email|unique:users',
			'password' => 'required|string|min:6|max:12|confirmed'
		]);
        $requestData = $request->except(['enabled', 'password', 'password_confirmation']);
        $requestData['enabled'] = ($request->enabled == 1)?1:0;
        $requestData['password'] = bcrypt($request->password);
        User::create($requestData);

        return redirect(route('admin.users.index'))->with('flash_message', 'User added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        if($request->has('change_password')){
            $this->validate($request, [
                'name' => 'required|max:100',
                'email' => 'required|string|max:255|email|unique:users,email,' . $id,
                'password' => 'required|string|min:6|max:12|confirmed'
            ]);
        }else{
            $this->validate($request, [
                'name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'email' => 'required|string|max:255|email|unique:users,email,' . $id,
            ]);
        }
        $user = User::findOrFail($id);
        $requestData = $request->except(['enabled', 'change_password', 'password', 'password_confirmation']);
        $requestData['enabled'] = ($request->enabled == 1)?1:0; 
        if($request->has('change_password')){
            $requestData['password'] = bcrypt($request->password);
        }
        $user->update($requestData);

        return redirect(route('admin.users.index'))->with('flash_message', 'User updated!');
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
        User::destroy($id);

        return redirect()->back()->with('flash_message', 'User deleted!');
    } 
}
