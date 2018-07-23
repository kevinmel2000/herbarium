@extends('invasive.base')

@section('action-content')
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">
        (function($){
            $(function(){
            $('.button-collapse').sideNav();
            }); //end of document rady
        })(jQuery); //end of jQuery name searchreplace
    </script>
    <section class="content">
        <div class="box">
            <div class="box header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-17">
                                    <div class="row bs-wizard" style="border-bottom" name="label">
                                        <h4 value="1"> Edit Collection</h4>
                                    </div>
                                    <div class="box">
                                        <form enctype="multipart/form-data"  class="form-horizontal" role="form" method="POST" action="{{ route('invasive.update', ['$id_ias' => $speciment_ias]) }}" style="margin-top:10px">
                                            <input type="hidden" name="_method" value="PATCH">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}" >
                                                    <label for="author" class="col-md-2 col-md-offset-1">Author Identification</label>
                                                    <div class="col-md-6">
                                                        <input id="author" type="text" placeholder="Author name" class="form-control" name="author" value="{{ $speciment_ias->author->name_author }}" autofocus>
                                                        @if ($errors->has('author'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('author') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}" >
                                                    <label for="family" class="col-md-2 col-md-offset-1">Family</label>
                                                    <div class="col-md-6">
                                                        <input id="family" type="text" placeholder="Family name" class="form-control" name="family" value="{{ $speciment_ias->species->genus->family->name_family }}" autofocus>
                                                        @if ($errors->has('family'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('family') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('genus') ? ' has-error' : '' }}">
                                                    <label for="genus" class="col-md-2 col-md-offset-1">Genus</label>
                                                    <div class="col-md-6">
                                                        <input id="genus" type="text" placeholder="Genus name" class="form-control" name="genus" value="{{ $speciment_ias->species->genus->name_genus }}" autofocus>
                                                            @if ($errors->has('genus'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('genus') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('species') ? ' has-error' : '' }}">
                                                    <label for="species" class="col-md-2 col-md-offset-1">Species</label>
                                                    <div class="col-md-6">
                                                        <i>
                                                            <input id="species" type="text" placeholder="Species name" class="form-control" name="species" value="{{$speciment_ias->species->name_species }}"  autofocus>
                                                        </i>
                                                        @if ($errors->has('species'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('species') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                           
                                                <div class="form-group{{ $errors->has('common_name') ? ' has-error' : '' }}">
                                                    <label for="common_name" class="col-md-2 col-md-offset-1">Common Name</label>
                                                    <div class="col-md-6">
                                                        <input id="common_name" type="text" placeholder="common name" class="form-control" name="common_name" value="{{ $speciment_ias->common_name }}"  autofocus>
                                                        @if ($errors->has('common_name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('common_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                           
                                                <div class="form-group{{ $errors->has('origin') ? ' has-error' : '' }}">
                                                    <label for="origin" class="col-md-2 col-md-offset-1">Origin</label>
                                                    <div class="col-md-6">
                                                        <input id="origin" type="text" placeholder="Origin" class="form-control" name="origin" value="{{ $speciment_ias->species->origin_species }}"  autofocus>
                                                        @if ($errors->has('origin'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('origin') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group{{ $errors->has('synonim') ? ' has-error' : '' }}">
                                                    <label for="synonim" class="col-md-2 col-md-offset-1">Synonim</label>
                                                    <div class="col-md-7">
                                                        <textarea id="synonim" type="text" class="form-control" oneKeyPress  placeholder="Synonim" name="synonim" autofocus>{!! $speciment_ias->species->species_synonim !!}</textarea>
                                                        @if ($errors->has('synonim'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('synonim') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $errors->has('invaded_habitat') ? ' has-error' : '' }}">
                                                    <label for="invaded_habitat" class="col-md-2 col-md-offset-1">Invaded Habitat</label>
                                                    <div class="col-md-7">
                                                        <textarea id="invaded_habitat" oneKeyPress placeholder="Description" class="form-control" name="invaded_habitat"   autofocus >{!! $speciment_ias->species->habitat !!}</textarea>
                                                        @if ($errors->has('invaded_habitat'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('invaded_habitat') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                    <label for="description" class="col-md-2 col-md-offset-1">Description</label>
                                                    <div class="col-md-7">
                                                        <textarea id="description"   oneKeyPress placeholder="Description" class="form-control" name="description"   autofocus >{!!$speciment_ias->species->description_species !!}</textarea>
                                                        @if ($errors->has('description'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('description') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="distribution" class="col-md-2 col-md-offset-1">Distribution</label>
                                                    <div class="col-md-7">
                                                        <textarea id="distribution"  oneKeyPressclass placeholder="Eistribution" class="form-control" name="distribution" >{!!$speciment_ias->distribution !!}</textarea>
                                                        @if ($errors->has('distribution'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('distribution') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="ecology" class="col-md-2 col-md-offset-1">Ecology</label>
                                                    <div class="col-md-7">
                                                        <textarea id="ecology"  oneKeyPress placeholder="Ecology" class="form-control" name="ecology"  >{!! $speciment_ias->species->ecology !!}</textarea>
                                                        @if ($errors->has('ecology'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('ecology') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="chemical_ctrl" class="col-md-2 col-md-offset-1">Chemical Control</label>
                                                    <div class="col-md-7">
                                                        <textarea id="chemical_ctrl"  oneKeyPress  placeholder="Chemical Control"class="form-control" name="chemical_ctrl"  >{!!$speciment_ias->control->chemical_ctrl!!}</textarea>
                                                        @if ($errors->has('chemical_ctrl'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('chemical_ctrl') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('manual_ctrl') ? ' has-error' : '' }}">
                                                    <label for="manual_ctrl" class="col-md-2 col-md-offset-1">Manual Control</label>
                                                    <div class="col-md-7">
                                                        <textarea id="manual_ctrl"  oneKeyPress placeholder="Manual Control" class="form-control" name="manual_ctrl"  >{!!$speciment_ias->control->manual_ctrl !!}</textarea>
                                                        @if ($errors->has('manual_ctrl'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('manual_ctrl') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('biological_ctrl') ? ' has-error' : '' }}">
                                                    <label for="biological_ctrl" class="col-md-2 col-md-offset-1">Biological Control </label>
                                                    <div class="col-md-7">
                                                        <textarea id="biological_ctrl"  oneKeyPress placeholder="Biological Control" class="form-control" name="biological_ctrl" >{!!$speciment_ias->control->biologycal_ctrl !!}</textarea>
                                                        @if ($errors->has('biological_ctrl'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('biological_ctrl') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('prevention') ? ' has-error' : '' }}">
                                                    <label for="preventioin" class="col-md-2 col-md-offset-1">Prevention</label>
                                                    <div class="col-md-7">
                                                        <textarea id="prevention"  oneKeyPress  placeholder="Prevention"class="form-control" name="prevention"  >{!! $speciment_ias->prevention !!}</textarea>
                                                        @if ($errors->has('prevention'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('prevention') }}</strong>
                                                        </span>
                                                        @endif    
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('utilization') ? ' has-error' : '' }}">
                                                    <label for="utilization" class="col-md-2 col-md-offset-1">Uses</label>
                                                    <div class="col-md-7">
                                                        <textarea id="utilization" oneKeyPress placeholder="Uses" class="form-control" name="utilization" >{!! $speciment_ias->utilization !!}</textarea>
                                                        @if ($errors->has('utilization'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('utilization') }}</strong>
                                                        </span>
                                                        @endif    
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('risk_analisis') ? ' has-error' : '' }}">
                                                    <label for="risk_analisis" class="col-md-2 col-md-offset-1">Risk Analysis</label>
                                                    <div class="col-md-7">
                                                        <textarea id="risk_analisis"  oneKeyPress placeholder="Risk Analysis" class="form-control" name="risk_analisis" >{!!$speciment_ias->risk_analisis!!}</textarea>
                                                        @if ($errors->has('risk_analisis'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('risk_analisis') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                                    <label for="contact" class="col-md-2 col-md-offset-1">Contact Person</label>
                                                    <div class="col-md-7">
                                                        <textarea id="contact" oneKeyPress placeholder="Contact Person" class="form-control" name="contact" >{!!$speciment_ias->contact_person!!}</textarea>
                                                        @if ($errors->has('contact'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('contact') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('reference') ? ' has-error' : '' }}">
                                                    <label for="reference" class="col-md-2 col-md-offset-1">Reference </label>
                                                    <div class="col-md-7">
                                                        <textarea id="input" oneKeyPress placeholder="Reference" class="form-control" name="reference"  autofocus>{!! $speciment_ias->reference!!}</textarea>
                                                        @if ($errors->has('reference'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('reference') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                           

                                                <div  class="form-group"> <!--form-group{{ URL::to('upload') }}-->
                                                    <label for="picture" class="col-md-2 col-md-offset-1" style="text-align:left">Select Image to Update</label>
                                                    <div class="col-md-8">
                                                        <a class="add_field_button  col-md-offset-10">Add More Fields</a>
                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}" methode="post" > <!--form-group{{ URL::to('upload') }}-->
                                                    <div class="input_fields_wrap col-md-7 col-md-offset-3">
                                                        <div class="col-md-6">
                                                            <input type="file" name="image" id="inputgambar" accept="image/*" value="{{$speciment_ias->species->character->picture_species}}"/>
                                                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                            <img src="http://placehold.it/200x200" id="showgambar" style="width: 100%;height:100%;float:left;"/>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group" >
                                                    <div class="col-md-12 col-md-offset-8 text-right" style="margin-top:50px">
                                                        <button type="button" class="col-md-2 btn btn-secondary" onclick="window.location='{{ url("invasive") }}'" >Cancel</button>
                                                        <button type="submit" class="col-md-2 btn btn-primary" style="margin-left:10px" >Submit</button>
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

     
     <!--Add field-->
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
                        
                                $(wrapper).append('<div class="col-md-6"><input type="file" name="image'+x+'" id="inputgambar'+x+'" accept="image'+x+'/*" value="{{$speciment_ias->species->character->picture_species}}"/><input type="hidden" value="{{ csrf_token() }}" name="_token"><img src="http://placehold.it/200x200" id="showgambar'+x+'" style="width: 100%;height:100%;float:left;"/><a href="#" id="rm" class="remove_field">Remove</a></div><script type="text/javascript">function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();reader.onload = function (e) {$("#showgambar'+x+'").attr("src", e.target.result);}reader.readAsDataURL(input.files[0]);}}$("#inputgambar'+x+'").change(function () {readURL(this);})</' + 'script>'); //add input box
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
