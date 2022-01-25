@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="py-2">
    <div class="container ">
        <div class="overflow-hidden ">
            <div class="p-6 ">
                Hello {{ Auth::user()->name }}!!. Let's help you plan your day. Create a task and add a description on how you plan to achieve it.
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                      <h3 class="display-4">Create A Task</h3>
                      <div>
                          <!--error messages... -->
                          @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('status')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                          @endif
                            <form method="POST" action="{{ route('todos.store')}}" autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Title</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  name="title" placeholder="Enter a title for your task" autofocus required>
                                            {{-- @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                    {{$errors->first('title')}}
                                                </span>
                                            @endif --}}
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Description</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Add a task Description" name="description" required>
                                            {{-- @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                    {{$errors->first('description')}}
                                                </span>
                                            @endif --}}
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Location</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Add a Location (Optional)" name="location">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save Task</button>
                            </form>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-striped table-responsive-sm">
                    <h2 class="ftitle">Your Tasks</h2>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Location</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( $todos as $todo)
                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td>{{ $todo->title }}</td>
                            <td>{{ $todo->description }}</td>
                            <td>{{ $todo->location }}</td>

                            <!--edit loop-->
                            <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$todo->id}}">Edit</button>
                            </td>
                            <!--edit loop ends-->
                            <!--edit modal-->
                            <div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$todo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ url ('edit/'.$todo->id)}}" method="POST" autocomplete="off">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}

                                                <div class="form-group">
                                                    <label for="formGroupExampleInput">Title</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput" name="title" value="{{$todo->title}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="formGroupExampleInput2">Description</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput2" name="description" value="{{$todo->description}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="formGroupExampleInput2">Location</label>
                                                        <input type="text" class="form-control" id="formGroupExampleInput3" name="location" value="{{$todo->location}}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete loop-->
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$todo->id}}">Delete</button>
                            </td>
                            <!-- delete loop ends-->
                            <!-- -->
                            <div class="modal fade" id="deleteModal{{$todo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Are you sure you want to delete this task? </p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ url('delete/'.$todo->id) }}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection


