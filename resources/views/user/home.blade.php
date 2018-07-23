@extends('user.layouts.app-template')
@section('user.content')



<div id="myCarousel" class="carousel slide" data-ride="carousel" style="max-height:1000px">
    <!-- Indicators-->
    <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0"></li>
          <li data-target="#myCarousel" data-slide-to="1"class="active"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides-->
    <div class="carousel-inner">
        <div class="item">
            <a href="{{url('/imageuih', $pic1)}}" target="_blank">
                <img class="img-rounded img-responsive" src="{{asset('biotrop/' .$pic1)}}" id="showgambar" style="width:100%;max-height:100%;float:left;" />
            </a>
        </div>
  
        <div class="item active">
            <a href="{{url('/imageuih',$pic2)}}" target="_blank">
                <img class="img-rounded img-responsive" src="{{asset('biotrop/' .$pic2)}}" id="showgambar" style="width:100%;max-height:100%;float:left;" />
            </a>
        </div>
    
        <div class="item">
            <a href="{{url('/imageuih',$pic3)}}" target="_blank">
                <img class="img-rounded img-responsive" src="{{asset('biotrop/' .$pic3)}}" id="showgambar" style="width:100%;max-height:100%;float:left;" />
            </a>
        </div>
    </div>

    <!-- Left and right controls-->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="container" >
  <div class="text-center"><strong><h1>Our Collections</h1></strong></div>
    <div class="row">
      <div class="col-md-6 text-center">
        <h2> Herbarium </h2>
        <h4> <p class="text-muted text-justify">An herbarium is a repository of preserved and labeled plant specimens, arranged to allow easy access and archival storage. The specimens are typically in the form of herbarium sheets: pressed and dried plants that have been glued or sewn to a sheet of heavy paper together with a data label. The label describes useful information including the plant's Latin name, the origin of the collection, the date of collection, and the name of the collector.</p></h4>
      </div>

      <div class="col-md-6 text-center">
        <h2> Invasive Alien Species </h2>
        <h4> <p class="text-muted text-justify">Invasive alien species (IAS) are species whose introduction and/or spread outside their natural past or present distribution threatens biological diversity.IAS occur in all taxonomic groups, including animals, plants, fungi and microorganisms, and can affect all types of ecosystems. While a small percentage of organisms transported to new environments become invasive, the negative impacts can be extensive and over time, these additions become substantial. </p></h4>
      </div><br><br>

    </div>
</div>

<!-- Portfolio Section -->
 <div class="container">
   <div class="panel-body">
  	 <div class="panel-heading"><h3>Collections</h3></div>
     	 <div class="row">
        
