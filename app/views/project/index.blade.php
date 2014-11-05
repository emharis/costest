@extends('layouts.master')

@section('main-content')
<div class="span12">
    <div class="widget">
        <div class="widget-header"> <i class="icon-bookmark"></i>
            <h3>Project Profile</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
        	
						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li class="active" >
						    <a href="#projectprofile" data-toggle="tab">Project Profile</a>
						  </li>
						  <li><a href="#variablecost" data-toggle="tab">Variable Cost</a></li>
						  <li><a href="#employees" data-toggle="tab">Employees</a></li>
						  <li><a href="#modul" data-toggle="tab">Modul</a></li>
						  <li><a href="#fitur" data-toggle="tab">Fitur</a></li>
						  <li><a href="#cost" data-toggle="tab">Cost Estimation</a></li>
						</ul>
						
						<br>
						
							<div class="tab-content">
								<div class="tab-pane" id="projectprofile">
									{{Form::open(array('url'=>URL::to('project/save'),'class'=>'form-horizontal'))}}					
					<table class="table table-bordered ">
						<tbody>
							<tr>
								<td>Nama Project</td>
								<td>:</td>
								<td>
									{{Form::text('nama_project',$project->nama_project,array('class'=>'span4'))}}
								</td>
								<td></td>
								<td>Nama Client</td>
								<td>:</td>
								<td>
									{{Form::text('nama_client',$project->nama_client,array('class'=>'span4'))}}
								</td>
							</tr>
							<tr>
								<td>Project Icon</td>
								<td>:</td>
								<td>
									{{Form::select('icon_str',array(
										'icon-glass' => 'icon-glass',
										'icon-user' => 'icon-user',
										'icon-home' => 'icon-home',
										'icon-list-alt' => 'icon-list-alt',
										'icon-calendar' => 'icon-calendar',
										'icon-shopping-cart' => 'icon-shopping-cart',
										'icon-comments' => 'icon-comments',
										'icon-trophy' => 'icon-trphy'
									),$project->icon_str)}}
								</td>
								<td></td>
								<td>Alamat</td>
								<td>:</td>
								<td>
									{{Form::text('alamat',$project->alamat,array('class'=>'span4'))}}
								</td>
							</tr>
							<tr>
								<td>Contact Person</td>
								<td>:</td>
								<td>
									{{Form::text('cp',$project->cp,array('class'=>'span4'))}}
								</td>
								<td></td>
								<td>Telpon</td>
								<td>:</td>
								<td>
									{{Form::text('telp',$project->telp,array('class'=>'span4'))}}
								</td>
							</tr>
							<tr>
								<td>Status</td>
								<td>:</td>
								<td>
									{{Form::select('status',array(
									'Y' => 'Proses',
									'N' => 'Selesai'
								),$project->status)}}
								</td>
								<td></td>
								<td>Margin</td>
								<td>:</td>
								<td>
									{{Form::text('margin',$project->margin,array('class'=>'span4'))}}
								</td>
							</tr>
							<tr>
								<td>Deskripsi</td>
								<td>:</td>
								<td>
									{{Form::text('desc',$project->desc,array('class'=>'span4'))}}
								</td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									
								</td>
							</tr>
							<tr>
								<td colspan="7" style="text-align: right;">
									<button type="submit" class="btn btn-primary">
										Save
									</button>
								</td>
							</tr>
						</tbody>
					</table>
				{{Form::close()}}
								</div>
								<div class="tab-pane" id="variablecost">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Variabel</th>
												<th>Cost</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
										@foreach($vars  as $var)
										<tr>
											<td>
												$var->nama
											</td>
											<td>
												<input type="text" name="variable_{{$var->id}}" value="{{$var->cost}}" id="variable_{{$var->id}}" class="span1 uang" />
											</td>
											<td>
												<a class="button-edit" id="button_edit_{{$var->id}}" ><i class="icon-save"></i></a>
												<a class="button-delete" id="button_delete_{{$var->id}}" ><i class="icon-trash"></i></a>
											</td>
										</tr>
										@endforeach
										<tr>
											<td colspan="3" style="background-color: whitesmoke;color: transparent;">e</td>
										</tr>
											<tr>
												<td>
													<?php echo Form::select('variable',$varsel); ?>
												</td>
												<td>
													<?php echo Form::text('cost',null,array('class'=>'span2 uang')); ?>
												</td>
												<td><a id="button-add-varibale" class="btn btn-primary"><i class="icon-plus"></i></a></td>
											</tr>
										</tbody>
									</table>
									<script type="text/javascript">
										jQuery(document).ready(function(){
											/**
											* Button tambah variable cost
											*/	
											jQuery('#button-add-varibale').click(function(){
												insertVariable();
												
											});
											
											function insertVariable(){
												alert('ditambahkan ....');
												var variableId = jQuery('select[name=variable]').val();
												var cost = unformatRupiahVal(jQuery('input[name=cost]').val());
												var saveUrl = "{{URL::to('project/addvariablecost')}}";
												alert(saveUrl);
												jQuery.post(saveUrl,{
													'variableId':variableId,
													'cost':cost
												},function(data){
													alert('Data telah ditambahkan');
												});
											}
										});
									</script>
								</div>
								<div class="tab-pane" id="employees"></div>
								<div class="tab-pane" id="modul"></div>
								<div class="tab-pane" id="fitur"></div>
								<div class="tab-pane" id="cost"></div>
							</div>
						</div>
        <!-- /widget-content --> 
    </div>
    <!-- /widget -->
</div>
</div>
@stop