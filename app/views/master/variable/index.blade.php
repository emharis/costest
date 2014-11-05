@extends('layouts.master')

@section('main-content')
<div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-th-large"></i>
              <h3>Variable Cost</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <div class="tab-pane" >

				<fieldset>
				<div class="control-group">										
				<a href="{{URL::to('master/variable/new')}}" class="pull-right btn btn-primary">New</a>	
				
				</div> <!-- /control-group -->

				</fieldset>
				
				<br/>

				</div>
              <table class="table table-bordered">
				<thead>
					<tr>
						<th class="span1">No</th>
						<th>Nama</th>
						<th class="span1"></th>
					</tr>
				</thead>
				<tbody>
                                    <?php $rownum=1;?>
                                    @foreach($vars as $var)
                                    <tr>
                                        <td>{{$rownum++}}</td>
                                        <td>{{$var->nama}}</td>
                                        <td style="font-size: 1.3em;">
                                            <a href="{{URL::to('master/variable/edit/'.$var->id)}}"><i class="icon-edit"></i></a>
                                            &nbsp;
                                            <a><i class="icon-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
				</tbody>
			  </table>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
@stop