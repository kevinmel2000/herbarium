                                        </div>
@extends('herbarium.lichenherba.base')

@section('action-content')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
    
    <section class="content">
        <div class="box">
            <div class="box header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-17">
                                    <div class="row bs-wizard" style="border-bottom" name="label">
                                        <h4 value="1"> Add new Collection</h4>
                                        <div class="col-xs-6 bs-wizard-step active">
                                            <div class="text-center bs-wizard-stepnum">Step 1</div>
                                            <div class="progress"><div class="progress-bar"></div></div>
                                            <a href="#" class="bs-wizard-dot"></a>
                                        </div>
                                        <div class="col-xs-6 bs-wizard-step disabled">
                                            <div class="text-center bs-wizard-stepnum">Step 2</div>
                                            <div class="progress"><div class="progress-bar"></div></div>
                                            <a href="#" class="bs-wizard-dot"></a>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <form class="form-horizontal" role="form" method="POST" action="{{ route('lichenherba.createnext') }}" style="margin-top:10px">
                                        {{ csrf_field() }}
                                        
                                            <!--Collector-->
                                            <label style="text-align= right margin-button:5px">
                                                <h5 style="text:arial narrow">Collector Data :</h5>
                                            </label>
                                                <div class="form-group{{ $errors->has('name_collector') ? ' has-error' : '' }}" >
                                                    <label for="name_collector" class="col-md-2 col-md-offset-1" style="text-align= left ">Collector Name</label>
                                                    <div class="col-md-6">
                                                        <input id="name_collector" type="text" class="form-control" placeholder="One of collector" name="name_collector" value="{{ old('name_collector') }}" require autofocus>

                                                        @if ($errors->has('name_collector'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name_collector') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('tim_collector') ? ' has-error' : '' }}" >
                                                    <label for="tim_collector" class="col-md-2 col-md-offset-1" style="text-align= left ">Collectors</label>
                                                    <div class="col-md-6">
                                                        <input id="tim_collector" type="text" class="form-control" placeholder="Another of collector" name="tim_collector" value="{{ old('tim_collector') }}" autofocus>

                                                        @if ($errors->has('tim_collector'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('tim_collector') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('date_collector') ? ' has-error' : '' }}" >
                                                    <label for="date_collector" class="col-md-2 col-md-offset-1" style="text-align= left ">Collector Date</label>
                                                    <div class="col-md-3">
                                                        <input id="date_collector" style="width: 200px ; height:34px" type="date" class="date-control" name="date_collector" value="{{ old('date_collector') }}" required autofocus>

                                                        @if ($errors->has('date_collector'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('date_collector') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                    
                                                <div class="form-group{{ $errors->has('number_collector') ? ' has-error' : '' }}" >
                                                    <label for="number_collector" class="col-md-2 col-md-offset-1"  style="text-align= left ">Collector Number</label>
                                                    <div class="col-md-3">
                                                        <input id="number_collector" type="number" class="form-control" placeholder="Number collector" name="number_collector" value="{{ old('number_collector') }}" required autofocus>

                                                        @if ($errors->has('number_collector'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('number_collector') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group{{ $errors->has('id_state') ? ' has-error' : '' }}" >
                                                    <label for="id_state" class="col-md-2 col-md-offset-1" style="text-align= left ">Country</label>
                                                    <div class="col-md-6">
                                                        <select  class="states" style="width: 430px ;  height:34px" id="id_state" name="id_state" value="{{ old('id_state') }}" autofocus>
                                                            @if(isset($state))
                                                                <option value="0" disabled="true" selected="true">--Choouse a Country--</option>
                                                                @foreach($state as $states)
                                                                    <option value="{{$states -> id_state}}">{{$states -> name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('id_prov') ? ' has-error' : '' }}" >
                                                    <label for="id_prov" class="col-md-2 col-md-offset-1" style="text-align= left ">Province</label>
                                                    <div class="col-md-6">
                                                        <select style="width: 430px ;  height:34px" class="province" id="id_prov" name="id_prov" value="{{ old('id_prov') }}" autofocus>
                                                            <option value="0" disabled="true" selected="true">--Choouse a Province--</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('id_city') ? ' has-error' : '' }}" >
                                                    <label for="id_city" class="col-md-2 col-md-offset-1" style="text-align= left ">City</label>
                                                    <div class="col-md-6">
                                                        <select style="width: 430px ;  height:34px" class="city"  id="id_city" name="id_city" value="{{ old('id_city') }}"  autofocus>
                                                            <option value="0" disabled="true" selected="true">--Choouse a City--</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('id_district') ? ' has-error' : '' }}" >
                                                    <label for="id_district" class="col-md-2 col-md-offset-1" style="text-align= left ">District</label>
                                                    <div class="col-md-6">
                                                        <select style="width: 430px ;  height:34px" class="districts" id="id_district" name="id_district" value="{{ old('id_district') }}" autofocus>
                                                            <option value="0" disabled="true" selected="true">--Choouse a District--</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group{{ $errors->has('name_vilage') ? ' has-error' : '' }}" >
                                                    <label for="name_vilage" class="col-md-2 col-md-offset-1" style="text-align= left ">Vilage</label>
                                                    <div class="col-md-6">
                                                        <input id="name_vilage" type="text" class="form-control" placeholder="Vilage Name" name="name_vilage" value="{{ old('name_vilage') }}" autofocus>
                                                        @if ($errors->has('name_vilage'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name_vilage') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}" >
                                                    <label for="latitude" class="col-md-2 col-md-offset-1" style="text-align= left ">Latitude</label>
                                                    <div class="col-md-6">
                                                        <input id="latitude" type="text" class="form-control" placeholder="Latitude" name="latitude" value="{{ old('latitude') }}" autofocus>

                                                        @if ($errors->has('latitude'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('latitude') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}" >
                                                    <label for="longitude" class="col-md-2 col-md-offset-1" style="text-align= left ">Longitude</label>
                                                    <div class="col-md-6">
                                                        <input id="longitude" type="text" class="form-control" placeholder="Longitude" name="longitude" value="{{ old('longitude') }}" autofocus>

                                                        @if ($errors->has('longitude'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('longitude') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('atitude') ? ' has-error' : '' }}" >
                                                    <label for="atitude" class="col-md-2 col-md-offset-1" style="text-align= left ">Atitude</label>
                                                    <div class="col-md-6">
                                                        <input id="atitude" type="text" class="form-control" placeholder="Atitude" name="atitude" value="{{ old('atitude') }}"autofocus>

                                                        @if ($errors->has('atitude'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('atitude') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('tim_collector') ? ' has-error' : '' }}" >
                                                    <label for="tim_collector" class="col-md-2 col-md-offset-1" style="text-align= left ">Maps</label>
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>

                                            <!--Determinate-->
                                            <label style="text-align= right margin-button:5px">
                                                <h5 style="text:arial narrow">Determinate Data :</h5>
                                            </label>
                                                <div class="form-group{{ $errors->has('name_author') ? ' has-error' : '' }}" >
                                                    <label for="name_author" class="col-md-2 col-md-offset-1" style="text-align= left ">Detemine Name</label>
                                                    <div class="col-md-6">
                                                        <input id="name_author" type="text" class="form-control" placeholder="Determine Name" name="name_author" value="{{ old('name_author') }}" require autofocus>

                                                        @if ($errors->has('name_author'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name_author') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('email_author') ? ' has-error' : '' }}" >
                                                    <label for="email_author" class="col-md-2 col-md-offset-1"  style="text-align= left ">Determine Email</label>
                                                    <div class="col-md-6">
                                                        <input id="email_author" type="email" class="form-control"   placeholder="Email" name="email_author" value="{{ old('email_author') }}"autofocus>

                                                        @if ($errors->has('email_author'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email_author') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('phone_author') ? ' has-error' : '' }}" >
                                                    <label for="phone_author" class="col-md-2 col-md-offset-1" style="text-align= left ">Detemine Phone</label>
                                                    <div class="col-md-6">
                                                        <input id="phone_author" type="text" class="form-control" placeholder="Phone Number" name="phone_author" value="{{ old('phone_author') }}" autofocus>

                                                        @if ($errors->has('phone_author'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('phone_author') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group{{ $errors->has('date_ident') ? ' has-error' : '' }}" >
                                                    <label for="date_ident" class="col-md-2 col-md-offset-1" style="text-align= left ">Determine Date</label>
                                                    <div class="col-md-6">
                                                        <input id="date_ident" type="date" class="date_ident" name="date_ident" value="{{ old('date_ident') }}" required autofocus>

                                                        @if ($errors->has('date_ident'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('date_ident') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group{{ $errors->has('agency') ? ' has-error' : '' }}" >
                                                    <label for="agency" class="col-md-2 col-md-offset-1" style="text-align= left ">Address</label>
                                                    <div class="col-md-6">
                                                        <textarea id="agency" type="date" class="agency" name="agency" value="{{ old('agency') }}"> </textarea>

                                                        @if ($errors->has('agency'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('agency') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div> 

                                            <div class="form-group">
                                                <br><br><br><br><br>
                                                <div class="col-md-12 col-md-offset-8 text-right" >
                                                    <button type="button" class="col-md-2 btn btn-secondary" onclick="window.location='{{ url("/herbarium-management/lichenherba") }}'" >Cancel</button>
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
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
         <script type="text/javascript">
            $(document).ready(function(){

                //----Province----
                $(document).on('change','.states',function(){
                    console.log("hmm its change");

                    var states_id=$(this).val();
                    console.log(states_id);
                    var div=$(this).parent();
                    
                    var op=" ";

                     $.ajax({
                        type:'get',
                        url:'{!!URL::to('herbarium-management/weedherba/create/findProv')!!}',
                        dataType:'json',
                        data:{'id':states_id},
                        
                        success:function(data){
                            console.log('success');

                            //console.log(data);
                            console.log(data.length);  
                            op+='<option value="0" selected disabled>--Choose a Province--</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].id_prov+'">'+data[i].name+'</option>';
                            }
                            //console.log(op);
                            div.find('.province').html(" ");
                            $('.province').append(op);
                            //console.log(div);

                        },
                        error:function(){

                        }
                     });
                });

                //----City----
                $(document).on('change','.province',function(){
                    console.log("hmm its change2");

                    var provs_id=$(this).val();
                    console.log(provs_id);
                    var div=$(this).parent().parent();
                    
                    var op=" ";

                     $.ajax({
                        type:'get',
                        url:'{!!URL::to('herbarium-management/weedherba/create/findCity')!!}',
                        dataType:'json',
                        data:{'id_prov':provs_id},
                        
                        success:function(data){
                            console.log('success');

                            //console.log(data);
                            console.log(data.length);  
                            op+='<option value="0" selected disabled>--Choose a City--</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].id_city+'">'+data[i].name+'</option>';
                            }
                            //console.log(op);
                            div.find('.city').html(" ");
                            $('.city').append(op);
                            //console.log(div);
                        },
                        error:function(){

                        }
                     });
                });

                //----Districts----
                $(document).on('change','.city',function(){
                    console.log("hmm its change3");

                    var citys_id=$(this).val();
                    console.log(citys_id);
                    var div=$(this).parent().parent().parent();
                    
                    var op=" ";

                     $.ajax({
                        type:'get',
                        url:'{!!URL::to('herbarium-management/lichenherba/create/findDists')!!}',
                        dataType:'json',
                        data:{'id_citys':citys_id},
                        
                        success:function(data){
                            console.log('success');

                            //console.log(data);
                            console.log(data.length);  
                            op+='<option value="0" selected disabled>--Choose a Districts--</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].id_districts+'">'+data[i].name+'</option>';
                            }
                            //console.log(op);
                            div.find('.districts').html(" ");
                            $('.districts').append(op);
                            //console.log(div);
                        },
                        error:function(){

                        }
                     });

                });
            });
         </script>
    </section>

@endsection