@foreach($terbaru as $terbaru)
          <div class="col-sm-6 col-md-4">
              <div class="img-responsive img-thumbnail thumbnail" style="width:400px; height:550px;">
                <img src="{{asset('herba/'.$terbaru->picture_species)}}" style="width:400px;height:350px;float:left;" />
                  <div class="caption text-center">
                  <h3><i> {{$terbaru -> name_species}} </i></h3>
                        <tr>
                          <td>Collector name </td>
                          <td>: {{$terbaru -> name_collector}}</td>
                        </tr><br>
                        <tr>
                          <td >Determine by </td>
                          <td >: {{$terbaru ->name_author }}</td>
                        </tr>
                      <br><br>
                        <a href="" class="btn btn-primary" role="button" data-toggle="modal" data-target="#ModalHerbarium{{$terbaru->id_herbarium}}"
                          style="text-align: center">detail</a>
                  </div>
              </div>
        </div>


    <!-- Modal Detail Paket-->
      <div class="modal fade in" id="ModalHerbarium{{$terbaru->id_herbarium}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" value="">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
            </div>

            <div class="modal-body">
             <div class="panel panel-lg-default">
               <div class="table-responsive">
                 <table class="table table-striped">
                   <tr style="background-color:#4CAF50">
                     <td colspan="2" align="center" >
                       <h3 style="color:white;">
                         <strong><i>{{$terbaru -> name_species}}</i>, {{$terbaru->subspecies}}</strong></h3>
                     </td>
                   </tr>
                   <tr>
                     <td class="center"> Family </td>
                     <td class="center">: {{$terbaru -> name_family}}</td>
                  </tr>
                  <tr>
                    <td class="center"> Genus </td>
                    <td class="center">: {{$terbaru -> name_genus}}</td>
                  </tr>
                  <tr>
                    @if($terbaru -> species_synonim != null)
                    <td class="center">Synonim</td>
                    <td class="center">: {!! $terbaru -> species_synonim !!}</td>
                    @endif
                  </tr>
                  <tr>
                    @if($terbaru -> variety != null)
                    <td class="center">Variety</td>
                    <td class="center">: {!! $terbaru -> variety !!}</td>
                    @endif
                  </tr>
                  <tr>
                    @if($terbaru -> origin_species != null)
                    <td class="center">Origin</td>
                    <td class="center">: {!! $terbaru -> origin_species !!}</td>
                    @endif
                  </tr>
                  <tr>
                    @if($terbaru -> venacular_name != null)
                    <td class="center">Vernacular name</td>
                    <td class="center">: {!! $terbaru -> venacular_name !!}</td>
                    @endif
                  </tr>
                  <tr>
                     @if($terbaru -> description_species != null)
                    <td class="center">Description</td>
                    <td class="center">: {!! $terbaru -> description_species !!}<td>
                    @endif
                  </tr>
                  <tr>
                     @if($terbaru -> notes != null)
                    <td class="center">Notes</td>
                    <td class="center">: {!! $terbaru -> notes !!}</td>
                    @endif
                  </tr>
                </table>
                <br><br>
                <caption><strong><h3>Data set</h3></strong></caption>
                  <table class="table table-striped">
                  <tr>
                    @if($terbaru -> name_collector != null)
                    <td class="center">Collector Name</td>
                    <td class="center">: {!! $terbaru -> name_collector !!}</td>
                    @endif
                  </tr>
                  <tr>
                    @if($terbaru -> tim_collector != null)
                    <td class="center">Tim Collector</td>
                    <td class="center">: {!! $terbaru -> tim_collector !!}</td>
                    @endif
                  </tr>
                  <tr>
                     @if($terbaru -> date_collection != null)
                    <td class="center">Collector Date</td>
                    <td class="center">: {!! $terbaru -> date_collection !!}</td>
                    @endif
                  </tr>
                  <tr>
                     @if($terbaru -> name_author != null)
                    <td class="center">Determine by</td>
                    <td class="center">: {!! $terbaru -> name_author !!} , {{$terbaru-> date_ident }}</td>
                    @endif
                  </tr>
                  <tr>
                     @if($terbaru -> agency != null)
                    <td class="center">Address Determine</td>
                    <td class="center">: {!! $terbaru -> agency !!}</td>
                    @endif
                  </tr>
               </table>  <br><br>
               <caption><strong><h3>Location</h3></strong></caption>
                 <table class="table table-striped">
                   <tr>
                     <td class="center">Country</td>
                     <td class="center">: {{$terbaru->name}}</td>
                   </tr>
                   <tr>
                     <td class="center">Province</td>
                     <td class="center">: {{$terbaru ->name}}</td>
                   </tr>
                   <tr>
                     <td class="center">City</td>
                     <td class="center">: {{$terbaru ->name}}</td>
                   </tr>
                   <tr>
                     <td class="center">District</td>
                     <td class="center">: {{$terbaru ->name}}</td>
                   </tr>
                   <tr>
                      @if($terbaru -> vilage != null)
                     <td class="center">Village</td>
                     <td class="center">: {{$terbaru ->vilage}}</td>
                     @endif
                   </tr>
                   <tr>
                      @if($terbaru -> latitude != null)
                     <td class="center">Latitude</td>
                     <td class="center">: {{$terbaru -> latitude}}</td>
                     @endif
                   </tr>
                   <tr>
                     @if($terbaru -> longitude != null)
                     <td class="center">Longitude</td>
                     <td class="center">: {{$terbaru -> longitude}}</td>
                     @endif
                   </tr>
                   <tr>
                     @if($terbaru -> atitude != null)
                     <td class="center">Altitude</td>
                     <td class="center">: {{$terbaru -> atitude}} m</td>
                     @endif
                   </tr>
                 </table> <br><br>
                 <!-- picture -->
              <div class="col-md-8 col-md-offset-2" style="text-align:center">
               <div  id="myCarousel" class="carousel slide" style="text-align:center">
                 <!-- Indicators -->
                  <ol class="carousel-indicators">
                    @if(isset($terbaru -> picture_species))
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    @endif
                    @if(isset($terbaru -> picture_species2))
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                    @endif
                    @if(isset($terbaru -> picture_species3))
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    @endif
                    @if(isset($terbaru -> picture_species4))
                       <li data-target="#myCarousel" data-slide-to="3"></li>
                    @endif
                    @if(isset($terbaru -> picture_species5))
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                    @endif
                    @if(isset($terbaru -> picture_species6))
                      <li data-target="#myCarousel" data-slide-to="5"></li>
                    @endif
                  </ol>
                  <div class="carousel-inner">
                     @if($terbaru -> picture_species != null)
                    <div class="item active"   style="text-align: center">
                     <img src="{{asset('herba/'.$terbaru->picture_species)}}" style="width:100%" class="img-responsive"/>
                    </div>
                    @endif
                    @if($terbaru -> picture_species2 != null)
                    <div class="item"   style="text-align: center">
                      <img src="{{asset('herba/'.$terbaru->picture_species2)}}" style="width:100%"  class="img-responsive">
                    </div>
                    @endif
                    @if($terbaru -> picture_species3 != null)
                    <div class="item"   style="text-align: center">
                      <img src="{{asset('herba/'.$terbaru->picture_species3)}}" style="width:100%" class="img-responsive">
                    </div>
                    @endif
                    @if($terbaru -> picture_species4 != null)
                    <div class="item"   style="text-align: center">
                      <img src="{{asset('herba/'.$terbaru->picture_species4)}}" style="width:100%" class="img-responsive">
                    </div>
                    @endif
                    @if($terbaru -> picture_species5 != null)
                    <div class="item"   style="text-align: center">
                      <img src="{{asset('herba/'.$terbaru->picture_species5)}}" style="width:100%" class="img-responsive">
                    </div>
                    @endif
                    @if($terbaru -> picture_species6 != null)
                    <div class="item"   style="text-align: center">
                      <img src="{{asset('herba/'.$terbaru->picture_species6)}}" style="width:100%" class="img-responsive">
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
    
@endforeach
    </div>
</div>

</div>
</div>
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
@endsection
