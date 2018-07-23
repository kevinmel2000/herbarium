@extends('user.layouts.app-template')
@section('user.content')
<br><br>
<div class="container">
    <div class="panel-body">
        <div class="panel-heading" style="text-align: center"><h1>Briovitas Herbarium</h1></div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
                  <a href="{{url('/')}}">Home</a>
            </li>
              <li class="breadcrumb-item active">Herbarium</li>
              <li class="breadcrumb-item active">Briovitas Herbarium</li>
          </ol>

          <!-- Info -->
          <div class="danger info col-md-12 text-center">
            <marquee> <p><strong>Info! </strong>Click picture to show larger</p> </marquee>
          </div>
          <br><br><br>

          <style>
            .danger {
            background-color: #b0e0e6;
            border-left: 6px solid #0070b7;
          }
          </style>

          <!-- search -->
          <div class="container col-md-12">
            <div class="row">
              <form method="POST" action="{{ route('briovitasherbarium.search') }}">
                  {{ csrf_field() }}
                  @component('user.layouts.search', ['items' => ['name_species', 'name_family'],
                  'oldVals' => [isset($searchingVals) ? $searchingVals['name_species'] : '', isset($searchingVals) ? $searchingVals['name_family'] : '']])
                  @endcomponent
                  @component('user.layouts.search', ['items' => ['name_collector', 'name_author'],
                  'oldVals' => [isset($searchingVals) ? $searchingVals['name_collector'] : '', isset($searchingVals) ? $searchingVals['name_author'] : '']])
                  @endcomponent
                  <div class="col-md-3 col-md-offset-5">
                    <button type="submit" class="btn btn-primary" style="width:200px">
                      Search
                    </button>
                  </div>
              </form>
            </div>
          </div>
          <!-- Show page -->
          <div class="row">
            <div class="col-md-12">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($briovitas)}} of {{count($briovitas)}} entries</div>
            </div>
          </div>
        <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
              <tr>
                <th width="3%" class="text-center">No</th>
      					<th width="10%" class="text-center">Specimen Number</th>
                <th width="15%" class="text-center">Picture</th>
      					<th width="15%" class="text-center">Species</th>
                <th width="15%" class="text-center">Family</th>
      					<th width="15%" class="text-center">Collector</th>
      					<th width="17%" class="text-center">Date Collection</th>
      					<th width="20%" class="text-center">Determine by</th>
      					<th width="5%" class="text-center">Action</th>
      				</tr>
              </tr>
            </thead>
            @foreach($briovitas as $brio)
            <tbody>
              <td class="text-center">{{$loop->index+1}}</td>
              <td class="text-center">{{$brio -> label}}</td>
              <td class="text-center"><a href="" data-toggle="modal" data-target="#ModalImage{{$brio->id_herbarium}}" ><img src="{{asset('herba/'.$brio->picture_species)}}" style="width:60px;height:60px;float:center;"></a></td>
              <td class="text-center"><i>{{$brio -> name_species}}</i></td>
              <td class="text-center">{{$brio -> name_family}}</td>
              <td class="text-justify">{{$brio -> name_collector}}</td>
              <td class="text-justify">{{$brio -> date_collection}}</td>
              <td class="text-justify">{{$brio -> name_author}}, {{$brio -> date_ident}}</td>
              <td class="text-center"><a href="" class="btn btn-primary" role="button" data-toggle="modal" data-target="#ModalHerbarium{{$brio->id_herbarium}}"
              style="text-align: center">detail</a>
            </tbody>
            @endforeach
          </table>
        </div>
