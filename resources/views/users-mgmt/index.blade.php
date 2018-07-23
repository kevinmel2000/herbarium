@extends('users-mgmt.base')
@section('action-content')

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
            <h3 class="box-title">List of users</h3>
        </div>
        
        <div class="col-sm-4 text-right">
            <a class="btn btn-primary"  href="{{ route('user-management.create') }}">Add new user</a>
        </div>
      </div>
    </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
     
      <form method="POST" action="{{ route('user-management.search') }}">
          {{ csrf_field() }}
          @component('layouts.search', ['title' => 'Search'])
            @component('layouts.two-cols-search-row', ['items' => ['User Name', 'First Name'],
            'oldVals' => [isset($searchingVals) ? $searchingVals['username'] : '', isset($searchingVals) ? $searchingVals['firstname'] : '']])
            @endcomponent
            </br>
          @endcomponent
      </form>
    
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="15%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending" style="text-align:center">User Name</th>
                <th width="18%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="text-align:center">Email</th>
                <th width="15%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="text-align:center">First Name</th>
                <th width="15%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="text-align:center">Last Name</th>
                <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="text-align:center">User Type</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending" style="text-align:center">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr role="row" class="odd">
                  <td class="sorting_1">
                      <h5>{{ $user->username }}</h5>
                  </td>
                  <td class="hidden-xs">
                      <h5>{{ $user->email }} </h5>
                  </td>
                  <td class="sorting_1">
                      <h5>{{ $user->firstname }}</h5>
                  </td>
                  <td class="hidden-xs">
                      <h5>{{ $user->lastname }}</h5>
                  </td>
                  <td >
                      @if($user->user_type == '0')
                        <h5> Admin</h5>
                      @elseif($user->user_type == '1')
                        <h5> Operator</h5>
                      @elseif($user->user_type == '2')
                        <h5> Verifikator </h5>
                      @endif
                  </td>
                  <td>
                    <form class="row" method="POST" action="{{ route('user-management.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('Are you sure?')" style="text-align: center">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('user-management.edit', ['id' => $user->id]) }}" class="btn btn-warning " >Edit</a>
                        
                        @if ($user->username != Auth::user()->username)
                         <button type="submit" class="btn btn-danger " style="margin-left:3 px">Delete</button>
                        @endif

                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
            <!-- <tfoot>
              <tr>
                <th width="10%" rowspan="1" colspan="1">User Name</th>
                <th width="20%" rowspan="1" colspan="1">Email</th>
                <th class="hidden-xs" width="20%" rowspan="1" colspan="1">First Name</th>
                <th class="hidden-xs" width="20%" rowspan="1" colspan="1">Last Name</th>
                <th rowspan="1" colspan="2">Action</th>
              </tr>
            </tfoot> -->
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($users)}} of {{count($users)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  </div>
</section>
    <!-- /.content -->
  </div>
@endsection
