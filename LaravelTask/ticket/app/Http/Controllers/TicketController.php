<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Ticket;
use App\Models\Priorty;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $priorty=Priorty::all();
        $employee= Employee::all();
        $status= Status::all();
        $p=$request->priority_id;
        $s=$request->statuses_id;
        if(!empty($p)||!empty($s)){
            $tickets= Ticket::where(function ($query) use ($p,$s){
            $query->where("priority_id",$p)
                ->orWhere('statuses_id',$s);
        })->get();
               
        }else{
            $tickets = Ticket::all();  
        }
        
        return view("tickets.index", compact("tickets","employee","priorty","status"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priorty=Priorty::all();
        return view("tickets.create", compact("priorty"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->session()->start();
        // dd($request->all());
            $userId = Auth::user()->id;
            $roleId = Auth::user()->role_id;
            // dd($userId);
        $this->validate($request, [
            "title"=> "required",
            "messege"=> "required",
            "priority_id"=> "required",
            // ""=> "required",
        ]);
        $ticket = Ticket::create([
            "title"=> $request->title,
            "messege"=> $request->messege,
            "priority_id"=> $request->priority_id,
            "statuses_id"=> $request->statuses_id,
            "user_id"=> $userId,
        ]);
        // dd($ticket);
        if($roleId=="3"){
        return redirect()->route("users.show",$userId)->with("success","added successfully");}
        else if($roleId== "1"){
            return redirect()->route("tickets.index")->with("success","added successfully");}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        return view("tickets", compact(""));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        // dd($ticket);
        if($request->employee_id){
            $ticket->update([
                "employee_id"=> $request->employee_id,
            ]);
            return redirect()->route("tickets.index");
        }elseif ($request->statuses_id) {
            # code...
            // dd($request) ;
        $ticket->update([
            "statuses_id"=> $request->statuses_id,
        ]);
        $employee=$ticket->employee_id;
        return redirect()->route("employees.show", $employee)->with("success","");
        };
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $roleId= Auth::user()->role_id;
        $userId= Auth::user()->id;
        $ticket->delete();
        if($roleId=="3"){
            return redirect()->route("users.show",$userId)->with("success","deleted successfully");}
            else if($roleId== "1"){
                return redirect()->route("tickets.index")->with("success","deleted successfully");}
    }
}
