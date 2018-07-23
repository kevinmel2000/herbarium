@extends('verified_ias.base')
@section('action-content')

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="box-title">List of Verification IAS (Unverified)</h3>
                </div>
            </div>
        </div>
  <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6"></div>
            </div>
            
            <form method="POST" action="{{ url('invasive/search') }}">
            {{ csrf_field() }}
              @component('layouts.search', ['title' => 'Search'])
                @component('layouts.two-cols-search-row', ['items' => ['Species Name','Family Name'],
                'oldVals' => [isset($searchingVals) ? $searchingVals['species_name'] : '', isset($searchingVals) ? $searchingVals['family_name'] : '',]])
                @endcomponent
                @component('layouts.two-cols-search-row', ['items' => ['Habitat','Origin'],
                'oldVals' => [isset($searchingVals) ? $searchingVals['habitat'] : '', isset($searchingVals) ? $searchingVals['origin_species'] : '',]])
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
                                        <th width="20%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-lable="Collector: activate to sort column descending" aria-sort="ascending" style="text-align:center">Species</th>
                                        <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-lable="Species: activate to sort column descending" aria-sort="ascending" style="text-align:center">Verification</th>
                                        <th width="25%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-lable="Id: activate to sort column descending" aria-sort="ascending" style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($speciment_ias as $ias)
                                        @if($ias->status == 0 || $ias->status == 1)
                                            <tr role="row" class="odd">
                                                <td class="sorting hidden-xs text-left">{{ $ias->name_species }}</td>
                                                <td class="sorting  text-center">
                                                    @if($ias->status == '0' || $ias->status  == '1')
                                                        <span style="color:red; text-align:center"><b>Unverified</b></span>
                                                    @elseif($ias->status  == '2')
                                                        <span style="color:blue; text-align:center"><b>Verified</b></span>
                                                    @endif
                                                </td>
                                                <td class="sorting_1 text-center">
                                                    <a href="{{ route('verified_ias.view', ['id_herba' => $ias->id_ias]) }}" class="btn btn-success">View</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach    
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($speciment_ias)}} of {{count($speciment_ias)}} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            {{ $speciment_ias->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>

@endsection
