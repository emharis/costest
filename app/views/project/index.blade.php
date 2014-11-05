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
                        {{Form::hidden('projectId',$project->id)}}
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
                                <?php $varcost = 0; ?>
                                @foreach($project->variablecosts  as $var)
                                <tr>
                                    <td id="variable-name-{{$var->id}}">
                                        {{$var->nama}}
                                    </td>
                                    <td class="number">
                                        <input type="text" name="variable_{{$var->id}}" value="{{number_format($var->pivot->cost,0,',','.')}}" id="variable_{{$var->id}}" class="span2 uang" />
                                    </td>
                                    <td style="font-size: 1.3em;">
                                        <a class="button-update" variableId="{{$var->id}}" id="button_update_{{$var->id}}" ><i class="icon-save"></i></a>&nbsp;
                                        <a class="button-delete" variableId="{{$var->id}}" id="button_delete_{{$var->id}}" ><i class="icon-trash"></i></a>
                                    </td>
                                </tr>
                                <?php $varcost+=$var->pivot->cost; ?>
                                @endforeach
                                <tr id="tr-separator">
                                    <td colspan="3" style="background-color: whitesmoke;color: transparent;">e</td>
                                </tr>
                                <tr>
                                    <td><b>TOTAL VARIABLE COST</b></td>
                                    <td class="number" id="total-var-cost" style="font-weight: bolder;">{{number_format($varcost,0,',','.')}}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo Form::select('variable', $varsel); ?>
                                    </td>
                                    <td>
                                        <?php echo Form::text('cost', null, array('class' => 'span2 uang')); ?>
                                    </td>
                                    <td><a id="button-add-varibale" class="btn btn-primary"><i class="icon-plus"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                        <script type="text/javascript">
                            jQuery(document).ready(function () {
                                var totalVarCost = 0;
                                function setTotalVarCost() {
                                    totalVarCost = unformatRupiahVal($('#total-var-cost').text());
                                }
                                setTotalVarCost();
                                /**
                                 * Button tambah variable cost
                                 */
                                jQuery('#button-add-varibale').click(function () {
                                    if ($('select[name=variable] option').length > 0) {
                                        insertVariable();
                                    } else {
                                        alert('Tidak ada vairable cost yang dapat ditambahkan');
                                    }

                                });
                                /**
                                 * Insert variable ke database
                                 * @returns {undefined}
                                 */
                                function insertVariable() {
                                    var projectId = jQuery('input[name=projectId]').val();
                                    var variableId = jQuery('select[name=variable]').val();
                                    var variableName = jQuery('select[name=variable] option:selected').text();
                                    var cost = unformatRupiahVal(jQuery('input[name=cost]').val());
                                    if (cost != '') {

                                        var saveUrl = "{{URL::to('project/addvariablecost')}}";
                                        jQuery.post(saveUrl, {"projectId": projectId, "variableId": variableId, "cost": cost}, function (data) {
                                            //tambahkan ke tabel
                                            jQuery('#tr-separator').before('<tr><td id="variable-name-' + variableId + '">' + variableName + '</td><td style="text-align:right;"><input type="text" name="variable_' + variableId + '" value="' + formatRupiahVal(cost) + '" id="variable_' + variableId + '" class="span2 uang" /></td><td style="font-size:1.3em;" ><a class="button-update" variableId="' + variableId + '" id="button_update_' + variableId + '" ><i class="icon-save"></i></a>&nbsp;<a class="button-delete" variableId="' + variableId + '" id="button_delete_' + variableId + '" ><i class="icon-trash"></i></a></td></tr>');
                                            //clear text input
                                            $('input[name=cost]').val('');
                                            //remove from select
                                            jQuery("select[name=variable] option[value='" + variableId + "']").remove();
                                            //recalculate total variable cost
                                            totalVarCost = parseInt(cost) + parseInt(totalVarCost);
                                            //show cost to table
                                            $('#total-var-cost').text(formatRupiahVal(totalVarCost));
                                        }).fail(function (data) {
                                            alert('simpan gagal');
                                        });
                                    } else {
                                        alert('Lengkapi data yang kosong');
                                        $('input[name=cost]').focus();
                                    }

                                }
                                /**
                                 * Delete variable dari proyek 
                                 */

                                $(document).on('click', '.button-delete', function () {
                                    var projectId = jQuery('input[name=projectId]').val();
                                    var variableId = $(this).attr('variableId');
                                    var variableName = $.trim($('#variable-name-' + variableId).text());
                                    var cost = unformatRupiahVal($('input[name=variable_' + variableId + ']').val());
                                    var removeUrl = "{{URL::to('project/removevariablecost')}}";
                                    var obj = $(this);

                                    $.post(removeUrl, {
                                        "variableId": variableId,
                                        "projectId": projectId
                                    }, function (data) {
                                        //remove from table
                                        obj.parent().parent().fadeOut(500, function () {
                                            alert('Deleted')
                                        });
                                        //recalculta total
                                        totalVarCost = parseInt(totalVarCost) - parseInt(cost);
                                        //show cost to table
                                        $('#total-var-cost').text(formatRupiahVal(totalVarCost));
                                        //add deleted item ke select variable
                                        $('select[name=variable]').append($('<option>', {
                                            value: variableId,
                                            text: variableName
                                        }));
                                    }).fail(function () {
                                        alert('delete gagal');
                                    });

                                });

                                /**
                                 * Update cost
                                 */
                                $(document).on('click', '.button-update', function () {
                                    var projectId = jQuery('input[name=projectId]').val();
                                    var variableId = $(this).attr('variableId');
                                    var variableName = $.trim($('#variable-name-' + variableId).text());
                                    var cost = unformatRupiahVal($('input[name=variable_' + variableId + ']').val());
                                    var updateUrl = "{{URL::to('project/updatevariablecost')}}";
                                    var obj = $(this);

                                    $.post(updateUrl, {
                                        "variableId": variableId,
                                        "projectId": projectId,
                                        "cost": cost
                                    }, function (data) {
                                        alert('Data telah diupdate');
                                        //recalculta total
                                        totalVarCost = data;
                                        //show cost to table
                                        $('#total-var-cost').text(formatRupiahVal(totalVarCost));
                                    }).fail(function (data) {
                                        alert('Update Gagal');
                                    });
                                });


                            });
                        </script>
                    </div>
                    <div class="tab-pane" id="employees">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Cost per Month</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($project->employees as $emp)
                                <tr>
                                    <td>{{$emp->nama}}</td>
                                    <td>
                                        {{Form::text('employee_cost_'.$emp->id,$emp->cost_per_month)}}
                                    </td>
                                    <td style="font-size: 1.3em;">
                                        <a class="btn-update-employee" ><i class="icon-save"></i></a>&nbsp;
                                        <a class="btn-delete-employee" ><i class="icon-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                <tr id="employee-tr-separator">
                                    <td colspan="3" style="background-color: whitesmoke;color: transparent;">e</td>
                                </tr>
                                <tr>
                                    <td>
                                        {{Form::select('employee',$empsel)}}
                                    </td>
                                    <td>
                                        {{Form::text('employee_cost',null,array('class'=>'span2 uang','autocomplete'=>'off'))}}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" id="btn-add-employee"><i class="icon-plus"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                /**
                                 * Insert new Employee
                                 */
                                $('#btn-add-employee').click(function(){
                                   alert('ok');
                                });
                            })
                        </script>
                    </div>
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