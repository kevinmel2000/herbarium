@extends('dashboard_view.briovitas.baseBrioView')

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
                                            Number Briovitas Herbarium
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