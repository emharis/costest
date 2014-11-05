@extends('layouts.master')

@section('main-content')
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-th-large">
			</i>
			<h3>
				New Project
			</h3>
		</div>
		<!-- /widget-header -->
		<div class="widget-content">

			<div class="tab-pane" id="formcontrols">
				{{Form::open(array('url'=>URL::to('home/newproject'),'class'=>'form-horizontal'))}}
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="username">
								Nama Project
							</label>
							<div class="controls">
								<input name="nama" type="text" class="span10 "  required >
							</div> <!-- /controls -->
						</div> <!-- /control-group -->
						<div class="control-group">
							<label class="control-label">
								Project Icon
							</label>
							<div class="controls">
								<select name="icon_str" class="span8">
									<option value=" icon-glass">
										 icon-glass
									</option>
									<option value="icon-user">
										icon-user
									</option>
									<option value="icon-home">
										icon-home
									</option>
									<option value="icon-list-alt">
										icon-list-alt
									</option>
									<option value="icon-calendar">
										icon-calendar
									</option>
									<option value="icon-shopping-cart">
										icon-shopping-cart
									</option>
									<option value=" icon-comments">
										 icon-comments
									</option>
									<option value="icon-trophy">
										icon-trophy	
									</option>
									
								</select>
							</div> <!-- /controls -->
						</div> <!-- /control-group -->
						
						<div class="form-actions">
							<button type="submit" class="btn btn-primary">
								Save
							</button>
							<a class="btn" href="{{URL::to('home')}}" >
								Cancel
							</a>
						</div> <!-- /form-actions -->
					</fieldset>
					</fieldset>
				{{Form::close()}}
			</div>

		</div>
		<!-- /widget-content -->
	</div>
	<!-- /widget -->
</div>
<!-- /span6 -->
@stop