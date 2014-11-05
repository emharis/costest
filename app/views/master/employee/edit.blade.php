@extends('layouts.master')

@section('main-content')
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-th-large">
			</i>
			<h3>
				Edit Employee
			</h3>
		</div>
		<!-- /widget-header -->
		<div class="widget-content">

			<div class="tab-pane" id="formcontrols">
				{{Form::open(array('url'=>URL::to('master/employee/edit')))}}
				<?php echo Form::hidden('employeeId',$var->id); ?>
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td>
								Nama
							</td>
							<td>
								:
							</td>
							<td>
								<?php echo Form::text('nama',$var->nama,array('class'=>'span10','autocomplete'=>'off')); ?>
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<button type="submit" class="btn btn-primary">Save</button>
								<a class="btn" href="{{URL::to('master/employee')}}">Cancel</a>
							</td>
						</tr>
					</tbody>
				</table>
				{{Form::close()}}

			</div>

		</div>
		<!-- /widget-content -->
	</div>
	<!-- /widget -->
</div>
<!-- /span6 -->
@stop