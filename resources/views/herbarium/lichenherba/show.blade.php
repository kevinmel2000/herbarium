@extends('herbarium.lichenherba.base')

@section('action-content')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="dt-button btn-group col-sm-offset-10">
                        <a class="btn btn-default button-download buttons-html5 btn-md" tabindex="0" aria-controls="datatable-buttons" href="#" >
                            <i class="fa fa-cloud-download"> </i>
                            Download
                        </a>
                        <a class="btn btn-default buttons-print btn-md" tabindex="0" aria-controls="datatable-buttons"> <!--href="window.print();"-->
                            <i class="fa fa-print"> </i>
                            Print
                        </a>
                    </div>

                    <div class="col-sm-8">
                        <h2 class="col-md-offset-1">
                            <i>{{$speciment_herbarium->species->name_species}}</i>
                        </h2>
                    </div>
                    <div class="col-sm-3 text-right">
                        <h2>
                            <b>{{$speciment_herbarium->label}}</b>
                        </h2>
                    </div>
                </div>
                <!---->
            
            <form class="form-horizontal" role="form" method="GET" style="margin-top:10px">
                {{ csrf_field() }}
                    <!--Taxonomy-->               
                    <div class="box box-default col-md-12" >
                        <div class="box-header with-border">
                            <h5 style="text:arial narrow"><b>Taxsonomy  :</b></h5>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-md-8">
                               @if(isset($speciment_herbarium->species->genus->family->name_family))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="family" class="col-md-3 col-md-offset-1" style="text-align:left">Family</label>
                                        <span class=" col-md-8" align="justify">
                                            {{$speciment_herbarium->species->genus->family->name_family}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->species->genus->name_genus))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="genus" class="col-md-3 col-md-offset-1" style="text-align:left">Genus</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->species->genus->name_genus }}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->species->subspecies))
                                    <div class="col-md-12" style="margin-top:10px" >
                                        <label for="subspecies" class="col-md-3 col-md-offset-1" style="text-align:left">Subspecies</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->species->subspecies }}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->species->variety))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="variety" class="col-md-3 col-md-offset-1" style="text-align:left">Variety</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->species->variety }}
                                        </span>
                                    </div>
                                @endif
                                
                                @if(isset($speciment_herbarium->common_name))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="common" class="col-md-3 col-md-offset-1" style="text-align:left">Common Name</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->common_name}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->species->origin_species))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="origin" class="col-md-3 col-md-offset-1" style="text-align:left">Origin</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->species->origin_species}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->species->species_synonim))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="synonim" class="col-md-3 col-md-offset-1" style="text-align:left">Synonim</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->species->species_synonim}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->species->venacular->venacular_name))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="synonim" class="col-md-3 col-md-offset-1" style="text-align:left">Venacular Name</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->species->venacular->venacular_name}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->species->description_species))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="description" class="col-md-3 col-md-offset-1" style="text-align:left">Description</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_herbarium->species->description_species!!}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->notes))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="description" class="col-md-3 col-md-offset-1" style="text-align:left">Notes</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_herbarium->notes!!}
                                        </span>
                                    </div>
                                @endif
                            </div>
    
                            <div id="myCarousel" class="carousel slide col-md-4" data-ride="carousel" style="max-height:700px">
                                <!-- Indicators-->
                                <ol class="carousel-indicators">
                                    @if(isset($speciment_herbarium->species->character->picture_species))
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    @endif

                                    @if(isset($speciment_herbarium->species->character->picture_species1))
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                    @endif

                                    @if(isset($speciment_herbarium->species->character->picture_species2))
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    @endif

                                    @if(isset($speciment_herbarium->species->character->picture_species3))
                                        <li data-target="#myCarousel" data-slide-to="3"></li>
                                    @endif

                                    @if(isset($speciment_herbarium->species->character->picture_species4))
                                        <li data-target="#myCarousel" data-slide-to="4"></li>
                                    @endif

                                    @if(isset($speciment_herbarium->species->character->picture_species5))
                                        <li data-target="#myCarousel" data-slide-to="5"></li>
                                    @endif
                                </ol>
                                <!-- Wrapper for slides-->
                                <div class="carousel-inner">
                                    @if(isset($speciment_herbarium->species->character->picture_species))
                                        <div class="item active">
                                            <a href="{{url('/imageuih', $speciment_herbarium->species->character->picture_species)}}" target="_blank">
                                                <img class="img-rounded img-responsive" src="{{asset('herba/' .$speciment_herbarium->species->character->picture_species) }}" id="" alt="Herbarium 1" width="700" max-height="600">
                                            </a>
                                        </div>
                                    @else 
                                        <div class="item">
                                            <img class="img-rounded img-responsive" src="{{asset("avatars/no_image.png") }}" id="" alt="Herbarium 2" width="700" height="auto">
                                        </div>
                                    @endif

                                    @if(isset($speciment_herbarium->species->character->picture_species1))
                                        <div class="item">
                                            <a href="{{url('/imageuih', $speciment_herbarium->species->character->picture_species1)}}" target="_blank">
                                                <img class="img-rounded img-responsive" src="{{asset('herba/' .$speciment_herbarium->species->character->picture_species1) }}" id="" alt="Herbarium 2" width="700" height="auto">
                                            </a>
                                        </div>
                                    @endif

                                    @if(isset($speciment_herbarium->species->character->picture_species2))
                                        <div class="item">
                                            <a href="{{url('/imageuih', $speciment_herbarium->species->character->picture_species2)}}" target="_blank">
                                                <img class="img-rounded img-responsive" src="{{asset('herba/' .$speciment_herbarium->species->character->picture_species2) }}" id="" alt="Herbarium 3" width="700" height="auto">
                                            </a>
                                        </div>
                                    @endif

                                    @if(isset($speciment_herbarium->species->character->picture_species3))
                                        <div class="item">
                                            <a href="{{url('/imageuih', $speciment_herbarium->species->character->picture_species3)}}" target="_blank">
                                                <img class="img-rounded img-responsive" src="{{asset('herba/' .$speciment_herbarium->species->character->picture_species3) }}" id="" alt="Herbarium 4" width="700" height="auto">
                                            </a>
                                        </div>
                                    @endif

                                    @if(isset($speciment_herbarium->species->character->picture_species4))
                                        <div class="item">
                                            <a href="{{url('/imageuih', $speciment_herbarium->species->character->picture_species4)}}" target="_blank">
                                                <img class="img-rounded img-responsive" src="{{asset('herba/' .$speciment_herbarium->species->character->picture_species4) }}" id="" alt="Herbarium 5" width="700" height="auto">
                                            </a>
                                        </div>
                                    @endif

                                    @if(isset($speciment_herbarium->species->character->picture_species5))
                                        <div class="item">
                                            <a href="{{url('/imageuih', $speciment_herbarium->species->character->picture_species5)}}" target="_blank">
                                                <img class="img-rounded img-responsive" src="{{asset('herba/' .$speciment_herbarium->species->character->picture_species5) }}" id="" alt="Herbarium 6" width="700" height="auto">
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

                <!--Data Set-->
                <div class="box box-default col-md-12">
                    <div class="box-header with-border">
                        <h5 style="text:arial narrow"><b>Data Set  :</b></h5>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-8">
                            @if(isset($speciment_herbarium->duplicate->number_duptAll))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Duplicate Number</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->duplicate->number_duptAll}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->duplicate->dupt_form))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Duplicate From</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->duplicate->dupt_form}}
                                            ({{$speciment_herbarium->duplicate->number_form}})
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->duplicate->dupt_send))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Duplicate Send</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->duplicate->dupt_send}}
                                            ({{$speciment_herbarium->duplicate->number_send}})
                                        </span>
                                        
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->collect->name_collector))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Collector Name</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->collect->name_collector}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->collect->tim_collector))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Collectors</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->collect->tim_collector}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->collect->date_collection))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Collector Date</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->collect->date_collection}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->determine->name_author))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Determine Name</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->determine->name_author}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->determine->email_author))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Determine Email</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->determine->email_author}}
                                        </span>
                                    </div>
                                @endif
                                
                                @if(isset($speciment_herbarium->determine->phone_author))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Determine Phone</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->determine->phone_author}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->determine->date_ident))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Determine Date</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->determine->date_ident}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->determine->agency))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Address Determine</label>
                                        <span class="col-md-8" align="justify">
                                            {!!$speciment_herbarium->determine->agency!!}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>  
                
                <!--Geology-->
                <div class="box box-default col-md-12" style="margin-top:10px">
                     <div class="box-header with-border">
                        <h5 style="text:arial narrow"><b>Geology  :</b></h5>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">             
                        <div class="col-md-8">
                                @if(isset($speciment_herbarium->location->districts->city->prov->state->name))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Country</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->location->districts->city->prov->state->name}}
                                        </span>
                                    </div>
                                @endif
                                
                                @if(isset($speciment_herbarium->location->districts->city->prov->name))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Province</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->location->districts->city->prov->name}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->location->districts->city->name))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">City</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->location->districts->city->name}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->location->districts->name))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Districts</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->location->districts->name}}
                                        </span>
                                    </div>
                                @endif
                                
                                @if(isset($speciment_herbarium->location->vilage))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Vilage</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->location->vilage}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->location->latitude))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Latitude</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->location->latitude}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->location->longitude))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Longitude</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->location->longitude}}
                                        </span>
                                    </div>
                                @endif

                                @if(isset($speciment_herbarium->location->atitude))
                                    <div class="col-md-12" style="margin-top:10px">
                                        <label for="name_family" class="col-md-3 col-md-offset-1" style="text-align:left">Atitude</label>
                                        <span class="col-md-8" align="justify">
                                            {{$speciment_herbarium->location->atitude}}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                    <div>
                </div>

                <!--Butoon Back-->
                <div class="form-group" >
                    <div class="col-md-12 col-md-offset-9 text-right" style="margin-top:100px"> 
                      <button type="button" class="col-md-2 btn btn-primary" onclick="window.location='{{ url("herbarium-management/lichenherba") }}'" >Back</button>
                     </div>
                </div>
            </form>
        </div>    
    </section>
    <!--script>
         window.print();
    </script-->

@endsection
 