@extends('layouts.master')

@section('main-content')
<div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-th-large"></i>
              <h3>Employee</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <div class="tab-pane" >

				<fieldset>
				<div class="control-group">										
				<a href="{{URL::to('master/employee/new')}}" class="pull-right btn btn-primary">New</a>	
				
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
                                    @foreach($emps as $emp)
                                    <tr>
                                        <td>{{$rownum++}}</td>
                                        <td>{{$emp->nama}}</td>
                                        <td style="font-size: 1.3em;">
                                            <a href="{{URL::to('master/employee/edit/'.$emp->id)}}"><i class="icon-edit"></i></a>
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