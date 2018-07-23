@extends('user.layouts.app-template')
@section('user.content')
<div class="container">
    <div class="panel-body" style="margin-top: 50px">
      	<div class="panel-heading" style="text-align: center"><h1>Invasive Alien Species</h1></div>
       		<ol class="breadcrumb">
       			<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Invasive Alien Species </li>
      		</ol>
          <div class="danger info col-md-12 text-center">
          <marquee>  <p><strong>Info! </strong>Click picture to show larger</p> </marquee>
          </div>
          <br><br><br>
          <div class="container col-md-6 col-md-offset-3 center" style="align-text:center" >
            <div class="row">
            <div class="panel panel-warning">
              <div class="panel-heading"><strong>Total specimen : {{$spec}}</strong></div>
              <div class="panel-body panel-default">
                 <ul class="list-group text-center">
                   <li class="list-group-item">Total Species : {{$species}}</li>
                   <li class="list-group-item">Total Family : {{$family}}</li>
                 </ul>
               </div>
              </div>
            </div>
          </div>

          <!-- search -->
          <div class="container col-md-12">
          <div class="row">
          <form method="GET" action="{{ route('invasive.search') }}">
                  {{ csrf_field() }}
                  @component('user.layouts.search', ['items' => ['name_species', 'name_family'],
                  'oldVals' => [isset($searchingVals) ? $searchingVals['name_species'] : '', isset($searchingVals) ? $searchingVals['name_family'] : '']])
                  @endcomponent
                  @component('user.layouts.search', ['items' => ['origin_species', 'habitat'],
                  'oldVals' => [isset($searchingVals) ? $searchingVals['origin_species'] : '', isset($searchingVals) ? $searchingVals['habitat'] : '']])
                  @endcomponent
                  <div class="col-md-6 col-md-offset-9">
                    <button type="submit" class="btn btn-primary" style="width:200px">
                      Search
                    </button>
                  </div>
              </form>
            </div>
          </div>
          <style>
            .danger {
            background-color: #b0e0e6;
            border-left: 6px solid #0070b7;
          }
          </style>
        <div class="row">
          <div class="col-md-12">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($iass)}} of {{count($iass)}} entries</div>
          </div>
        </div>

      <div class="table-responsive">

      		<table class="table table-bordered" id="mytable">
      			<thead>
      				<tr>
      					<th width="3%" class="text-center">No</th>
      					<th width="10%" class="text-center">Picture</th>
      					<th width="15%" class="text-center">Species</th>
                <th width="15%" class="text-center">Family</th>
                <th width="20%" class="text-center">Invaded Habitat</th>
                <th width="20%" class="text-center">Distribution</th>
      					<th width="4%" class="text-center">Action</th>
      				</tr>
      			</thead>
@foreach($iass as $ias)
            <tbody>
              <td class="text-center">{{$loop->index+1}}</td>
              <td class="text-center"><a href="" data-toggle="modal" data-target="#ModalImage{{$ias->id_ias}}" ><img src="{{asset('ias/' .$ias->picture_species)}}" style="width:60px;height:60px;float:center;"></a></td>
              <td class="text-center"><i>{{$ias -> name_species}}</i></td>
              <td class="text-center">{{$ias -> name_family}}</td>
              <td class="text-justify">{!!$ias -> habitat!!}</td>
              <td class="text-justify">{!!$ias -> distribution!!}</td>
              <td class="text-center"><a href="" class="btn btn-primary" role="button" data-toggle="modal" data-target="#ModalHerbarium{{$ias->id_ias}}"
                style="text-align: center">detail</a>
            </tbody>
@endforeach
      		</table>

      </div>

      <center>   {{ $iass->links() }} </center>

          <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($iass)}} of {{count($iass)}} entries</div>
          </div>

