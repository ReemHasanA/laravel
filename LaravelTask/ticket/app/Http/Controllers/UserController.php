<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id',  3)->paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // retry($request->input(''),5);
        return view('user.create');
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
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8',
            
            'salary' => 'required_if:role_id,2', // Validate salary only if role is 2
            'position' => 'required_if:role_id,2', // Validate position only if role is 2
            ]);
        
        // $data= $request->all();
        // (new EmployeeController)->create($data);
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);
        // $user->employee()->
        if ($request->role_id == 2) {
            $user->employee()->create([ // Create employee record using the relationship
                'salary' => $request->salary,
                'position' => $request->position,
                'user_id'=> $user->id,
            ]);
            // $data['user_id']=$user->id;
            // $employee=new Employee;
            // $employee->user_id=$user->id;
            // $employee->salary=$request->salary;
            // $employee->position=$request->position;
            // $employee->save();
            // dd($data);
            return redirect()->route('employees.index');
            // return redirect()->action([EmployeeController::class, 'store'], ['data' => $data]);
            // return redirect()->route('employees.store',$data);
        }else if($request->role_id ==3){
        return redirect()->route('users.index')->with('success','Added successfully');}

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        session()->start();
        $userId = Auth::user()->id;
        $user = User::find($userId);

        // $roleId = Auth::user()->role_id;
        $userTicket = $user->ticket()->get();
        // dd($userTicket);
        return view('user.view', compact('userTicket'));
        // T::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
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
        // dd($request->all());
        $user=User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->update();

        if ($user->role_id== 2) {
            $employee=User::find($id)->employee;
            // dd($employee);
            $employee->update($request->all());
            return redirect()->route('employees.index');
        }else{  
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        if( $user->role_id== 2) {
            return redirect()->route('employees.index');
        }
        return redirect()->route('users.index');
    }
}
