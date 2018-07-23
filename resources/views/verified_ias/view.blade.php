@extends('verified_ias.base')

@section('action-content')

    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="dt-button btn-group col-sm-offset-10 hidden-print">
                        <a class="btn btn-default button-download buttons-html5 btn-md " tabindex="0" aria-controls="datatable-buttons" href="#" >
                            <i class="fa fa-cloud-download"> </i>
                            Download
                        </a>
                        <!--<a class="btn btn-default buttons-print btn-md " tabindex="0" aria-controls="datatable-buttons"> <!--href="window.print();"-->
                            <!--<i class="fa fa-print"> </i>
                            Print
                        </a>-->
                    </div>

                    <div class="col-sm-8">
                        <h2 class="col-md-offset-1">
                            <i>{{$speciment_ias->species->name_species}}</i>
                        </h2>
                    </div>
                </div>
            
            <form class="form-horizontal" role="form" method="POST" action="{{ route('verified_ias.verif', ['$id_ias' => $speciment_ias]) }}" style="margin-top:10px">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        
                    <!--Taxonomy-->               
                    <div class="box box-default col-md-12" >
                        <div class="box-body">
                            <div class="col-md-8">
                                <h5 style="text:arial narrow"><b>Taxsonomy  :</b></h5>
                                @if(isset($speciment_ias->species->genus->family->name_family))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="family" class="col-md-3 col-md-offset-1" style="text-align:left">Family</label>
                                        <span class=" col-md-8" align="justify">
                                            {{$speciment_ias->species->genus->family->name_family}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->species->genus->name_genus))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="genus" class="col-md-3 col-md-offset-1" style="text-align:left">Genus</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_ias->species->genus->name_genus }}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->species->subspecies))
                                    <div class="col-md-12" style="margin-top:10px" >
                                        <label for="subspecies" class="col-md-3 col-md-offset-1" style="text-align:left">Subspecies</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_ias->species->subspecies }}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->species->variety))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="variety" class="col-md-3 col-md-offset-1" style="text-align:left">Variety</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_ias->species->variety }}
                                        </span>
                                    </div>
                                @endif
                                
                                @if(isset($speciment_ias->common_name))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="common" class="col-md-3 col-md-offset-1" style="text-align:left">Common Name</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_ias->common_name}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->species->species_synonim))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="synonim" class="col-md-3 col-md-offset-1" style="text-align:left">Synonim</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_ias->species->species_synonim!!}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->species->origin_species))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="origin" class="col-md-3 col-md-offset-1" style="text-align:left">Origin</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_ias->species->origin_species}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->species->variety))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="description" class="col-md-3 col-md-offset-1" style="text-align:left">Description</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_ias->species->description_species!!}
                                        </span>
                                    </div>
                                @endif

                                <h5 style="text:arial narrow"><b>Geology  :</b></h5>
                                 @if(isset($speciment_ias->destribution))
                                <div class="col-md-12" style="margin-top:10px">
                                    <label for="notes" class="col-md-3 col-md-offset-1" style="text-align:left">Distribution</label>
                                    <span class="col-md-8" align="justify">
                                        {!!$speciment_ias->destribution!!}
                                    </span>
                                </div>
                                @endif

                                @if(isset($speciment_ias->species->habitat))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="habitat" class="col-md-3 col-md-offset-1" style="text-align:left">Invaded Habitat</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_ias->species->habitat!!}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->species->ecology))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="ecology" class="col-md-3 col-md-offset-1" style="text-align:left">Ecology</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_ias->species->ecology!!}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->location->districts->city->prov->name))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Province</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_ias->location->districts->city->prov->name}}
                                        </span>
                                    </div>
                                @endif
                                
                                @if(isset($speciment_ias->location->vilage))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Vilage</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_ias->location->vilage}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->location->latitude))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Latitude</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_ias->location->latitude}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->location->longitude))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Longitude</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_ias->location->longitude}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->location->atitude))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Atitude</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_ias->location->atitude}}
                                        </span>
                                    </div>
                                @endif

                                <h5 style="text:arial narrow"><b>Risk and Controll  :</b></h5>
                                @if(isset($speciment_ias->risk_analisis))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="risk_analisis" class="col-md-3 col-md-offset-1" style="text-align:left">Risk Analysis</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_ias->risk_analisis!!}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->control->chemical_ctrl))
                                    <div class="col-md-12" style="  margin-top:10px">
                                        <label for="control" class="col-md-3 col-md-offset-1" style="text-align:left">Chemical Control</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_ias->control->chemical_ctrl!!}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->control->manual_ctrl))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Manual Control</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_ias->control->manual_ctrl!!}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->control->biologycal_ctrl))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Biologycal Control</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_ias->control->biologycal_ctrl!!}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->utilization))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Uses</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_ias->utilization!!}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->location->atitude))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Prevention</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_ias->prevention!!}
                                        </span>
                                    </div>
                                @endif

                                
                                <h5 style="text:arial narrow"><b>Data Set  :</b></h5>
                                @if(isset($speciment_ias->contact_person))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Contact Person</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_ias->contact_person!!}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->reference))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Reference</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_ias->reference!!}
                                        </span>
                                    </div>
                                @endif

                            </div>
    
                            <div id="myCarousel" class="carousel slide col-md-4" data-ride="carousel" style="max-height:700px">
                            <!-- Indicators-->
                            <ol class="carousel-indicators">
                                @if(isset($speciment_ias->species->character->picture_species))
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                @endif

                                @if(isset($speciment_ias->species->character->picture_species1))
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                @endif

                                @if(isset($speciment_ias->species->character->picture_species2))
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                @endif

                                @if(isset($speciment_ias->species->character->picture_species3))
                                    <li data-target="#myCarousel" data-slide-to="3"></li>
                                @endif

                                @if(isset($speciment_ias->species->character->picture_species4))
                                    <li data-target="#myCarousel" data-slide-to="4"></li>
                                @endif

                                @if(isset($speciment_ias->species->character->picture_species5))
                                    <li data-target="#myCarousel" data-slide-to="5"></li>
                                @endif
                            </ol>
                            <!-- Wrapper for slides-->
                            <div class="carousel-inner">
                                @if(isset($speciment_ias->species->character->picture_species))
                                    <div class="item active">
                                        <a href="{{url('/imageuih', $speciment_ias->species->character->picture_species)}}" target="_blank">
                                            <img class="img-rounded img-responsive" src="{{asset('ias/' .$speciment_ias->species->character->picture_species) }}" id="" alt="IAS 1" width="700" max-height="600">
                                        </a>
                                    </div>
                                @else 
                                    <div class="item">
                                        <img class="img-rounded img-responsive" src="{{asset("avatars/no_image.png") }}" id="" alt="IAS 2" width="700" height="auto">
                                    </div>
                                @endif

                                @if(isset($speciment_ias->species->character->picture_species1))
                                    <div class="item">
                                        <a href="{{url('/imageuih', $speciment_ias->species->character->picture_species1)}}" target="_blank">
                                            <img class="img-rounded img-responsive" src="{{asset('ias/' .$speciment_ias->species->character->picture_species1) }}" id="" alt="IAS 2" width="700" height="auto">
                                        </a>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->species->character->picture_species2))
                                    <div class="item">
                                        <a href="{{url('/imageuih', $speciment_ias->species->character->picture_species2)}}" target="_blank">
                                            <img class="img-rounded img-responsive" src="{{asset('ias/' .$speciment_ias->species->character->picture_species2) }}" id="" alt="IAS 3" width="700" height="auto">
                                        </a>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->species->character->picture_species3))
                                    <div class="item">
                                        <a href="{{url('/imageuih', $speciment_ias->species->character->picture_species3)}}" target="_blank">
                                            <img class="img-rounded img-responsive" src="{{asset('ias/' .$speciment_ias->species->character->picture_species3) }}" id="" alt="IAS 1" width="700" height="auto">
                                        </a>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->species->character->picture_species4))
                                    <div class="item">
                                        <a href="{{url('/imageuih', $speciment_ias->species->character->picture_species4)}}" target="_blank">
                                            <img class="img-rounded img-responsive" src="{{asset('ias/' .$speciment_ias->species->character->picture_species4) }}" id="" alt="IAS 2" width="700" height="auto">
                                        </a>
                                    </div>
                                @endif

                                @if(isset($speciment_ias->species->character->picture_species5))
                                    <div class="item">
                                        <a href="{{url('/imageuih', $speciment_ias->species->character->picture_species5)}}" target="_blank">
                                            <img class="img-rounded img-responsive" src="{{asset('ias/' .$speciment_ias->species->character->picture_species5) }}" id="" alt="IAS 3" width="700" height="auto">
                                        </a>
                                    </div>
                                @endif
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
                    </div>
                </div>

                <!--Comment-->
                <div class="box box-default col-md-12" >
                    <div class="box-body">
                        <div class="col-md-14">
                            <h5 style="text:arial narrow"><b>Comment  :</b></h5>
                             <div class="col-md-12">
                                <textarea id="agency" type="date" class="agency" name="agency" value="{{ old('agency') }}"> </textarea>

                                @if ($errors->has('agency'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agency') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Butoon Back-->
                <div class="form-group" >
                    <div class="col-md-12 col-md-offset-7 text-right" style="margin-top:50px"> 
                        <button type="button" class="col-md-2 btn btn-secondary" onclick="window.location='{{ route('verified_ias.index') }}'" >Cancel</button>
                        <button type="submit" class="col-md-2 btn btn-primary"  style="margin-left:10px" >Verified</button> 
                    </div>

            </form>
        </div>    
    </section>
    <!--<script>
         window.print();
    </script>-->

@endsection
 