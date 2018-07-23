@extends('verified_herba.forestherba.base')
@section('action-content')

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="box-title">List of Verification Forest Herbarium (Unverified)</h3>
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
                    @component('layouts.two-cols-search-row', ['items' => ['Species Name', 'Verification'],
                    'oldVals' => [isset($searchingVals) ? $searchingVals['species_name'] : '', isset($searchingVals) ? $searchingVals['varified'] : '']])
                    @endcomponent
                    </br>
                @endcomponent
            </form>
            
            <div id="example_wrapper" class="dtaTables-Wrapper from-inline dt-bootstrep">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th width="5%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Label_Herbarium: activate to sort column descending" aria-sort="ascending" style="text-align: center">No</th>
                                        <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-lable="Collector: activate to sort column descending" aria-sort="ascending" style="text-align:center">Species</th>
                                        <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-lable="Species: activate to sort column descending" aria-sort="ascending" style="text-align:center">Verification</th>
                                        <th width="25%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-lable="Id: activate to sort column descending" aria-sort="ascending" style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($speciment_herbarium as $herba)
                                        @if($herba->type== 2)
                                            @if($herba->status == 0 || $herba->status == 1)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center">{{$loop->index+1}}</td>
                                                    <td class="sorting hidden-xs text-left">{{ $herba->name_species }}</td>
                                                    <td class="sorting  text-center">
                                                        @if($herba->status == '0' || $herba->status  == '1')
                                                            <span style="color:red; text-align:center"><b>Unverified</b></span>
                                                        @elseif($herba->status  == '2')
                                                            <span style="color:blue; text-align:center"><b>Verified</b></span>
                                                        @endif
                                                    </td>
                                                    <td class="sorting_1 text-center">
                                                        <a href="{{ route('forestherba.view', ['id_herba' => $herba->id_herbarium]) }}" class="btn btn-success">View</a>
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
