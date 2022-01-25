<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::orderBy('created_at','desc')->paginate(5);
        return view('dashboard',[
            'todos' =>$todos,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'location'=>'required'
        ]);

        // Todo::create($request->all());
        $todo = new Todo();
        $todo->title =  $request->input('title');
        $todo->description =  $request->input('description');
        $todo->location =  $request->input('location');
        $todo->save();


        return redirect(route('dashboard'))->with('success','Task Assigned Successfully');
    }

    public function update(Request $request, $id)
    {

        $todo = Todo::findOrFail($id);
        $todo->title = $request['title'];
        $todo->description = $request['description'];
        $todo->location = $request['location'];
        $todo->save();

        return redirect()->back()->with('status', 'Task Updated Successfully!');

    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect()->back()->with('status', 'Task Deleted Successfully!');
    }
}


