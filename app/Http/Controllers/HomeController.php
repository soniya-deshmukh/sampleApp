<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
  
class HomeController extends Controller
{
    //***auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //*****user validation
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createUser');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                'name' => 'required',
                'password' => 'required|min:5',
                'email' => 'required|email|unique:users'
            ], [
                'name.required' => 'Name is required',
                'password.required' => 'Password is required'
            ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
      
        return back()->with('success', 'User created successfully.');
    }
}