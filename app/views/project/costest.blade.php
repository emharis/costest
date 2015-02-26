<div class="span5" >
    <div class="widget" >
        <div class="widget-header"> <i></i>
            <h3>BUNDLING/SATU PAKET</h3>
        </div>
        <div class="widget-content" style="background-color: #ffb830;">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Estimasi Waktu</th>
                        <th>Cost Per Hour</th>
                        <th>Project Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $projectCost = 0; ?>
                    <?php $price = 0; ?>

                    @foreach($project->employees as $emp)
                    <?php $cost = $emp->pivot->cost_per_month / $project->hour_per_month * $project->fiturs()->sum('bobot'); ?>
                    <tr>
                        <td>{{$emp->nama}}</td>
                        <td class="number">{{$project->fiturs()->sum('bobot')}}</td>
                        <td class="number">{{number_format($emp->pivot->cost_per_month / $project->hour_per_month,0,',','.')}}</td>
                        <td class="number">{{number_format($cost,0,',','.')}}</td>
                    </tr>
                    <?php $projectCost += $emp->pivot->cost_per_month / $project->hour_per_month * $project->fiturs()->sum('bobot'); ?>
                    @endforeach
                    <tr style="background-color: whitesmoke;">
                        <td colspan="3"><b>TOTAL COST</b></td>
                        <td class="number"><b>{{ number_format($projectCost,0,',','.') }}</b></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>MARGIN</b></td>
                        <td class="number">
                            <b>{{number_format($projectCost*$project->margin / 100,0,',','.')}}</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>VARIABLE COST</b></td>
                        <td class="number">
                            <b>{{number_format($project->variablecosts()->sum('cost'),0,',','.')}}</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>PRICE</b></td>
                        <td class="number" >
                            <b>
                                {{ number_format($projectCost + ($projectCost * $project->margin / 100) + $project->variablecosts()->sum('cost')) }}
                            </b>
                        </td>
                    </tr>
                </tbody>
            </table>
            *Price = Project Cost + margin + variable cost
        </div>
    </div>
</div>

@foreach($project->moduls as $mod)
<div class="span5">
    <div class="widget">
        <div class="widget-header"> <i></i>
            <h3>{{$mod->nama}}</h3>
        </div>
        <div class="widget-content">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Estimasi Waktu</th>
                        <th>Cost Per Hour</th>
                        <th>Project Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $projectCost = 0; ?>
                    <?php $price = 0; ?>

                    @foreach($project->employees as $emp)
                    <?php $cost = $emp->pivot->cost_per_month / $project->hour_per_month * $mod->fiturs()->sum('bobot'); ?>
                    <tr>
                        <td>{{$emp->nama}}</td>
                        <td class="number">{{$mod->fiturs()->sum('bobot')}}</td>
                        <td class="number">{{number_format($emp->pivot->cost_per_month / $project->hour_per_month,0,',','.')}}</td>
                        <td class="number">{{number_format($cost,0,',','.')}}</td>
                    </tr>
                    <?php $projectCost += $emp->pivot->cost_per_month / $project->hour_per_month * $mod->fiturs()->sum('bobot'); ?>
                    @endforeach
                    <tr style="background-color: whitesmoke;">
                        <td colspan="3"><b>TOTAL COST</b></td>
                        <td class="number"><b>{{ number_format($projectCost,0,',','.') }}</b></td>
                    </tr>
                    <tr style="background-color: whitesmoke;">
                        <td colspan="3"><b>BUNDLED PRICE</b></td>
                        <td class="number"><b>
                                @if($mod->fiturs()->sum('bobot') > 0)
                                {{ number_format($projectCost + ($projectCost * $project->margin / 100)) }}
                                @else
                                0
                                @endif
                            </b></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>STAND ALONE PRICE</b></td>
                        <td class="number" ><b>
                                @if($mod->fiturs()->sum('bobot') > 0)
                                {{ number_format($projectCost + ($projectCost * $project->margin / 100) + $project->variablecosts()->sum('cost')) }}
                                @else
                                0
                                @endif

                            </b></td>
                    </tr>
                </tbody>
            </table>
            *Price = Project Cost + margin + variable cost
        </div>
    </div>
</div>
@endforeach



