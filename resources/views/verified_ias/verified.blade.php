@extends('verified_ias.base')
@section('action-content')

<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="box-title">List of Verification IAS (Verified)</h3>
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
                </br>
              @endcomponent
            </form>
            
            <div id="example_wrapper" class="dtaTables-Wrapper from-inline dt-bootstrep">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                    <th width="15%" class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Species: activate to sort column ascending">Species Name</th>
                                    <th width="25%" class="sorting hidden-xs text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Synonim: activate to sort column ascending">Invaded Habitat</th>
                                    <th width="25%" class="sorting hidden-xs text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Common_name: activate to sort column ascending">Distribution</th>
                                    <th width="15%" class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending">Status</th>
                                    <th width="20"  class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($speciment_ias as $ias)
                                    @if($ias->status == 2)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1 text-left">{{ $ias->name_species }}</td>
                                            <td class="sorting hidden-xs text-left">{!!$ias -> habitat!!}</td>
                                            <td class="sorting hidden-xs text-left">{!!$ias-> distribution!!}</td>
                                            <td class="sorting  text-center">
                                                @if($ias->status == '0' || $ias->status  == '1' )
                                                    <span style="color:red; text-align:center"><b>Unverified</b></span>
                                                @elseif($ias->status  == '2')
                                                    <span style="color:blue; text-align:center"><b>Verified</b></span>
                                                @endif
                                            </td>
                                            <td>
                                                <form class="row" method="POST" action="{{ route('invasive.destroy', ['id_ias' => $ias->id_ias]) }}" onsubmit = "return confirm('Are you sure?')"  style="text-align: center">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <a href="{{ route('invasive.show', ['id_ias' => $ias->id_ias]) }}" class="btn btn-success">View</a>
                                                    <a href="{{ route('invasive.edit', ['id_ias' => $ias->id_ias]) }}" class="btn btn-warning">Edit</a>
                                                    <button type="submit" class="btn btn-danger " data-method="delete" name="delete" style="margin-left:3 px">Delete</button>
                                                </form>
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