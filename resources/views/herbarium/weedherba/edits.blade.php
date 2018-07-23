@extends('herbarium.weedherba.base')

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
                                    <div class="row bs-wizard" style="border-bottom" name="label">
                                        <h4 value="1"> Edit Collection</h4>
                                        <div class="col-xs-6 bs-wizard-step complete">
                                            <div class="text-center bs-wizard-stepnum">Step 1</div>
                                            <div class="progress"><div class="progress-bar"></div></div>
                                            <a href="{{route('weedherba.edit',['$id_herba' => $speciment_herbarium->id_herbarium])}}" class="bs-wizard-dot"></a>
                                        </div>
                                        <div class="col-xs-6 bs-wizard-step active">
                                            <div class="text-center bs-wizard-stepnum">Step 2</div>
                                            <div class="progress"><div class="progress-bar"></div></div>
                                            <a href="#" class="bs-wizard-dot"></a>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ route('weedherba.updatestep',['$id_herba' => $speciment_herbarium->id_herbarium]) }}" style="margin-top:10px">
                                            <input type="hidden" name="_method" value="PATCH">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            
                                            <input type="hidden" name="user" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="data1" value="{{$data['location']}}">
                                            <input type="hidden" name="data2" value="{{$data['collect']}}">
                                            <input type="hidden" name="data3" value="{{$data['author']}}">
                                    
                                            <div class="form-group{{ $errors->has('label_weed') ? ' has-error' : '' }}" >
                                                <label for="label_weed" class="col-md-2 col-md-offset-1" style="text-align:left">Label Weed</label>
                                                <div class="col-md-2">
                                                    <input id="label_weed" placehold="Amount" type="number" class="form-control" name="label_weed" value="{{$speciment_herbarium->label}}">
                                                </div>
                                                 @if ($errors->has('label_weed'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('label_weed') }}</strong>
                                                        </span>
                                                @endif        
                                            </div>
                                            
                                            <div class="form-group{{ $errors->has('num_dupt') ? ' has-error' : '' }}" >
                                                <label for="num_dupt" class="col-md-2 col-md-offset-1" style="text-align:left">Duplicate Number</label>
                                                <div class="col-md-2">
                                                    <input id="num_dupt" type="number" placeholder="Amount" class="form-control" name="num_dupt" value="{{$speciment_herbarium->duplicate->number_duptAll}}">
                                                    @if ($errors->has('num_dupt'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('num_dupt') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('dupt_form') ? ' has-error' : '' }}" >
                                                <label for="dupt_form" class="col-md-2 col-md-offset-1" style="text-align:left">Duplicate From</label>
                                                <div class="col-md-4">
                                                    <input id="dupt_form" type="text" placeholder="Duplicate From" class="form-control" name="dupt_form" value="{{$speciment_herbarium->duplicate->dupt_form}}">
                                                    @if ($errors->has('dupt_form'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('dupt_form') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class=" col-md-2" placeholder="amount">
                                                    <input id="num_form" type="number" placeholder="Amount" class="form-control" name="num_form" value="{{$speciment_herbarium->duplicate->number_form}}">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group{{ $errors->has('dupt_send') ? ' has-error' : '' }}" >
                                                <label for="dupt_send" class="col-md-2 col-md-offset-1" style="text-align:left">Duplicate Send To</label>
                                                <div class="col-md-4">
                                                    <input id="dupt_send" type="text" placeholder="Duplicate Send To" class="form-control" name="dupt_send" value="{{ $speciment_herbarium->duplicate->dupt_send }}">
                                                    @if ($errors->has('dupt_send'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('dupt_send') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class=" col-md-2" placeholder="amount">
                                                    <input id="num_send" type="number" placeholder="Amount" class="form-control" name="num_send" value="{{$speciment_herbarium->duplicate->number_send}}">
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}" >
                                                <label for="family" class="col-md-2 col-md-offset-1" style="text-align:left">Family</label>
                                                <div class="col-md-6">
                                                    <input id="family" type="text" placeholder="Family Name" class="form-control" name="family" value="{{$speciment_herbarium->species->genus->family->name_family}}">
                                                   
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
                                                    <input id="genus" type="text" placeholder="Genus name" class="form-control" name="genus" value="{{$speciment_herbarium->species->genus->name_genus}}">
                                                    @if ($errors->has('genus'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('genus') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
            
                                            <div class="input_fields_wrap_name form-group{{ $errors->has('species') ? ' has-error' : '' }}">
                                                <label for="species" class="col-md-2 col-md-offset-1" style="text-align:left">Species</label>
                                                 <div class="col-md-6">
                                                    <i>                                                   
                                                        <input id="species" type="text" placeholder="Species name" class="form-control" name="species" value="{{$speciment_herbarium->species->name_species}}" require>
                                                    </i>
                                                    @if ($errors->has('species'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('species') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <a class="add_field_button_name  col-md-offset-9">Add New Name</a>
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
                                            </div>
        
                                            <div class="form-group{{ $errors->has('subspecies') ? ' has-error' : '' }}"  >
                                                <label for="subspecies" class="col-md-2 col-md-offset-1" style="text-align:left">Subspecies</label>
                                                <div class="col-md-6">
                                                    <input id="subspecies" type="text" placeholder="Subspecies name" class="form-control" name="subspecies" value="{{$speciment_herbarium->species->subspecies}}">
                                                    @if ($errors->has('subspecies'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('subspecies') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('variety') ? ' has-error' : '' }}"  >
                                                <label for="variety" class="col-md-2 col-md-offset-1" style="text-align:left">Variety</label>
                                                <div class="col-md-6">
                                                    <input id="variety" type="text" placeholder="Forma name" class="form-control" name="variety" value="{{$speciment_herbarium->species->variety}}">
                                                    @if ($errors->has('variety'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('variety') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('origin_species') ? ' has-error' : '' }}" >
                                                <label for="origin_species" class="col-md-2 col-md-offset-1" style="text-align:left">Origin</label>
                                                <div class="col-md-6">
                                                    <input id="origin_species" type="text" placeholder="Origin Species" class="form-control" name="origin_species" value="{{$speciment_herbarium->species->origin_species}}">
                                                    @if ($errors->has('origin_species'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('origin_species') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('species_synonim') ? ' has-error' : '' }}"  >
                                                <label for="species_synonim" class="col-md-2 col-md-offset-1" style="text-align:left">Synonim</label>
                                                <div class="col-md-6">
                                                    <input id="species_synonim" type="text" placeholder="Species Synonim" class="form-control" name="species_synonim" value="{{$speciment_herbarium->species->species_synonim}}">
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
                                                    <input id="venacular_name" type="text" placeholder="Venacular Name" class="form-control" name="venacular_name" value="{{$speciment_herbarium->species->venacular->venacular_name}}">
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
                                                    <textarea id="description_species" row="7" cols="5" oneKeyPress placeholder="Description Species" class="form-control" name="description_species" value="{!!$speciment_herbarium->species->description_species!!}"></textarea>
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
                                                    <textarea id="notes" row="7" cols="5" oneKeyPress placeholder="Another Characterictic" class="form-control" name="notes" value="{!!$speciment_herbarium->notes!!}"></textarea>
                                                    @if ($errors->has('notes'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('notes') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        
                                            <div  class="form-group"> 
                                                <label for="picture" class="col-md-2 col-md-offset-1" style="text-align:left">Select Image to Update</label>
                                                <div class="col-md-8">
                                                    <a class="add_field_button  col-md-offset-10">Add More Fields</a>
                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
                                                </div>
                                                <br><div style="color:#ff0000">*re-input image</div>
                                            </div>

                                            <div class="form-group" > 
                                                <div class="input_fields_wrap col-md-7 col-md-offset-3">
                                                    <div class="col-md-6" >
                                                        <input type="file" name="image"  id="inputgambar" accept="image/*" value="{{$speciment_herbarium->species->character->picture_species}}"/>
                                                        <input id="pic_dest" type="text" placeholder="Description" class="form-control" name="pic_dest" value="{{$speciment_herbarium->species->character->description1}}">
                                                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                        <img src="http://placehold.it/200x200" id="showgambar" style="width: 100%;height:100%;float:left"/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <div class="col-md-12 col-md-offset-8 text-right">
                                                    <button type="button" class="col-md-2 btn btn-secondary" onclick="window.location''" >Previous</button>
                                                    <button type="submit" class="col-md-2 btn btn-primary" style="margin-left:10px" >Next</button>
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

     <!--Add field Name Species-->
        <script>
                $(document).ready(function() {
                    var max_fields      = 6; //maximum input boxes allowed
                    var wrapper         = $(".input_fields_wrap_name"); //Fields wrapper
                    var add_button      = $(".add_field_button_name"); //Add button ID

                    var x = 1; //initlal text box count
                    $(add_button).click(function(e){ //on add input button click
                        e.preventDefault();
                        if(x < max_fields){ //max input box allowed
                            x++; //text box increment
                            $("#rm").remove(); 
                        
                                $(wrapper).append('<div class="form-group{{ $errors->has('species+x+') ? ' has-error' : '' }}"><label for="species'+x+'" class="col-md-2 col-md-offset-1" style="text-align:left">Species'+x+'</label><div class="col-md-6"><i><input id="species'+x+'" type="text" placeholder="Species name" class="form-control" name="species'+x+'" value="{{$speciment_herbarium->species->name_species}}" require></i></div></div>'); //add input box
                            // $(wrapper).append('<div class="col-md-2 col-md-offset-2">')
                        
                        }
                    });

                    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                        e.preventDefault(); $("#divs").remove(); x--;
                        $("#divs").remove(); x--;
                        $("#divs").remove(); x--;
                        $("#divs").remove(); x--;

                        })
                });
            </script>

     <!--Add field Image-->
        <script>
                $(document).ready(function() {
                    var max_fields      = 6; //maximum input boxes allowed
                    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
                    var add_button      = $(".add_field_button"); //Add button ID

                    var x = 1; //initlal text box count
                    $(add_button).click(function(e){ //on add input button click
                        e.preventDefault();
                        if(x < max_fields){ //max input box allowed
                            x++; //text box increment
                            $("#rm").remove(); 
                        
                                $(wrapper).append('<div class="col-md-6"><input type="file" name="image'+x+'" id="inputgambar'+x+'" accept="image'+x+'/*" value=""/><input type="hidden" value="{{ csrf_token() }}" name="_token"><img src="http://placehold.it/200x200" id="showgambar'+x+'" style="width: 100%;height:100%;float:left;"/><a href="#" id="rm" class="remove_field">Remove</a></div><script type="text/javascript">function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();reader.onload = function (e) {$("#showgambar'+x+'").attr("src", e.target.result);}reader.readAsDataURL(input.files[0]);}}$("#inputgambar'+x+'").change(function () {readURL(this);})</' + 'script>'); //add input box
                            // $(wrapper).append('<div class="col-md-2 col-md-offset-2">')
                        
                        }
                    });

                    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                        e.preventDefault(); $("#divs").remove(); x--;
                        $("#divs").remove(); x--;
                        $("#divs").remove(); x--;
                        $("#divs").remove(); x--;

                        })
                });
        </script>
@endsection