@foreach($briovitas as $brio)
        <div class="modal fade in" id="ModalHerbarium{{$brio->id_herbarium}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" value="">
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
                        <td colspan="2" align="center" ><h3 style="color:white;"><strong><i>{{$brio -> name_species}}</i>, {{$brio-> subspecies}}</strong></h3></td>
                      </tr>
                      <tr>
                        <td class="center"> Family </td>
                        <td class="center">: {{$brio -> name_family}}</td>
                       </tr>
                       <tr>
                         <td class="center"> Genus </td>
                         <td class="center">: {{$brio -> name_genus}}</td>
                        </tr>
                        <tr>
                          @if($brio -> species_synonim != null)
                          <td class="center">Synonim</td>
                          <td class="center">: {!! $brio -> species_synonim !!}</td>
                          @endif
                        </tr>
                        <tr>
                          @if($brio -> variety != null)
                          <td class="center">Variety</td>
                          <td class="center">: {!! $brio -> variety !!}</td>
                          @endif
                        </tr>
                        <tr>
                          @if($brio -> origin_species != null)
                          <td class="center">Origin</td>
                          <td class="center">: {!! $brio -> origin_species !!}</td>
                          @endif
                        </tr>
                        <tr>
                          @if($brio -> venacular_name != null)
                          <td class="center">Vernacular name</td>
                          <td class="center">: {!! $brio -> venacular_name !!}</td>
                          @endif
                        </tr>
                        <tr>
                           @if($brio -> description_species != null)
                          <td class="center">Description</td>
                          <td class="center">: {!! $brio -> description_species !!}<td>
                          @endif
                        </tr>
                        <tr>
                           @if($brio -> notes != null)
                          <td class="center">Notes</td>
                          <td class="center">: {!! $brio -> notes !!}</td>
                          @endif
                        </tr>
                     </table><br><br>
                     <caption><strong><h3>Data Set</h3></strong></caption>
                     <table  class="table table-striped">
                       <tr>
                         @if($brio -> name_collector != null)
                         <td class="center">Collector Name</td>
                         <td class="center">: {!! $brio -> name_collector !!}</td>
                         @endif
                       </tr>
                       <tr>
                         @if($brio -> tim_collector != null)
                         <td class="center">Tim Collector</td>
                         <td class="center">: {!! $brio -> tim_collector !!}</td>
                         @endif
                       </tr>
                       <tr>
                          @if($brio -> date_collection != null)
                         <td class="center">Collector Date</td>
                         <td class="center">: {!! $brio -> date_collection !!}</td>
                         @endif
                       </tr>
                       <tr>
                          @if($brio -> name_author != null)
                         <td class="center">Determine by</td>
                         <td class="center">: {!! $brio -> name_author !!} , {!! $brio-> date_ident !!}</td>
                         @endif
                       </tr>
                       <tr>
                          @if($brio -> agency != null)
                         <td class="center">Address Determine</td>
                         <td class="center">: {!! $brio -> agency !!}</td>
                         @endif
                       </tr>
                    </table><br><br>
                     <caption><strong><h3>Location</h3></strong></caption>
                     <table  class="table table-striped">
                       <tr>
                         <td class="center">Country</td>
                         <td class="center">: {{$brio -> name}}</td>
                       </tr>
                       <tr>
                         <td class="center">Province</td>
                         <td class="center">: {{$brio -> name}}</td>
                       </tr>
                       <tr>
                         <td class="center">City</td>
                         <td class="center">: {{$brio -> name}}</td>
                       </tr>
                       <tr>
                         <td class="center">District</td>
                         <td class="center">: {{$brio -> name}}</td>
                       </tr>
                       <tr>
                           @if($brio -> vilage != null)
                         <td class="center">Village</td>
                         <td class="center">: {{$brio -> vilage}}</td>
                         @endif
                       </tr>
                       <tr>
                          @if($brio -> latitude != null)
                         <td class="center">Latitude</td>
                         <td class="center">: {{$brio -> latitude}}</td>
                         @endif
                       </tr>
                       <tr>
                         @if($brio -> longitude != null)
                         <td class="center">Longitude</td>
                         <td class="center">: {{$brio -> longitude}}</td>
                         @endif
                       </tr>
                       <tr>
                         @if($brio -> atitude != null)
                         <td class="center">Altitude</td>
                         <td class="center">: {{$brio -> atitude}} m</td>
                         @endif
                       </tr>
                     </table><br><br>
                     <!-- picture -->
                  <div class="col-md-8 col-md-offset-2">
                   <div  id="myCarousel" class="carousel slide" style="text-align:center">
                     <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                        <li data-target="#myCarousel" data-slide-to="5"></li>
                      </ol>
                      <div class="carousel-inner">
                         @if($brio -> picture_species != null)
                        <div class="item active"   style="text-align: center">
                         <img src="{{asset('herba/'.$brio->picture_species)}}" style="width:100%" class="img-responsive"/>
                        </div>
                        @endif
                        @if($brio -> picture_species2 != null)
                        <div class="item"   style="text-align: center">
                          <img src="{{asset('herba/'.$brio->picture_species2)}}" style="width:100%"  class="img-responsive">
                        </div>
                        @endif
                        @if($brio -> picture_species3 != null)
                        <div class="item"   style="text-align: center">
                          <img src="{{asset('herba/'.$brio->picture_species3)}}" style="width:100%" class="img-responsive">
                        </div>
                        @endif
                        @if($brio -> picture_species4 != null)
                        <div class="item"   style="text-align: center">
                          <img src="{{asset('herba/'.$brio->picture_species4)}}" style="width:100%" class="img-responsive">
                        </div>
                        @endif
                        @if($brio -> picture_species5 != null)
                        <div class="item"   style="text-align: center">
                          <img src="{{asset('herba/'.$brio->picture_species5)}}" style="width:100%" class="img-responsive">
                        </div>
                        @endif
                        @if($brio -> picture_species6 != null)
                        <div class="item"   style="text-align: center">
                          <img src="{{asset('herba/'.$brio->picture_species6)}}" style="width:100%" class="img-responsive">
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
        @foreach($briovitas as $brio)
        <div class="modal fade in" id="ModalImage{{$brio->id_herbarium}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" value="">
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
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                                <li data-target="#myCarousel" data-slide-to="4"></li>
                                <li data-target="#myCarousel" data-slide-to="5"></li>
                              </ol>

                              <div class="carousel-inner">
                                <div class="item active"   style="text-align: center">
                                  <img src="{{asset('herba/'.$brio->picture_species)}}" style="width:100%" class="img-responsive"/>
                                </div>

                                <div class="item"   style="text-align: center">
                                  <img src="{{asset('herba/'.$brio->picture_species2)}}" style="width:100%"  class="img-responsive">
                                </div>

                                <div class="item"   style="text-align: center">
                                  <img src="{{asset('herba/'.$brio->picture_species3)}}" style="width:100%" class="img-responsive">
                                </div>

                                <div class="item"   style="text-align: center">
                                  <img src="{{asset('herba/'.$brio->picture_species4)}}" style="width:100%" class="img-responsive">
                                </div>

                                <div class="item"   style="text-align: center">
                                  <img src="{{asset('herba/'.$brio->picture_species5)}}" style="width:100%" class="img-responsive">
                                </div>

                                <div class="item"   style="text-align: center">
                                  <img src="{{asset('herba/'.$brio->picture_species6)}}" style="width:100%" class="img-responsive">
                                </div>
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
        <style>
        /* Carousel base class */
        .carousel {
          margin-bottom: 60px;
        }
        /* Since positioning the image, we need to help out the caption */
        .carousel-caption {
          z-index: 1;
        }

        /* Declare heights because of positioning of img element */
        .carousel .item {
          height: 500px;
          background-color:#555;
        }
        .carousel img {
          position: absolute;
          top: 0;
          left: 5px;
          min-height: 400px;
        }

        </style>
