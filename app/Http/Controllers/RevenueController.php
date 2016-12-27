<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Revenue;
use Carbon\Carbon;
use Datatables;
use Excel;
use PDF;
use URL;

class RevenueController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('account.revenue.index');
    }

    public function store(Request $request){
        $input = $request->all();
        $date = Carbon::now()->toDateString();
        if(isset($request['import_file'])) {
            $file = $request['import_file'];
            if ($file != null) {
                $filename = $file->getRealPath();
                $rows = Excel::load($filename, function ($reader) {
                    $results = $reader->get();
                    return $results;
                });
            }
            $rows = $rows->toArray();
            $duplicate_item = [];
            foreach ($rows as $key => $row) {
                $alrd = Revenue::where(['dec_cuo_cod'=> $row['office'], 'dec_typ' => $row['type'], 'dec_yer' => $row['dec_year'], 'dec_nbr' => $row['dec_no'],])->first();
                if($alrd) array_push($duplicate_item, $row);
            }
            if(count($duplicate_item) > 0) {
                return view('account.revenue.index', ['duplicate'=>$duplicate_item]);
            } else {
                foreach ($rows as $key => $row){
                    $rev = array(
                        'dec_cuo_cod'       => $row['office'],
                        'dec_typ'           => $row['type'],
                        'dec_yer'           => $row['dec_year'],
                        'dec_nbr'           => $row['dec_no'],
                        'dec_dat'           => $row['dec_date'],
                        'recp_nbr'          => $row['receipt_no'],
                        'recp_dat'          => $row['receipt_date'],
                        'owner_nam'         => $row['owner_name'],
                        'gender'            => $row['gender'],
                        'nationality'       => $row['nationality'],
                        'passport_id'       => $row['idpassport'],
                        'address'           => $row['address'],
                        'company_vat'       => $row['company_vat'],
                        'company_nam'       => $row['company_name'],
                        'seizure_nbr'       => ($row['seizure_no'] != null) ?  $row['seizure_no'] : null,
                        'seizure_dat'       => ($row['seizure_date'] != null) ? $row['seizure_date'] : null,
                        'decision_nbr'      => ($row['decision_no'] != null) ? $row['decision_no'] : null,
                        'decision_dat'      => ($row['decision_date'] != null) ? $row['decision_date'] : null,
                        'hs_cod'            => $row['hs_code'],
                        'goods_desc'        => $row['goods_description'],
                        'gross_mass'        => $row['gross_mass'],
                        'net_mass'          => $row['net_mass'],
                        'exc_rate'          => $row['exc_rate'],
                        'item_price'        => $row['item_priceusd'],
                        'customs_value'     => $row['customs_valuekhr'],
                        'supp_unit'         => $row['supplementary_unit'],
                        'supp_qty'          => $row['supplementary_quantity'],
                        'vehicle_nbr'       => ($row['vehicle_doc'] != null) ? $row['vehicle_doc'] : null,
                        'vehicle_dat'       => ($row['vehicle_date'] != null) ? $row['vehicle_date'] : null,
                        'vignette'          => ($row['vignette'] != null) ? $row['vignette'] : null,
                        'chassis_nbr'       => ($row['chassis_no'] != null) ? $row['chassis_no'] : null,
                        'engine_nbr'        => ($row['engine_no'] != null) ? $row['engine_no'] : null,
                        'manufacture_yer'   => ($row['manufacture_year'] != null) ? $row['manufacture_year'] : null,
                        'cylinder'          => ($row['cylinder_capacity'] != null) ? $row['cylinder_capacity'] : null,
                        'steer'             => ($row['steer'] != null) ? $row['steer'] : null,
                        'cop'               => ($row['cop'] != null) ? $row['cop'] : null,
                        'sop'               => ($row['sop'] != null) ? $row['sop'] : null,
                        'vop'               => ($row['vop'] != null) ? $row['vop'] : null,
                        'atp'               => ($row['atp'] != null) ? $row['atp'] : null,
                        'cpp'               => ($row['cpp'] != null) ? $row['cpp'] : null,
                        'spp'               => ($row['spp'] != null) ? $row['spp'] : null,
                        'vpp'               => ($row['vpp'] != null) ? $row['vpp'] : null,
                        'vvf'               => ($row['vvf'] != null) ? $row['vvf'] : null,
                        'pim'               => ($row['pim'] != null) ? $row['pim'] : null,
                        'ofs'               => (array_key_exists('ofs', $row)) ? (($row['ofs'] != null) ? $row['ofs'] : null) : null,
                        'total_duty_tax'    => ($row['total_duty_tax'] != null) ? $row['total_duty_tax'] : null,
                        'valid_from'        => $date
                    );
                    Revenue::insert($rev);
                }
                return $this->printPDF($rows[0]['dec_date'], 1);
            }
        }
    }

    public function data(){
        $revenue = Revenue::get();
        $datatable =  Datatables::of($revenue)
            ->editColumn('dec_dat', function($row){
                return explode(" ", $row->dec_dat)[0];
            })
            ->addColumn('actions', function($row){
                $print_1 = "<a target='_blank' href='".URL::to('revenue/print')."/".$row->dec_dat."/1' title='Daily'><b style='font-size:15px;'>D</b></a>";
                $print_2 = "<a target='_blank' href='".URL::to('revenue/print')."/".$row->dec_dat."/2' title='Monthly'><b style='font-size:15px; padding-left: 10px; padding-right: 10px;'>M</b></a>";
                $print_3 = "<a target='_blank' href='".URL::to('revenue/print')."/".$row->dec_dat."/3' title='Quarterly'><b style='font-size:15px;'>Q</b></a>";
                $print_4 = "<a target='_blank' href='".URL::to('revenue/print')."/".$row->dec_dat."/4' title='Semester'><b style='font-size:15px; padding-left: 10px; padding-right: 10px;'>S</b></a>";
                $print_5 = "<a target='_blank' href='".URL::to('revenue/print')."/".$row->dec_dat."/5' title='Annually'><b style='font-size:15px;'>A</b></a>";
                return $print_1.$print_2.$print_3.$print_4.$print_5;
            })
        ;
        return($datatable->make(true));
    }

    public function printPDF($date, $category)
    {
        $date = explode(" ", $date)[0];
        if($category == 1) {
            $revenue = Revenue::where('dec_dat', $date)->get();
            $balance_items = Revenue::whereRaw("dec_dat >='".date(explode("-", $date)[0]."-".explode("-", $date)[1]."-01")."' and dec_dat <='".$date."'")->get();
        } else {
            if ($category == 2) {
                $revenue = Revenue::whereRaw("dec_dat >='" . date(explode("-", $date)[0] . "-" . explode("-", $date)[1] . "-01") . "' and dec_dat<='" . date(explode("-", $date)[0] . "-" . explode("-", $date)[1] . "-t") . "'")->get();
                $balance_items = Revenue::whereRaw("dec_dat >='".date(explode("-", $date)[0]."-01-01")."' and dec_dat <='".date(explode("-", $date)[0]."-".(explode("-", $date)[1]-1)."-t")."'")->get();
            } else if($category == 3) {
                if(explode("-", $date)[1] == 1) {
                    $start_date = null;
                } elseif (explode("-", $date)[1] == 2) {

                } elseif (explode("-", $date)[1] == 3) {

                } else {

                }
            }
        }
        $balance = 0;
        foreach ($balance_items as $balance_item) {
            $balance += $balance_item['total_duty_tax'] + $balance_item['pim'];
        }
//        return view('account.revenue.print', ['revenue'=>$revenue, 'date'=>$date, 'category'=>$category]);
        $pdf = PDF::loadView('account.revenue.print', ['balance'=>$balance, 'revenue'=>$revenue, 'date'=>$date, 'category'=>$category])->setWarnings(false);
        return $pdf->stream();
    }

}