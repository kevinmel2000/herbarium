@extends('herbarium.brioherba.base')

@section('action-content')
    
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">
                            List of Weed Herbarium
                        </h3>
                    </div>
                    <div class="col-sm-4 text-right">
                        <a class="btn btn-primary" href="{{route('brioherba.create')}}">Add new Collection</a>
                    </div>
                </div>
            </div>

            <!-- Box Header-->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <form method="POST" action="{{ route('brioherba.search') }}">
                        {{ csrf_field() }}
                            <div class="col-md-4 pull-right">
                                <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="example_wrapper" class="dtaTables-Wrapper from-inline dt-bootstrep">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Label_Herbarium: activate to sort column descending" aria-sort="ascending" style="text-align: center">Specimen Number</th>
                                        <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-lable="Species: activate to sort column descending" aria-sort="ascending" style="text-align:center">Species</th>
                                        <th width="12%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-lable="Collector: activate to sort column descending" aria-sort="ascending" style="text-align:center">Collector</th>
                                        <th width="12%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-lable="Determinate: activate to sort column descending" aria-sort="ascending" style="text-align:center">Determine</th>
                                        <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-lable="Species: activate to sort column descending" aria-sort="ascending" style="text-align:center">Verification</th>
                                        <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-lable="Id: activate to sort column descending" aria-sort="ascending" style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($speciment_herbarium as $herba)
                                         @if($herba->user_type == Auth::user()->user_type)
                                            @if($herba->type_herbarium == 3)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center">{{ $herba->label }}</td>
                                                    <td class="sorting hidden-xs text-left">{{ $herba->name_species }}</td>
                                                    <td class="sorting hidden-xs text-left">{{ $herba->name_collector }}</td>
                                                    <td class="sorting  text-left">{{ $herba->name_author }}</td>
                                                    <td class="sorting  text-center">
                                                        @if($herba->status == '0')
                                                            <span style="color:green; text-align:center"><b>Process</b></span>
                                                        @elseif($herba->status  == '1')
                                                        <span style="color:red; text-align:center"><b>Unverified</b></span>
                                                        @elseif($herba->status  == '2')
                                                        <span style="color:blue; text-align:center"><b>Verified</b></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form class="row" method="POST" action="{{ route('brioherba.destroy', ['id_herba' => $herba->id_herbarium]) }}" onsubmit = "return confirm('Are you sure?')"  style="text-align: center">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <a href="{{ route('brioherba.show', ['id_herba' => $herba->id_herbarium]) }}" class="btn btn-success">View</a>
                                                            <a href="{{ route('brioherba.edit', ['id_herba' => $herba->id_herbarium]) }}" class="btn btn-warning">Edit</a>
                                                            <button type="submit" class="btn btn-danger " data-method="delete" name="delete" style="margin-left:3 px">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($speciment_herbarium)}} of {{count($speciment_herbarium)}} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            {{ $speciment_herbarium->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection