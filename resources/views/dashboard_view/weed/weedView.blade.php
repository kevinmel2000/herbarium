@extends('dashboard_view.weed.baseWeedView')

@section('action-content')
    <section class="content">   
        <div class="box">
            <!--Box Header-->
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-17">
                                    <div class="box-title">
                                        <h4>
                                            Number Weed Herbarium
                                        </h4>
                                    </div>
                                    <!-- Box -->
                                    <div class="box">
                                        <div class="box-body">
                                        <div class=" col-md-12" style="margin-leaft: 10px">
                                            @foreach($tasks as $task)
                                                <h5> 
                                                    {{ $task['name'] }}
                                                    <buttom type="button col-sm-1" class="btn btn-{{$task['color']}} pull-right">{{$task['progress']}}</button>
                                                </h5> 
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-{{$task['color']}}" style="width: {{$task['progress']}}%"></div>
                                                </div>
                                            @endforeach

                                        </div><!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </section>
@endsection
<!--@section('action-content')

    <section class="content">
        <div class="box">
            <!--Box Header
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">
                            Number Weed Herbarium
                        </h3>
                    </div>
                </div>
            </div>

            <!--Box Content
            <div class="box-body">  
                <div class="col-sm-12" >
                    <div class="col=md-8" style="margin-top:10px">
                        <label style="text-align: leaf">
                            <h4="box-title">Family</h4>
                        </label>
                    </div>
                    <div class="col=md-12">
                        <div class="col-md-9">
                            <div class="progress col-sm-offset-1">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-5" style="text-align:center">
                                <b>300</b>
                                <br>
                            <div>
                            <div class="col-md-5" >
                                <button type="button" class="btn btn-warning col-md-offset-11">View</button>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="col-sm-12" >
                    <div class="col=md-8" style="margin-top:10px">
                        <label style="text-align: leaf">
                            <h4="box-title">Family</h4>
                        </label>
                    </div>
                    <div class="col=md-12">
                        <div class="col-md-9">
                            <div class="progress col-sm-offset-1">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-5" style="text-align:center">
                                <b>300</b>
                                <br>
                            <div>
                            <div class="col-md-5" >
                                <button type="button" class="btn btn-warning col-md-offset-11">View</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection

-->

<!--div class="box box-default col-sm-10">                
                    <div class="col-sm-6">
                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="margin-top:10px">
                            <thead>
                                <tr role="row">
                                    <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Label_Herbarium: activate to sort column descending" aria-sort="ascending" style="text-align: center">Taxsonomy</th>
                                    <th width="5%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-lable="Species: activate to sort column descending" aria-sort="ascending" style="text-align:center">Amouth</th>
                                    <th width="5%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-lable="Collector: activate to sort column descending" aria-sort="ascending" style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row">
                                    <td> Family</td>
                                    <td style="text-align: center"> 12</td>
                                    <td style="text-align: center"> 
                                        <button class="btn btn-warning" type="button" style="text-align: center"> View</button>
                                    </td>
                                </tr>
                                <tr role="row">
                                    <td> Genus</td>
                                    <td style="text-align: center"> 12</td>
                                    <td style="text-align: center"> 
                                        <button class="btn btn-warning" type="button" style="text-align: center"> View</button>
                                    </td>
                                </tr>
                                <tr role="row">
                                    <td>Species</td>
                                    <td style="text-align: center"> 12</td>
                                    <td style="text-align: center"> 
                                        <button class="btn btn-warning" type="button" style="text-align: center"> View</button>
                                    </td>
                                </tr>
                                <tr role="row">
                                    <td> Collector</td>
                                    <td style="text-align: center"> 12</td>
                                    <td style="text-align: center"> 
                                        <button class="btn btn-warning" type="button" style="text-align: center"> View</button>
                                    </td>
                                </tr>
                                <tr role="row">
                                    <td> Determine</td>
                                    <td style="text-align: center"> 12</td>
                                    <td style="text-align: center"> 
                                        <button class="btn btn-warning" type="button" style="text-align: center"> View</button>
                                    </td>
                                </tr>                            
                            </tbody>
                        </table>
                    </div>
                </div-->
