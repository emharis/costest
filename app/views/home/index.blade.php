@extends('layouts.master')

@section('main-content')
<div class="span12">
    <div class="widget">
        <div class="widget-header"> <i class="icon-bookmark"></i>
            <h3>Projects</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
            <div class="shortcuts"> 
                @foreach($projects as $pj)
                	<a href="{{URL::to('project/open/'.$pj->id)}}" class="shortcut"><i class="shortcut-icon {{$pj->icon_str}}"></i><span class="shortcut-label">{{$pj->nama_project}}</span> </a>
                @endforeach
				<a href="{{URL::to('home/newproject')}}" class="shortcut"><i class="shortcut-icon icon-file"></i><span class="shortcut-label">Create Project</span> </a>
            <!-- /shortcuts --> 
        </div>
        <!-- /widget-content --> 
    </div>
    <!-- /widget -->
</div>
@stop