@foreach($iass as $ias)
<div class="modal fade in" id="ModalHerbarium{{$ias->id_ias}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" value="">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
        <div class="modal-header hidden-print">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
       </div>

       <!-- Modal Body -->
           <div class="modal-body">
            <div class="panel panel-lg-default">
              <div class="table-responsive">
                <table class="table table-striped">
                  <tr style="background-color:#4CAF50">
                    <td colspan="2" align="center" ><h3 style="color:white;"><strong><i>{{$ias -> name_species}}</i></strong></h3></td>
                  </tr>
                  <tr>
                    <td class="center"> Family </td>
                    <td class="center">: {{$ias -> name_family}}</td>
                   </tr>
                   <tr>
                     <td class="center"> Genus </td>
                     <td class="center">: {{$ias -> name_genus}}</td>
                   </tr>
                  <tr>
                    <td class="center"> Synonim </td>
                    <td class="center">: {!! $ias -> species_synonim !!}</td>
                 </tr>
                 <tr>
                   <td class="center"> Origin </td>
                   <td class="center">: {!! $ias -> origin_species !!}</td>
                 </tr>
                  <tr>
                    <td class="center"> Description </td>
                    <td class="center">: {!! $ias -> description_species !!}</td>
                  </tr>
                 <tr>
                   <td class="center"> Invaded Habitat </td>
                   <td class="center">: {!! $ias -> habitat !!}</td>
                </tr>
                <tr>
                  <td class="center"> Disribution </td>
                  <td class="center">: {!! $ias -> distribution !!}</td>
               </tr>
               <tr>
                 @if($ias -> ecology != null)
                 <td class="center"> Ecology </td>
                 <td class="center">: {!! $ias -> ecology !!}</td>
                 @endif
              </tr>
              <tr>
                  @if($ias -> common_name != null)
                <td class="center"> Common Name </td>
                <td class="center">: {!! $ias -> common_name !!}</td>
                  @endif
             </tr>
            </table>
            <br><br>

            @if($ias -> manual_ctrl !=null && $ias->chemical_ctrl != null && $ias->biologycal_ctrl!=null)
            <caption><strong><h3>Control</h3></strong></caption>
            <table class="table table-striped">
              <tr>
                @if($ias -> manual_ctrl != null)
                <td class="center"> Manual Control </td>
                <td class="center">: {!! $ias -> manual_ctrl !!}</td>
                @endif
             </tr>
             <tr>
                @if($ias -> chemical_ctrl != null)
               <td class="center"> Chemical Control </td>
               <td class="center">: {!! $ias -> chemical_ctrl !!}</td>
               @endif
            </tr>
            <tr>
              @if($ias -> biologycal_ctrl != null)
              <td class="center"> Biological Control </td>
              <td class="center">: {!! $ias -> biologycal_ctrl !!}</td>
              @endif
           </tr>
         </table>
           <br><br>
           @endif


           <caption><strong><h3>Reference</h3></strong></caption>
           <table class="table table-striped">
             <tr>
              @if($ias -> prevention != null)
               <td class="center"> Prevention </td>
               <td class="center">: {!! $ias -> prevention !!}</td>
               @endif
            </tr>
            <tr>
              @if($ias -> utilization != null)
              <td class="center"> Utilization </td>
              <td class="center">: {!! $ias -> utilization !!}</td>
              @endif
           </tr>
           <tr>
               @if($ias -> risk_analisis != null)
             <td class="center"> Risk Analysis </td>
             <td class="center">: {!! $ias -> risk_analisis !!}</td>
             @endif
          </tr>
              <tr>
                <td class="center"> Reference </td>
                <td class="center">: {!! $ias -> reference !!}</td>
             </tr>
              </table>
            </div>
          </div>
        </div>

    </div>
  </div>
</div>
@endforeach

<!-- modal image -->
@foreach($iass as $ias)
<div class="modal fade in" id="ModalImage{{$ias->id_ias}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" value="">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
        <div class="modal-header hidden-print">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
       </div>
       <!-- Modal Body -->
           <div class="modal-body">
            <div class="panel panel-lg-default">
               <div class="table-responsive">
              <!-- picture -->
                <div class="col-md-12" style="text-align:center">
                    <div  id="myCarousel" class="carousel slide" style="text-align:center">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                      </ol>

                      <div class="carousel-inner">
                      @if($ias -> picture_species != null)
                        <div class="item active"   style="text-align: center">
                          <img src="{{asset('ias/'.$ias->picture_species)}}" style="width:100%" class="img-responsive"/>
                        </div>
                      @endif
                      @if($ias -> picture_species2 != null)
                        <div class="item"   style="text-align: center">
                          <img src="{{asset('ias/'.$ias->picture_species2)}}" style="width:100%"  class="img-responsive">
                        </div>
                        @endif

                        @if($ias -> picture_species3 != null)
                        <div class="item"   style="text-align: center">
                          <img src="{{asset('ias/'.$ias->picture_species3)}}" style="width:100%" class="img-responsive">
                        </div>
                        @endif
                      </div>

                      <!-- Controls -->
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="icon-prev"></span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="icon-next"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
     </div>
   </div>
 </div>
@endforeach
    </div>
</div>
@endsection
