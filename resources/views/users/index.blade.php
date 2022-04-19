@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User </a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered" id="user-table">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Photo</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr class="table-row-{{$user->id}}" data-id="{{$user->id}}">
    <td class="number">{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td><img src="{{ asset('/storage/img/'. $user->avatar) }}" style="height:50px"></td>
    <td>{{ $user->email }}</td>

    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success text-dark">{{ $v }}</label>
       
        @endforeach
      @endif
    </td>
    <td>
     @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           
          @if ($v === 'Admin') 
            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
            <!-- <a class="btn btn-primary" href="{{ route('users.edit',$user->id, $user->avatar) }}">Edit</a> -->
           
          @else
            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id, $user->avatar) }}">Edit</a>
            <!-- {!! Form::open(['method' => 'POST','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! method_field('DELETE') !!}
            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete-confirm', 'id' =>'delete', 'data-id' => '{{$user-id}}') ) !!}
            {!! Form::close() !!} -->
            <!-- <form action="{{ route('users.destroy', $user->id)   }}" method="POST" style="display:inline" >
            @csrf
            @method('DELETE')  -->
              <input type="button" class="btn btn-danger delete-confirm" data-id="{{$user->id}}" value="Delete">
            <!-- </form> -->


           
           @endif
       
        @endforeach
        
           <!-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
           <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!} -->
        
   
      @endif

    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection