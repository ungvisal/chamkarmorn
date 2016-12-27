@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{URL::to('/home')}}"><i class="fa fa-home"></i> Home</a></li> >
            Revenue
        </ol>
    </section>
    <br>
    <section class="content">
        <form method="post" class="form-horizontal" action="{{URL::to('revenue')}}" enctype='multipart/form-data' target="_blank">
            {{csrf_field()}}
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title box_title">Revenue</h3>
                </div>
                <div class="box-body">
                    <div class="form-group {{$errors->has('name')?'has-error':''}}">
                        <label for="reportType" class="col-md-4 control-label">Type of Report:</label>
                        <div class="col-md-4">
                            <select class="form-control reportType" name="report_type" id="report_type" value="{{old('name')}}" required>
                                <option value="daily" selected>1. Daily</option>
                                <option value="monthly">2. Monthly</option>
                                <option value="quarterly">3. Quarterly</option>
                                <option value="semester">4. Semester</option>
                                <option value="annually">5. Annually</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('code')?'has-error':''}}">
                        <label for="importFile" class="col-md-4 control-label">Attachment Doc:</label>
                        <div class="col-md-4">
                            <input type="file" class="form-control importFile" name="import_file" id="import_file" aria-invalid="false" value="{{old('code')}}">
                        </div>
                    </div>
                    @if(count($errors)>0)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="box-footer" style="text-align: right;">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        </form>

        @if(isset($duplicate) && ($duplicate!=null) )
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title box_title">Duplicated Revenue</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hovered table-condensed duplicate_table">
                        <thead>
                        <tr>
                            <th>Office</th>
                            <th>Reg. Serial</th>
                            <th>Reg. Number</th>
                            <th>Reg. Year</th>
                            <th>Reg. Date</th>
                            <th>Owner Name</th>
                            <th>Com. Code</th>
                            <th>Receipt</th>
                            <th>Duty & Tax</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($duplicate as $row)
                                <tr>
                                    <td>{{$row['office']}}</td>
                                    <td>{{$row['type']}}</td>
                                    <td>{{$row['dec_no']}}</td>
                                    <td>{{$row['dec_year']}}</td>
                                    <td>{{$row['dec_date']}}</td>
                                    <td>{{$row['owner_name']}}</td>
                                    <td>{{$row['company_vat']}}</td>
                                    <td>{{$row['receipt_no']}}</td>
                                    <td>{{$row['total_duty_tax']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title box_title">Revenue List</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped table-hovered table-condensed revenue_table">
                    <thead>
                    <tr>
                        <th>Office</th>
                        <th>Reg. Serial</th>
                        <th>Reg. Number</th>
                        <th>Reg. Year</th>
                        <th>Reg. Date</th>
                        <th>Owner Name</th>
                        <th>Com. Code</th>
                        <th>Receipt</th>
                        <th>Duty & Tax</th>
                        <th>Print</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="box-footer" style="text-align: right;">
                <button type="submit" class="btn btn-primary btn_search"><i class="fa fa-search"></i> Search</button>
            </div>
        </div>

    </section>
</div>

<script type="text/javascript">
    var revenue_data_table = null;
    var duplicate_data_table = null;

    $(document).ready(function () {
        initialDatatable("{{URL::to('revenue/data')}}");
        @if(isset($duplicate))
            duplicate_data_table = $(".duplicate_table").dataTable({
                "ordering": false,
                "searching": false,
                "lengthChange": false
            });
        @endif
    });

    $("body").on("click", ".btn_search", function(){
        revenue_data_table.destroy();
        var url = "{{URL::to('revenue/filter')}}/" + $(".month").val() + "/" + $(".year").val();
        initialDatatable(url);
    });

    function initialDatatable(url, data) {
        revenue_data_table = $('.revenue_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: typeof data=='undefined'? url : url+'?'+data,
            columns: [
                {data: 'dec_cuo_cod', sortable: false},
                {data: 'dec_typ', sortable: false},
                {data: 'dec_nbr'},
                {data: 'dec_yer'},
                {data: 'dec_dat'},
                {data: 'owner_nam'},
                {data: 'company_vat'},
                {data: 'recp_nbr'},
                {data: 'total_duty_tax'},
                {data: 'actions', sortable: false, searchable: false}
            ]
        });
    }

</script>

@endsection