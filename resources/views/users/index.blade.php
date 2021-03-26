{{-- Extends layout --}}

@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom">
        
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Team Management
                
            </h3>
            
            
        </div>
        
    </div>
    
    <div class="card-body">
        
        <!--begin: Search Form-->
        <!--begin::Search Form-->
        <div class="mb-7">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="row align-items-center">
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query"/>
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                @can('role-create')
                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                    <a href="{{ route('users.create') }}" class="btn btn-light-primary px-6 font-weight-bold">Add New Team Member</a>
                </div>
                @endcan
            </div>
        </div>
        <!--end::Search Form-->
        <!--end: Search Form-->
        <!--begin: Datatable-->
        <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
            <thead>
            <tr>
                <th title="Field #2">Name</th>
                <th title="Field #2">Phone</th>
                <th title="Field #2">Email</th>
                <th title="Field #2">Username</th>
                
                <th title="Field #3">Options</th>
                
            </tr>
            </thead>
            <tbody>
                
                @foreach ($users as $user)
                <tr>
                    
                    <td>{{$user->name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->username}}</td>
                    
                    
                    {{-- <td>{{$user->}}</td> --}}
                    <td>
                        {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> --}}
              @can('team-edit')
                  <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
              @endcan
              @can('team-delete')
                  {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
              @endcan
                    </td>
                </tr>
                @endforeach
            
            </tbody>
        </table>
        
        <!--end: Datatable-->
    </div>
</div>





@endsection


{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')

    <script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
    
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        
        $('.dropdown-toggle').dropdown();
    
    </script>
@endsection




