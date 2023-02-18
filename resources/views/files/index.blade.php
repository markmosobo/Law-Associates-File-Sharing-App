@extends('layouts.master')
 
@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Files</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('files.create') }}"> Create New File</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($files as $file)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $file->name }}</td>
            <td>{{ $file->detail }}</td>
            <td>
                <form action="{{ route('files.destroy',$file->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('files.show',$file->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('files.edit',$file->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $files->links() !!}
      
@endsection