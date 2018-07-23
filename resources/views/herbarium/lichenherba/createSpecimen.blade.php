@extends('herbarium.lichenherba.base')

@section('action-content')
    <!--link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script-->

    <section class="content">
        <div class="box">
            <div class="box header">
                <div class="row">
                    <div class="col-md-8">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-17 col-md-offset-1">
                                    <div class="row bs-wizard" style="border-bottom">
                                        <h4> Add new Collection</h4>
                                        <div class="col-xs-6 bs-wizard-step complete">
                                            <div class="text-center bs-wizard-stepnum">Step 1</div>
                                            <div class="progress"><div class="progress-bar"></div></div>
                                            <a href="{{route('lichenherba.create')}}" class="bs-wizard-dot"></a>
                                        </div>
                                        <div class="col-xs-6 bs-wizard-step active">
                                            <div class="text-center bs-wizard-stepnum">Step 2</div>
                                            <div class="progress"><div class="progress-bar"></div></div>
                                            <a href="#" class="bs-wizard-dot"></a>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <form class="form-horizontal" role="form" method="POST" action="{{ route('lichenherba.store') }}" style="margin-top:10px">
                                        {{ csrf_field() }}

                                            <input type="hidden" name="data1" value="{{$data['location']}}">
                                            <input type="hidden" name="data2" value="{{$data['collect']}}">
                                            <input type="hidden" name="data3" value="{{$data['author']}}">
                                            
                                            <div class="form-group{{ $errors->has('label_lichen') ? ' has-error' : '' }}" >
                                                <label for="label_lichen" class="col-md-2 col-md-offset-1" style="text-align:left">Label Weed</label>
                                                <div class="col-md-2">
                                                    <input id="label_lichen" placeholder="Amount" type="number" class="form-control" name="label_lichen" value="{{ old('label_lichen') }}">
                                                    @if ($errors->has('label_lichen'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('label_lichen') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}" >
                                                <label for="family" class="col-md-2 col-md-offset-1" style="text-align:left">Duplicate From</label>
                                                <div class="col-md-4">
                                                    <input id="family" type="text" placeholder="Duplicate From" class="form-control" name="family" value="{{ old('family') }}">
                                                    @if ($errors->has('family'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('family') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class=" col-md-2" placeholder="amount">
                                                    <input id="family" type="number" placeholder="Amount" class="form-control" name="family" value="{{ old('family') }}">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}" >
                                                <label for="family" class="col-md-2 col-md-offset-1" style="text-align:left">Duplicate Send To</label>
                                                <div class="col-md-4">
                                                    <input id="family" type="text" placeholder="Duplicate Send To" class="form-control" name="family" value="{{ old('family') }}">
                                                    @if ($errors->has('family'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('family') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class=" col-md-2" placeholder="amount">
                                                    <input id="family" type="number" placeholder="Amount" class="form-control" name="family" value="{{ old('family') }}">
                                                </div>

                                            </div>

                                            <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}" >
                                                <label for="family" class="col-md-2 col-md-offset-1" style="text-align:left">Duplicate Number</label>
                                                <div class="col-md-2">
                                                    <input id="family" type="number"placeholder="Amount" class="form-control" name="family" value="{{ old('family') }}">
                                                    @if ($errors->has('family'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('family') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}" >
                                                <label for="family" class="col-md-2 col-md-offset-1" style="text-align:left">Family</label>
                                                <div class="col-md-6">
                                                    <input id="family" type="text" placeholder="Family Name" class="form-control" name="family" value="{{ old('family') }}">
                                                    @if ($errors->has('family'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('family') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                            <div class="form-group{{ $errors->has('genus') ? ' has-error' : '' }}"  >
                                                <label for="genus" class="col-md-2 col-md-offset-1" style="text-align:left">Genus</label>
                                                <div class="col-md-6">
                                                    <input id="genus" type="text" placeholder="Genus name" class="form-control" name="genus" value="{{ old('genus') }}">
                                                    @if ($errors->has('genus'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('genus') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
            
                                            <div class="form-group{{ $errors->has('name_herbarium') ? ' has-error' : '' }}">
                                                <label for="name_herbarium" class="col-md-2 col-md-offset-1" style="text-align:left">Species</label>
                                                 <div class="col-md-6">
                                                    <i>                                                   
                                                        <input id="name_herbarium" type="text" placeholder="Species name" class="form-control" name="species" value="{{ old('name_herbarium') }}">
                                                    </i>
                                                    @if ($errors->has('name_herbarium'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name_herbarium') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
        
                                            <div class="form-group{{ $errors->has('subspecies') ? ' has-error' : '' }}"  >
                                                <label for="subspecies" class="col-md-2 col-md-offset-1" style="text-align:left">Subspecies</label>
                                                <div class="col-md-6">
                                                    <input id="subspecies" type="text" placeholder="Subspecies name" class="form-control" name="forma" value="{{ old('subspecies') }}">
                                                    @if ($errors->has('subspecies'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('subspecies') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('forma') ? ' has-error' : '' }}"  >
                                                <label for="forma" class="col-md-2 col-md-offset-1" style="text-align:left">Variety</label>
                                                <div class="col-md-6">
                                                    <input id="forma" type="text" placeholder="Forma name" class="form-control" name="forma" value="{{ old('forma') }}">
                                                    @if ($errors->has('forma'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('forma') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('origin_species') ? ' has-error' : '' }}" >
                                                <label for="origin_species" class="col-md-2 col-md-offset-1" style="text-align:left">Origin</label>
                                                <div class="col-md-6">
                                                    <input id="origin_species" type="text" placeholder="Origin Species" class="form-control" name="origin_species" value="{{ old('origin_species') }}">
                                                    @if ($errors->has('origin_species'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('origin_species') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('species_synonim') ? ' has-error' : '' }}"  >
                                                <label for="species_synonim" class="col-md-2 col-md-offset-1" style="text-align:left"> Synonim</label>
                                                <div class="col-md-6">
                                                    <input id="species_synonim" type="text" placeholder="Species Synonim" class="form-control" name="species_synonim" value="{{ old('species_synonim') }}">
                                                    @if ($errors->has('species_synonim'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('species_synonim') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <div class="form-group{{ $errors->has('venacular_name') ? ' has-error' : '' }}"  >
                                                <label for="venacular_name" class="col-md-2 col-md-offset-1" style="text-align:left">Venacular Name</label>
                                                <div class="col-md-6">
                                                    <input id="venacular_name" type="text" placeholder="Velacular Name" class="form-control" name="venacular_name" value="{{ old('venacular_name') }}">
                                                    @if ($errors->has('venacular_name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('venacular_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group"  >
                                                <label for="description_species" class="col-md-2 col-md-offset-1" style="text-align:left">Description</label>
                                                <div class="col-md-7">
                                                    <textarea id="description_species" row="7" cols="5" oneKeyPress placeholder="Description Species" class="form-control" name="description_species" value="{{ old('description_species') }}"></textarea>
                                                    @if ($errors->has('description_species'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('description_species') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}"  >
                                                <label for="notes" class="col-md-2 col-md-offset-1" style="text-align:left">Notes</label>
                                                <div class="col-md-7">
                                                    <textarea id="notes" row="7" cols="5" oneKeyPress placeholder="Habitat Species" class="form-control" name="habitat" value="{{ old('habitat') }}"></textarea>
                                                    @if ($errors->has('notes'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('notes') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        
                                            <div  class="form-group"> <!--form-group{{ URL::to('upload') }}-->
                                                <label for="picture" class="col-md-2 col-md-offset-1" style="text-align:left">Select Image to Update</label>
                                                <div class="col-md-7">
                                                    <a class="add_field_button  col-md-offset-10">Add More Fields</a>
                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
                                                </div>
                                            </div>

                                            <div enctype="multipart/form-data" class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}" methode="post" > <!--form-group{{ URL::to('upload') }}-->
                                                <div class="input_fields_wrap col-md-7 col-md-offset-3">
                                                    <div class="col-md-6">
                                                        <input type="file" name="gambar[1]" id="inputgambar" clas="validate"/>
                                                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                        <img src="http://placehold.it/200x200" id="showgambar" style="max-width: 200px;max-height:200px;float:left;"/>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group" >
                                                <div class="col-md-12 col-md-offset-8 text-right" style="margin-top:100px"> 
                                                    <a type="submit" class="btn btn-primary col-md-2" href="{{route('lichenherba.create')}}">Previous</a>
                                                    <a type="submit" class="btn btn-primary col-md-2" href="{{route('lichenherba.store')}}"  style="margin-left:10px">Submit</a>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                 </div>
             </div>
         </div>
    </section>
@endsection