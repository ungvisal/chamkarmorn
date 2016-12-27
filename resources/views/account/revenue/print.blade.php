<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" type="image/gif" href="{{URL::to('plugins/pic')}}/GDCE-png.png" />
    <title>Print Document &raquo; Chamkarmorn District Customs and Excise Office</title>
    <link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Battambang" rel="stylesheet">
    <style type="text/css">
        table.table{
            width: 100%;
            border-collapse: collapse;
        }
        table.table, td {
            border: 1px solid;
            padding-left: 3px;
            padding-right: 3px;
            padding-top: 7px;
            padding-bottom: 7px;
        }
        table.table thead{
            display: table-header-group;
            font-family: Moul;
            font-size: 15px;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        table.table tbody {
            display: table-row-group;
            font-family: Battambang;
            font-size: 15px;
        }
        table.table tr { page-break-inside: avoid; }
        div.page_break{
            page-break-after: always;
        }
        div.general_header{
            width: 250px;
            padding: 0px;
            padding-left: 600px;
            font-family: Moul;
            font-size: 17px;
            text-align: center;
        }
        div.general_title{
            padding: 0px;
            font-family: Moul;
            font-size: 16px;
        }
        div.title{
            padding: 0px;
            width: 100%;
            text-align: center;
            font-family: Moul;
            font-size: 17px;
        }
        span.general_content{
            font-family: Battambang;
            font-size: 16px;
        }
        div.general_footer{
            width: 100%;
            font-family: Moul;
            font-size: 15px;
            text-align: right !important;
        }
        div.footer_date{
            font-family: Battambang;
            font-size: 16px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 15px;
        }
        img.sign {
            position: absolute;
            right: 70px;
            top: 65px;
        }
        span.rotate{
            display: block;
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
        }
        div.bar_code{
            position: absolute;
            left: 10px;
            top: 150px;
        }
    </style>
</head>

<body>
<div class="general_header">
    ព្រះរាជាណាចក្រកម្ពុជា<br>
    ជាតិ សាសនា ព្រះមហាក្សត្រ
</div>
<div class="general_title">
    សាខាគយនិងរដ្ឋាកររាជធានីភ្នំពេញ<br>
    ការិយាល័យគយនិងរដ្ឋាករខណ្ឌចំការមន<br>
    <span class="general_content">
        លេខៈ........................../{{toKhmer(date('y'))}} អគរ.ស.រភ/ក.ខច
    </span>
</div>
<div class="title">
    ស្ថានភាពប្រាក់ពន្ធ<br>
    <span class="general_content">
        @if($category == 1)
	    	<b>ប្រចាំថ្ងៃទី{{toKhmer(explode("-", $date)[2])}}&nbsp;ខែ{{monthToKhmer(explode("-", $date)[1])}}&nbsp;ឆ្នាំ{{toKhmer(explode("-", $date)[0])}}</b>
        @elseif($category == 2)
            <b>ប្រចាំខែ{{monthToKhmer(explode("-", $date)[1])}}</b>
        @elseif($category == 3)
            <b>ប្រចាំត្រីមាសទី</b>
        @elseif($category == 4)
            <b>ប្រចាំឆមាសទី</b>
        @elseif($category == 5)
            <b>ប្រចាំឆ្នាំ</b>
        @endif
	</span>
    <?php
        $cif_total = 0;
        for($i=0; $i<count($revenue); $i++){
            $cif_total += $revenue[$i]['customs_value'];
        }
    ?>
    <span class="general_content" style="width: 30%; position: absolute; text-align: right; right: 10px;">CIF: ៛{{number_format($cif_total, 2)}}</span>
</div>
<div style="padding-top: 5px;">
    <table class="table">
        <thead>
        <tr>
            <td rowspan="2" class="nbr">ល.រ</td>
            <td rowspan="2">ប្រភេទពន្ធ</td>
            <td rowspan="2">ប្រាក់ពន្ធ</td>
            <td colspan="2">សៀវភៅ</td>
            <td rowspan="2">បង្កាន់ដៃ</td>
            <td rowspan="2">ល្អ</td>
            <td rowspan="2">ខូច</td>
            <td rowspan="2">បង់<br>ឡើង</td>
            <td rowspan="2">សរុប</td>
            <td rowspan="2">ផ្សេងៗ</td>
        </tr>
        <tr>
            <td class="td_type_nbr">ប្រភេទ</td>
            <td class="td_type_nbr">លេខ</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="text-align: center;">I</td>
            <td>VPP (VAT ផលិតផលប្រេង)</td>
            <?php
                $vpp_total = 0;
                for($i=0; $i<count($revenue); $i++){
                    $vpp_total += $revenue[$i]['vpp'];
                }
            ?>
            <td style="text-align: center;">{{($vpp_total != 0) ? number_format($vpp_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            <?php
                $min = $revenue[0]['dec_nbr'];
                $max = $revenue[0]['dec_nbr'];
                for($i=1; $i<count($revenue); $i++){
                    $min = ($revenue[$i]['dec_nbr'] < $min) ? $revenue[$i]['dec_nbr'] : $min;
                    $max = ($revenue[$i]['dec_nbr'] > $max) ? $revenue[$i]['dec_nbr'] : $max;
                }
            ?>
            <td style="text-align: center;">{{$revenue[0]['dec_yer']." D"}}{{(count($revenue)>1) ? ($min." - ".$max) : $min}}</td>
            <td style="text-align: center;">{{count($revenue)}}</td>
            <td></td>
            <td></td>
            <td style="text-align: center;">{{count($revenue)}}</td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center;">II</td>
            <td>VOT (VAT ក្រៅពីផលិតផលប្រេង)</td>
            <?php
                $vop_total = 0;
                for($i=0; $i<count($revenue); $i++){
                    $vop_total += $revenue[$i]['vop'];
                }
            ?>
            <td style="text-align: center;">{{($vop_total != 0) ? number_format($vop_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            <?php
            $min = $revenue[0]['recp_nbr'];
            $max = $revenue[0]['recp_nbr'];
            for($i=1; $i<count($revenue); $i++){
                $min = ($revenue[$i]['recp_nbr'] < $min) ? $revenue[$i]['recp_nbr'] : $min;
                $max = ($revenue[$i]['recp_nbr'] > $max) ? $revenue[$i]['recp_nbr'] : $max;
            }
            ?>
            <td style="text-align: center;">{{(count($revenue)>1) ? ($min." - ".substr($max, 6)) : $min}}</td>
            <td style="text-align: center;">{{count($revenue)}}</td>
            <td></td>
            <td></td>
            <td style="text-align: center;">{{count($revenue)}}</td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center;">III</td>
            <td>SPP (ST ផលិតផលប្រេង)</td>
            <?php
                $spp_total = 0;
                for($i=0; $i<count($revenue); $i++){
                    $spp_total += $revenue[$i]['spp'];
                }
            ?>
            <td style="text-align: center;">{{($spp_total != 0) ? number_format($spp_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            <?php
                $min = $revenue[0]['vehicle_nbr'];
                $max = $revenue[0]['vehicle_nbr'];
                $veh_total = 0;
                for($i=1; $i<count($revenue); $i++){
                    $min = ($revenue[$i]['vehicle_nbr'] < $min) ? $revenue[$i]['vehicle_nbr'] : $min;
                    $max = ($revenue[$i]['vehicle_nbr'] > $max) ? $revenue[$i]['vehicle_nbr'] : $max;
                }
                foreach($revenue as $row){
                    $veh_total += ($row['vehicle_nbr'] != null) ? 1 : 0;
                }
            ?>
            <td style="text-align: center;">{{$revenue[0]['dec_yer']." V"}}{{(count($revenue)>1) ? (substr($min, 2)." - ".substr($max, 2)) : substr($min, 2)}}</td>

            <td style="text-align: center;">{{$veh_total}}</td>
            <td></td>
            <td></td>
            <td style="text-align: center;">{{$veh_total}}</td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center;">IV</td>
            <td>SOP (ST ក្រៅពីផលិតផលប្រេង)</td>
            <?php
                $sop_total = 0;
                for($i=0; $i<count($revenue); $i++){
                    $sop_total += $revenue[$i]['sop'];
                }
            ?>
            <td style="text-align: center;">{{($sop_total != 0) ? number_format($sop_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center;">V</td>
            <td>CPP (CD ផលិតផលប្រេង)</td>
            <?php
                $cpp_total = 0;
                for($i=0; $i<count($revenue); $i++){
                    $cpp_total += $revenue[$i]['cpp'];
                }
            ?>
            <td style="text-align: center;">{{($cpp_total != 0) ? number_format($cpp_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center;">VI</td>
            <td>COP (CD ក្រៅពីផលិតផលប្រេង)</td>
            <?php
                $cop_total = 0;
                for($i=0; $i<count($revenue); $i++){
                    $cop_total += $revenue[$i]['cop'];
                }
            ?>
            <td style="text-align: center;">{{($cop_total != 0) ? number_format($cop_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center;">VII</td>
            <td>ATP (អាករបន្ថែម)</td>
            <?php
                $atp_total = 0;
                for($i=0; $i<count($revenue); $i++){
                    $atp_total += $revenue[$i]['atp'];
                }
            ?>
            <td style="text-align: center;">{{($atp_total != 0) ? number_format($atp_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center;">VIII</td>
            <td>PIM (ពិន័យពីការនាំចូល)</td>
            <?php
                $pim_total = 0;
                for($i=0; $i<count($revenue); $i++){
                    $pim_total += $revenue[$i]['pim'];
                }
            ?>
            <td style="text-align: center;">{{($pim_total != 0) ? number_format($pim_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center;">IX</td>
            <td>លតាប័ត្ររថយន្ត</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>ប្រភេទទី១៖ XXXXXX</td>
            <?php
                $vvf_total = 0;
                $vignette = [];
                for($i=0; $i<count($revenue); $i++){
                    if(strlen($revenue[$i]['vignette']) == 6){
                        $vvf_total += $revenue[$i]['vvf'];
                        array_push($vignette, $revenue[$i]['vignette']);
                    }
                }
                if(count($vignette)>0){
                    $min = $vignette[0];
                    $max = $vignette[0];
                    $not_order = false;
                    for($i=0; $i<count($vignette); $i++){
                        $min = (($vignette[$i] < $min) && ($vignette[$i]==($min-1))) ? $vignette[$i] : $min;
                        $not_order = (($vignette[$i] < $min) && ($vignette[$i]!=($min-1))) ? true : $not_order;
                        $max = (($vignette[$i] > $max) && ($vignette[$i]==($max+1))) ? $vignette[$i] : $max;
                        $not_order = (($vignette[$i] > $max) && ($vignette[$i]!=($max+1))) ? true : $not_order;
                    }
                }
            ?>
            <td style="text-align: center;">{{($vvf_total != 0) ? number_format($vvf_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            @if(count($vignette)>0)
                @if($not_order)
                    @for($i=0; $i<count($vignette); $i++)
                        <td style="text-align: center;">{{$vignette[$i]}}</td>
                        @if($i < count($vignette)-1)
                            <br>
                        @endif
                    @endfor
                @else
                    <td style="text-align: center;">{{$min." - ".substr($max, 3)}}</td>
                @endif
            @else
                <td></td>
            @endif
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>ប្រភេទទី២៖ ៩៩-XXXXXX</td>
            <?php
                $vvf_total = 0;
                $vignette = [];
                for($i=0; $i<count($revenue); $i++){
                    if(strlen($revenue[$i]['vignette']) == 9 && substr($revenue[$i]['vignette'], 0, 2)=="99"){
                        $vvf_total += $revenue[$i]['vvf'];
                        array_push($vignette, $revenue[$i]['vignette']);
                    }
                }
                if(count($vignette)>0){
                    $min = substr($revenue[0]['vignette'], 3);
                    $max = substr($revenue[0]['vignette'], 3);
                    $not_order = false;
                    for($i=0; $i<count($vignette); $i++){
                        $min = ((substr($revenue[$i]['vignette'], 3) < $min) && (substr($revenue[$i]['vignette'], 3)==($min-1))) ? substr($revenue[$i]['vignette'], 3) : $min;
                        $not_order = ((substr($revenue[$i]['vignette'], 3) < $min) && (substr($revenue[$i]['vignette'], 3)!=($min-1))) ? true : $not_order;
                        $max = ((substr($revenue[$i]['vignette'], 3) > $max) && (substr($revenue[$i]['vignette'], 3)==($max+1))) ? substr($revenue[$i]['vignette'], 3) : $max;
                        $not_order = ((substr($revenue[$i]['vignette'], 3) > $max) && (substr($revenue[$i]['vignette'], 3)!=($max+1))) ? true : $not_order;
                    }
                }
            ?>
            <td style="text-align: center;">{{($vvf_total != 0) ? number_format($vvf_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            @if(count($vignette)>0)
                @if($not_order)
                    @for($i=0; $i<count($vignette); $i++)
                        <td style="text-align: center;">99-{{$vignette[$i]}}</td>
                        @if($i < count($vignette)-1)
                            <br>
                        @endif
                    @endfor
                @else
                    <td style="text-align: center;">99-{{$min." - ".substr($max, 3)}}</td>
                @endif
            @else
                <td></td>
            @endif
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>ប្រភេទទី៣៖ ០០-XXXXXX</td>
            <?php
                $vvf_total = 0;
                $vignette = [];
                for($i=0; $i<count($revenue); $i++){
                    if(strlen($revenue[$i]['vignette']) == 9 && substr($revenue[$i]['vignette'], 0, 2)=="00"){
                        $vvf_total += $revenue[$i]['vvf'];
                        array_push($vignette, $revenue[$i]['vignette']);
                    }
                }
                if(count($vignette)>0){
                    $min = substr($revenue[0]['vignette'], 3);
                    $max = substr($revenue[0]['vignette'], 3);
                    $not_order = false;
                    for($i=0; $i<count($vignette); $i++){
                        $min = ((substr($revenue[$i]['vignette'], 3) < $min) && (substr($revenue[$i]['vignette'], 3)==($min-1))) ? substr($revenue[$i]['vignette'], 3) : $min;
                        $not_order = ((substr($revenue[$i]['vignette'], 3) < $min) && (substr($revenue[$i]['vignette'], 3)!=($min-1))) ? true : $not_order;
                        $max = ((substr($revenue[$i]['vignette'], 3) > $max) && (substr($revenue[$i]['vignette'], 3)==($max+1))) ? substr($revenue[$i]['vignette'], 3) : $max;
                        $not_order = ((substr($revenue[$i]['vignette'], 3) > $max) && (substr($revenue[$i]['vignette'], 3)!=($max+1))) ? true : $not_order;
                    }
                }
            ?>
            <td style="text-align: center;">{{($vvf_total != 0) ? number_format($vvf_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            @if(count($vignette)>0)
                @if($not_order)
                    @for($i=0; $i<count($vignette); $i++)
                        <td style="text-align: center;">00-{{$vignette[$i]}}</td>
                        @if($i < count($vignette)-1)
                            <br>
                        @endif
                    @endfor
                @else
                    <td style="text-align: center;">00-{{$min." - ".substr($max, 3)}}</td>
                @endif
            @else
                <td></td>
            @endif
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>ប្រភេទទី៤៖ ០៥-XXXXXX</td>
            <?php
                $vvf_total = 0;
                $vignette = [];
                for($i=0; $i<count($revenue); $i++){
                    if(strlen($revenue[$i]['vignette']) == 9 && substr($revenue[$i]['vignette'], 0, 2)=="05"){
                        $vvf_total += $revenue[$i]['vvf'];
                        array_push($vignette, $revenue[$i]['vignette']);
                    }
                }
                if(count($vignette)>0){
                    $min = substr($revenue[0]['vignette'], 3);
                    $max = substr($revenue[0]['vignette'], 3);
                    $not_order = false;
                    for($i=0; $i<count($vignette); $i++){
                        $min = ((substr($revenue[$i]['vignette'], 3) < $min) && (substr($revenue[$i]['vignette'], 3)==($min-1))) ? substr($revenue[$i]['vignette'], 3) : $min;
                        $not_order = ((substr($revenue[$i]['vignette'], 3) < $min) && (substr($revenue[$i]['vignette'], 3)!=($min-1))) ? true : $not_order;
                        $max = ((substr($revenue[$i]['vignette'], 3) > $max) && (substr($revenue[$i]['vignette'], 3)==($max+1))) ? substr($revenue[$i]['vignette'], 3) : $max;
                        $not_order = ((substr($revenue[$i]['vignette'], 3) > $max) && (substr($revenue[$i]['vignette'], 3)!=($max+1))) ? true : $not_order;
                    }
                }
            ?>
            <td style="text-align: center;">{{($vvf_total != 0) ? number_format($vvf_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            @if(count($vignette)>0)
                @if($not_order)
                    @for($i=0; $i<count($vignette); $i++)
                        <td style="text-align: center;">05-{{$vignette[$i]}}</td>
                        @if($i < count($vignette)-1)
                            <br>
                        @endif
                    @endfor
                @else
                    <td style="text-align: center;">05-{{$min." - ".substr($max, 3)}}</td>
                @endif
            @else
                <td></td>
            @endif
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>ប្រភេទទី៥៖ ១០-XXXXXX</td>
            <?php
                $vvf_total = 0;
                $vignette = [];
                for($i=0; $i<count($revenue); $i++){
                    if(strlen($revenue[$i]['vignette']) == 9 && substr($revenue[$i]['vignette'], 0, 2)=="10"){
                        $vvf_total += $revenue[$i]['vvf'];
                        array_push($vignette, $revenue[$i]['vignette']);
                    }
                }
                if(count($vignette)>0){
                    $min = substr($revenue[0]['vignette'], 3);
                    $max = substr($revenue[0]['vignette'], 3);
                    $not_order = false;
                    for($i=0; $i<count($vignette); $i++){
                        $min = ((substr($revenue[$i]['vignette'], 3) < $min) && (substr($revenue[$i]['vignette'], 3)==($min-1))) ? substr($revenue[$i]['vignette'], 3) : $min;
                        $not_order = ((substr($revenue[$i]['vignette'], 3) < $min) && (substr($revenue[$i]['vignette'], 3)!=($min-1))) ? true : $not_order;
                        $max = ((substr($revenue[$i]['vignette'], 3) > $max) && (substr($revenue[$i]['vignette'], 3)==($max+1))) ? substr($revenue[$i]['vignette'], 3) : $max;
                        $not_order = ((substr($revenue[$i]['vignette'], 3) > $max) && (substr($revenue[$i]['vignette'], 3)!=($max+1))) ? true : $not_order;
                    }
                }
            ?>
            <td style="text-align: center;">{{($vvf_total != 0) ? number_format($vvf_total, 0) : ""}}</td>
            <td></td>
            <td></td>
            @if(count($vignette)>0)
                @if($not_order)
                    @for($i=0; $i<count($vignette); $i++)
                        <td style="text-align: center;">10-{{$vignette[$i]}}</td>
                        @if($i < count($vignette)-1)
                            <br>
                        @endif
                    @endfor
                @else
                    <td style="text-align: center;">10-{{$min." - ".substr($max, 3)}}</td>
                @endif
            @else
                <td></td>
            @endif
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center;">X</td>
            <td>ត្រាពន្ធគយ</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php
            $ofs_total = 0;
            for($i=0; $i<count($revenue); $i++){
                $ofs_total += $revenue[$i]['ofs'];
            }
        ?>
        @if($ofs_total == 0)
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @else

        @endif
        <tr>
            <td></td>
            <td style="text-align: center; font-family: Moul; font-size: 15px;">សរុបរួម</td>
            <?php
                $total = 0;
                for($i=0; $i<count($revenue); $i++){
                    $total += $revenue[$i]['total_duty_tax'] + $revenue[$i]['pim'];
                }
            ?>
            <td style="text-align: center;"><b>{{number_format($total, 0)}}</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="bar_code">
    <?php
        $grand_total = $balance+$total;
        $qr_str="ស្ថានភាពប្រាក់ពន្ធPNH43 ~ យោងដើមគ្រា:៛".number_format($balance, 0)."~ថ្ងៃទី".$date.":".number_format($total, 0)."~សរុបចុងគ្រា:".number_format($grand_total, 0);
    ?>
    <img width="50px" src="data:image/png;base64,{{DNS2D::getBarcodePNG($qr_str, "QRCODE")}}" alt="barcode"/>
</div>
<div class="footer_date">
    ភ្នំពេញ, ថ្ងៃទី{{($category==1) ? toKhmer(explode("-", $date)[2]) : toKhmer(date('t'))}}&nbsp;ខែ{{monthToKhmer(explode("-", $date)[1])}}&nbsp;ឆ្នាំ{{toKhmer(explode("-", $date)[0])}}
</div>
<div class="general_footer">
    ប្រធានការិយាល័យគយនិងរដ្ឋាករខណ្ឌចំការមន
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    គណនេយ្យសាខា
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    បេឡាសាខា
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    គណនេយ្យករ<br><br><br><br>
    តែ ប៊ុនធី
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    អ៊ុយ ពិសី
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    ម៉ែន ស៊ីថា
</div>
</body>

<?php
    function toKhmer($element){
        $Array = array(
            '0'=>'០',
            '1'=>'១',
            '2'=>'២',
            '3'=>'៣',
            '4'=>'៤',
            '5'=>'៥',
            '6'=>'៦',
            '7'=>'៧',
            '8'=>'៨',
            '9'=>'៩'
        );
        $str = "";
        for($i=0;$i<strlen($element);$i++){
            $str = $str.$Array[substr($element, $i,1)];
        }
        return $str;
    }
    function monthToKhmer($month){
        $month = intval($month);
        $Array=array(
            '1'=>'មករា',
            '2'=>'កុម្ភៈ',
            '3'=>'មីនា',
            '4'=>'មេសា',
            '5'=>'ឧសភា',
            '6'=>'មិថុនា',
            '7'=>'កក្កដា',
            '8'=>'សីហា',
            '9'=>'កញ្ញា',
            '10'=>'តុលា',
            '11'=>'វិច្ឆិកា',
            '12'=>'ធ្នូ'
        );
        return $Array[$month];
    }
?>

</html>