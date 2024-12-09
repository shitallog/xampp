<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Hash;
use Auth;
use DB;
use App\Models\User;
use Response;
use Redirect;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Shift;
use App\Exports\AttendanceExport;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Session;


class ClientController extends Controller
{
	public function __construct()
    {
        //$this->middleware('auth');
    }

    public function clientpanel()
    {
        if(!empty(session('client_id'))){ return redirect()->route('admin-dashboard'); }
        return view('client.clientlogin');
    }


    protected function client_login_postdata(Request $request)
    { 
        if($request->username != ""  && $request->password != "")
        {
            $user = DB::table("quickway_client")->where("username" , $request->username)->where('is_Active', '0')->first();
            if($user)
            {
            //  dd($user);
                $password = $request->password;
                if(md5($password) == $user->password)
                {
                    
                    Session::put('client_id', $user->client_id);
                    return redirect()->route('client-dashboard');
                    Session::flash('message', 'Welcome to Quickway.');
                   
                }
                else
                {
                    return Redirect::back()->withErrors(['msg' => 'Login failed, please check password!!!']);
                }
            }
            else
            {
                return Redirect::back()->withErrors(['msg' => 'Login failed, Username no not find!!!']);
            }
        }
        else
        {
            return Redirect::back()->withErrors(['msg' => 'Please Enter username no and password!!!']);
        }    
    }

    public function clientlogout(Request $request)
    {
        Session::flush();
        return redirect()->route('clientpanel');
    } 

    public function client_dashboard()
    {
        if(empty(session('client_id'))){ return redirect()->route('clientpanel'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '1');
        return view('client.header').view('client.client_dashboard').view('client.footer');
   } 


    public function pickup_location()
    {
        if(empty(session('client_id'))){ return redirect()->route('clientpanel'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '17');
        $id = session('client_id');
        $a1 =  DB::table("quickway_client")->where('client_id',$id)->first();
        return view('client.header').view('client.pickuplocation',compact('a1')).view('client.footer');
   }

   public function pickup_location_list(Request $request)
    {
        if ($request->ajax())
  		{
  			$data =  DB::table("client_pickup_location")->orderBy('id', 'DESC'); 
             return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('status', function($row)
				{
					if($row->is_Active == '0')
					{
						return $status = '<span class="badge bg-success">Active</span>';
					}
                    else
					{
						return $status =  '<span class="badge bg-danger">De-Active</span>';
					}
				})
                 ->addColumn('action', function($row)
 				{
                    $page_name = '12';
                    $actionBtn = '
					<a  data-bs-toggle="modal" data-bs-target="#mymodal" data-id="'.route('view_model', ['page_name' => $page_name, 'param2' => $row->id]).'" id="menu" class="edit btn btn-success btn-sm">Edit</a>';
                     return $actionBtn;
                })
                ->rawColumns(['status','action'])
                 ->make(true);
          }
    }


    public function pickuplocation_add(Request $request)
    {
	   $data1 = $request->all();

        if(empty($data1['return_type']))
        {
            $return_type = '0'; 
        }
        else
        {
            $return_type = $data1['return_type'];
        }
        $tags = implode(', ', $data1['working_days']);
	    $d5 = DB::table("client_pickup_location")->insert(
			 [
                "client_id"         => $data1['client_id'],
				"facility_name"         => $data1['facility_name'],
				"contact_person_name"   => $data1['contact_person_name'],
				"pickup_contact"        => $data1['pickup_contact'],
				"pickup_email"          => $data1['pickup_email'],
				"pickup_address"        => $data1['pickup_address'],
				"pincode"               => $data1['pincode'],
                "pickup_city"           => $data1['pickup_city'],
				"slot"                  => $data1['slot'],
                "working_days"          => $tags,
                "return_type"           => $return_type,
                "return_address"        => $data1['return_address'],
                "return_pincode"        => $data1['return_pincode'],
                "is_Active"              => '0',
			 ]
		);
		Session::flash('message', 'Pickup Location add successfully.');
		return redirect('pickup-location');
    }


    public function pickuplocation_edit(Request $request)
	{
        $data1 = $request->all();
        if(empty($data1['return_type']))
        {
            $return_type = '0'; 
        }
        else
        {
            $return_type = $data1['return_type'];
        }
        $tags = implode(', ', $data1['working_days']);
        $d5 = DB::table("client_pickup_location")->where("id",$data1['pickuplocation_id'])->update(
            [
                "facility_name"         => $data1['facility_name'],
				"contact_person_name"   => $data1['contact_person_name'],
				"pickup_contact"        => $data1['pickup_contact'],
				"pickup_email"          => $data1['pickup_email'],
				"pickup_address"        => $data1['pickup_address'],
				"pincode"               => $data1['pincode'],
                "pickup_city"           => $data1['pickup_city'],
				"slot"                  => $data1['slot'],
                "return_type"           => $return_type,
                "working_days"          => $tags,
                "return_address"        => $data1['return_address'],
                "return_pincode"        => $data1['return_pincode'],
                "is_Active"             => $data1['is_Active'],
            ]
        );
        Session::flash('message', 'Pickup Location update successfully.');
		return redirect('pickup-location');
    }


    public function company_deatils()
    {
        if(empty(session('client_id'))){ return redirect()->route('clientpanel'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '16');
        $id = session('client_id');
        $a1 =  DB::table("quickway_client")->where('client_id',$id)->first();
        return view('client.header').view('client.companydeatils',compact('a1')).view('client.footer');
    }

    public function bank_deatils()
    {
        if(empty(session('client_id'))){ return redirect()->route('clientpanel'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '18');
        $id = session('client_id');
        $a1 =  DB::table("quickway_client")->where('client_id',$id)->first();
        return view('client.header').view('client.bankdeatils',compact('a1')).view('client.footer');
   }

     public function bank_edit(Request $request)
	{
        $data1 = $request->all();
        $d5 = DB::table("quickway_client")->where("client_id",$data1['client_id'])->update(
            [
                "account_name"  => $data1['account_name'],
				"bank_name"     => $data1['bank_name'],
				"account_no"    => $data1['account_no'],
				"ifsc_code"     => $data1['ifsc_code'],
	        ]
        );
        Session::flash('message', 'Bank Details update successfully.');
		return redirect('bank-deatils');
    }

    public function shipping_charges()
    {
        if(empty(session('client_id'))){ return redirect()->route('clientpanel'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '19');
        $id = session('client_id');
        $a1 =  DB::table("quickway_client")->where('client_id',$id)->first();
        return view('client.header').view('client.shippingcharges',compact('a1')).view('client.footer');
    }

    public function calculate_charges()
    {
        if(empty(session('client_id'))){ return redirect()->route('clientpanel'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '15');
        $id = session('client_id');
        $a1 =  DB::table("quickway_client")->where('client_id',$id)->first();
        return view('client.header').view('client.calculatecharges',compact('a1')).view('client.footer');
   }

   public function charges_calculate_post(Request $request)
   {
       $client_id = session('client_id');
       $data1 = $request->all();
       $pickup_pincode = $data1['pickup_pincode'];
       $drop_pincode = $data1['drop_pincode'];
       $grms = $data1['grms'];

       if(empty($grms) || empty($drop_pincode) || empty($pickup_pincode))
       {
            //$response['status']     = 'success';
            //$response['keysu']     = 201;
       }
       else
       {
          $inkg = $grms/1000;
          if(($inkg > 0.5))
          {
            $integer = floor($inkg); // 1
            $decimal = $inkg - $integer; //0.3
            if($decimal == '0.0')
            {
                $kg =  (int)$inkg;
            }
            else
            {
                $kg =  (int)$inkg;
                $kg =  $kg+1;
            }
            
          }
          else
          {
              $kg = $inkg;
          }   
          
          $dc =  DB::table("pincode")->where('PINCODE',$drop_pincode)->first();
          $DESTINATION_CATEGORY = $dc->DESTINATION_CATEGORY;
          
          /*******************DTDC E-COM*********/
          if($DESTINATION_CATEGORY == 'METRO')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_surface_charges_dtc_ecom =  $client_surface_charges_dtc_ecom->metro;
    
                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_express_charges_dtc_ecom =  $client_express_charges_dtc_ecom->metro;
            }
            else
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_dtc_ecom =  $client_surface_charges_dtc_ecom->metro;

                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','Additional 500 mg')->first();
                $client_express_charges_dtc_ecom =  $client_express_charges_dtc_ecom->metro;
            }

          }
          elseif($DESTINATION_CATEGORY == 'ROI-B')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_surface_charges_dtc_ecom = $client_surface_charges_dtc_ecom->rol_a;
    
                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_express_charges_dtc_ecom = $client_express_charges_dtc_ecom->rol_a;
            }
            else
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_dtc_ecom = $client_surface_charges_dtc_ecom->rol_a;

                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','1 Kg')->first();
                $client_express_charges_dtc_ecom = $client_express_charges_dtc_ecom->rol_a;
            }
          }
          elseif($DESTINATION_CATEGORY == 'ROI-A')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_surface_charges_dtc_ecom = $client_surface_charges_dtc_ecom->rol_b;
    
                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_express_charges_dtc_ecom = $client_express_charges_dtc_ecom->rol_b;
            }
            else
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','1 Kg')->first();
                $client_surface_charges_dtc_ecom = $client_surface_charges_dtc_ecom->rol_b;

                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','1 Kg')->first();
                $client_express_charges_dtc_ecom = $client_express_charges_dtc_ecom->rol_b;
            }
          }
          elseif($DESTINATION_CATEGORY == 'ZONE')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_surface_charges_dtc_ecom = $client_surface_charges_dtc_ecom->zone;
    
                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_express_charges_dtc_ecom = $client_express_charges_dtc_ecom->zone;
            }
            else
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','1 Kg')->first();
                $client_surface_charges_dtc_ecom = $client_surface_charges_dtc_ecom->zone;

                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','1 Kg')->first();
                $client_express_charges_dtc_ecom = $client_express_charges_dtc_ecom->zone;
            }
          }
          elseif($DESTINATION_CATEGORY == 'INCITY')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_surface_charges_dtc_ecom = $client_surface_charges_dtc_ecom->city;
    
                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_express_charges_dtc_ecom = $client_express_charges_dtc_ecom->city;
            }
            else
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','1 Kg')->first();
                $client_surface_charges_dtc_ecom = $client_surface_charges_dtc_ecom->city;

                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','1 Kg')->first();
                $client_express_charges_dtc_ecom = $client_express_charges_dtc_ecom->city;
            }
          }
          elseif($DESTINATION_CATEGORY == 'SPECIAL DESTINATION')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_surface_charges_dtc_ecom = $client_surface_charges_dtc_ecom->spl_des;
    
                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_express_charges_dtc_ecom = $client_express_charges_dtc_ecom->spl_des;
            }
            else
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','1 Kg')->first();
                $client_surface_charges_dtc_ecom = $client_surface_charges_dtc_ecom->spl_des;

                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','1 Kg')->first();
                $client_express_charges_dtc_ecom = $client_express_charges_dtc_ecom->spl_des;
            }

          
          }
          elseif($DESTINATION_CATEGORY == 'REGION')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_surface_charges_dtc_ecom = $client_surface_charges_dtc_ecom->region;
    
                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','500 mg')->first();
                $client_express_charges_dtc_ecom = $client_express_charges_dtc_ecom->region;
            }
            else
            {
                $client_surface_charges_dtc_ecom =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','1 Kg')->first();
                $client_surface_charges_dtc_ecom = $client_surface_charges_dtc_ecom->region;

                $client_express_charges_dtc_ecom =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC E-COM')->where('weight','1 Kg')->first();
                $client_express_charges_dtc_ecom = $client_express_charges_dtc_ecom->region;
            }
            
          }
          
          if($kg <= '0.5')
          {
            $surface_charge_dtc_ecom = $client_surface_charges_dtc_ecom;
            $express_charge_dtc_ecom = $client_express_charges_dtc_ecom;
          }
          else
          {
            $surface_charge_dtc_ecom = $client_surface_charges_dtc_ecom*$kg;
            $express_charge_dtc_ecom = $client_express_charges_dtc_ecom*$kg;
          } 


          /**************************DELHIVERY************************/

          if($DESTINATION_CATEGORY == 'METRO')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->metro;
    
                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->metro;
            }
            else
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->metro;

                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->metro;
            }

          }
          elseif($DESTINATION_CATEGORY == 'ROI-B')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->rol_a;
    
                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->rol_a;
            }
            else
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->rol_a;

                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->rol_a;
            }
          }
          elseif($DESTINATION_CATEGORY == 'ROI-A')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->rol_b;
    
                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->rol_b;
            }
            else
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->rol_b;

                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->rol_b;
            }
          }
          elseif($DESTINATION_CATEGORY == 'ZONE')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->zone;
    
                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->zone;
            }
            else
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->zone;

                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->zone;
            }
          }
          elseif($DESTINATION_CATEGORY == 'INCITY')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->city;
    
                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->city;
            }
            else
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->city;

                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->city;
            }
          }
          elseif($DESTINATION_CATEGORY == 'SPECIAL DESTINATION')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->spl_des;
    
                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->spl_des;
            }
            else
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->spl_des;

                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->spl_des;
            }

          
          }
          elseif($DESTINATION_CATEGORY == 'REGION')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->region;
    
                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->region;
            }
            else
            {
                $client_surface_charges_DELHIVERY =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_DELHIVERY = $client_surface_charges_DELHIVERY->region;

                $client_express_charges_DELHIVERY =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DELHIVERY')->where('weight','Additional 500 mg')->first();
                $client_express_charges_DELHIVERY = $client_express_charges_DELHIVERY->region;
            }
            
          }
          
          if($kg <= '0.5')
          {
            $surface_charge_DELHIVERY = $client_surface_charges_DELHIVERY;
            $express_charge_DELHIVERY = $client_express_charges_DELHIVERY;
          }
          else
          {
            $surface_charge_DELHIVERY = $client_surface_charges_DELHIVERY*$kg;
            $express_charge_DELHIVERY = $client_express_charges_DELHIVERY*$kg;
          } 


          /**************************BEES************************/
          
          if($DESTINATION_CATEGORY == 'METRO')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->metro;
    
                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->metro;
            }
            else
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->metro;

                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->metro;
            }

          }
          elseif($DESTINATION_CATEGORY == 'ROI-B')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->rol_a;
    
                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->rol_a;
            }
            else
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->rol_a;

                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->rol_a;
            }
          }
          elseif($DESTINATION_CATEGORY == 'ROI-A')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->rol_b;
    
                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->rol_b;
            }
            else
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->rol_b;

                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->rol_b;
            }
          }
          elseif($DESTINATION_CATEGORY == 'ZONE')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->zone;
    
                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->zone;
            }
            else
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->zone;

                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->zone;
            }
          }
          elseif($DESTINATION_CATEGORY == 'INCITY')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->city;
    
                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->city;
            }
            else
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->city;

                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->city;
            }
          }
          elseif($DESTINATION_CATEGORY == 'SPECIAL DESTINATION')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->spl_des;
    
                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->spl_des;
            }
            else
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->spl_des;

                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->spl_des;
            }

          
          }
          elseif($DESTINATION_CATEGORY == 'REGION')
          {
            if($kg <= '0.5')
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->region;
    
                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->region;
            }
            else
            {
                $client_surface_charges_BEES =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_surface_charges_BEES = $client_surface_charges_BEES->region;

                $client_express_charges_BEES =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','BEES')->where('weight','Additional 500 mg')->first();
                $client_express_charges_BEES = $client_express_charges_BEES->region;
            }
            
          }
          
          if($kg <= '0.5')
          {
            $surface_charge_BEES = $client_surface_charges_BEES;
            $express_charge_BEES = $client_express_charges_BEES;
          }
          else
          {
            $surface_charge_BEES = $client_surface_charges_BEES*$kg;
            $express_charge_BEES = $client_express_charges_BEES*$kg;
          }

          /**************************TRACKON************************/
          
          if($DESTINATION_CATEGORY == 'METRO')
          {
            if($kg <= '1')
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->metro;
    
                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->metro;
            }
            else
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->metro;

                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->metro;
            }

          }
          elseif($DESTINATION_CATEGORY == 'ROI-B')
          {
            if($kg <= '1')
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->rol_a;
    
                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->rol_a;
            }
            else
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->rol_a;

                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->rol_a;
            }
          }
          elseif($DESTINATION_CATEGORY == 'ROI-A')
          {
            if($kg <= '1')
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->rol_b;
    
                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->rol_b;
            }
            else
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->rol_b;

                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->rol_b;
            }
          }
          elseif($DESTINATION_CATEGORY == 'ZONE')
          {
            if($kg <= '1')
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->zone;
    
                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->zone;
            }
            else
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->zone;

                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->zone;
            }
          }
          elseif($DESTINATION_CATEGORY == 'INCITY')
          {
            if($kg <= '1')
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->city;
    
                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->city;
            }
            else
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->city;

                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->city;
            }
          }
          elseif($DESTINATION_CATEGORY == 'SPECIAL DESTINATION')
          {
            if($kg <= '1')
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->spl_des;
    
                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->spl_des;
            }
            else
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->spl_des;

                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->spl_des;
            }

          
          }
          elseif($DESTINATION_CATEGORY == 'REGION')
          {
            if($kg <= '1')
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->region;
    
                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->region;
            }
            else
            {
                $client_surface_charges_TRACKON =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_surface_charges_TRACKON = $client_surface_charges_TRACKON->region;

                $client_express_charges_TRACKON =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','TRACKON')->where('weight','ADD 1 Kg')->first();
                $client_express_charges_TRACKON = $client_express_charges_TRACKON->region;
            }
            
          }
          
          
          if($kg <= '1')
          {
            $surface_charge_TRACKON = $client_surface_charges_TRACKON;
            $express_charge_TRACKON = $client_express_charges_TRACKON;
          }
          else
          {
            $surface_charge_TRACKON = $client_surface_charges_TRACKON*$kg;
            $express_charge_TRACKON = $client_express_charges_TRACKON*$kg;
          }



          /**************************DTDC HEAVY************************/
          
          if($DESTINATION_CATEGORY == 'METRO')
          {
            if($kg <= '3')
            {
                $client_surface_charges_dtdc_heavy =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy->metro;
    
                $client_express_charges_dtdc_heavy =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy->metro;
            }
            else
            {
                $client_surface_charges_dtdc_heavy =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM 3 KG')->first();
                $client_surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy->metro;

                $client_express_charges_dtdc_heavy =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM 3 KG')->first();
                $client_express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy->metro;
            }

          }
          elseif($DESTINATION_CATEGORY == 'ROI-B')
          {
            if($kg <= '3')
            {
                $client_surface_charges_dtdc_heavy =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy->rol_a;
    
                $client_express_charges_dtdc_heavy =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy->rol_a;
            }
            else
            {
                $client_surface_charges_dtdc_heavy =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM  3 KG')->first();
                $client_surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy->rol_a;

                $client_express_charges_dtdc_heavy =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM  3 KG')->first();
                $client_express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy->rol_a;
            }
          }
          elseif($DESTINATION_CATEGORY == 'ROI-A')
          {
            if($kg <= '3')
            {
                $client_surface_charges_dtdc_heavy =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy->rol_b;
    
                $client_express_charges_dtdc_heavy =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy->rol_b;
            }
            else
            {
                $client_surface_charges_dtdc_heavy =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM  3 KG')->first();
                $client_surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy->rol_b;

                $client_express_charges_dtdc_heavy =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM  3 KG')->first();
                $client_express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy->rol_b;
            }
          }
          elseif($DESTINATION_CATEGORY == 'ZONE')
          {
            if($kg <= '3')
            {
                $client_surface_charges_dtdc_heavy =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy->zone;
    
                $client_express_charges_dtdc_heavy =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy->zone;
            }
            else
            {
                $client_surface_charges_dtdc_heavy =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM  3 KG')->first();
                $client_surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy->zone;

                $client_express_charges_dtdc_heavy =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM  3 KG')->first();
                $client_express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy->zone;
            }
          }
          elseif($DESTINATION_CATEGORY == 'INCITY')
          {
            if($kg <= '3')
            {
                $client_surface_charges_dtdc_heavy =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy->city;
    
                $client_express_charges_dtdc_heavy =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy->city;
            }
            else
            {
                $client_surface_charges_dtdc_heavy =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM  3 KG')->first();
                $client_surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy->city;

                $client_express_charges_dtdc_heavy =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM  3 KG')->first();
                $client_express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy->city;
            }
          }
          elseif($DESTINATION_CATEGORY == 'SPECIAL DESTINATION')
          {
            if($kg <= '3')
            {
                $client_surface_charges_dtdc_heavy =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy->spl_des;
    
                $client_express_charges_dtdc_heavy =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy->spl_des;
            }
            else
            {
                $client_surface_charges_dtdc_heavy =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM  3 KG')->first();
                $client_surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy->spl_des;

                $client_express_charges_dtdc_heavy =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM  3 KG')->first();
                $client_express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy->spl_des;
            }

          
          }
          elseif($DESTINATION_CATEGORY == 'REGION')
          {
            if($kg <= '3')
            {
                $client_surface_charges_dtdc_heavy  =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_surface_charges_dtdc_heavy  = $client_surface_charges_dtdc_heavy ->region;
    
                $client_express_charges_dtdc_heavy  =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','ADD 1 KG')->first();
                $client_express_charges_dtdc_heavy  = $client_express_charges_dtdc_heavy ->region;
            }
            else
            {
                $client_surface_charges_dtdc_heavy  =  DB::table("client_surface_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM  3 KG')->first();
                $client_surface_charges_dtdc_heavy  = $client_surface_charges_dtdc_heavy ->region;

                $client_express_charges_dtdc_heavy  =  DB::table("client_express_charges")->where('client_id',$client_id)->where('vendor','DTDC HEAVY')->where('weight','MINIMUM  3 KG')->first();
                $client_express_charges_dtdc_heavy  = $client_express_charges_dtdc_heavy ->region;
            }
            
          }

          if($kg <= '3')
          {
            $surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy;
            $express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy;
          }
          elseif($kg >= '3')
          {
            $surface_charges_dtdc_heavy = $client_surface_charges_dtdc_heavy*$kg;
            $express_charges_dtdc_heavy = $client_express_charges_dtdc_heavy*$kg;
          }

          $pincod =  DB::table("pincod22")->where('Pincode',$drop_pincode)->first();

          //dd($pincod);
          
          $response['status']     = 'success';
          $response['surface_charge_dtc_ecom']     = $surface_charge_dtc_ecom;
          $response['express_charge_dtc_ecom']     = $express_charge_dtc_ecom;
          $response['surface_charge_DELHIVERY']     = $surface_charge_DELHIVERY;
          $response['express_charge_DELHIVERY']     = $express_charge_DELHIVERY;
          $response['surface_charge_BEES']     = $surface_charge_BEES;
          $response['express_charge_BEES']     = $express_charge_BEES;
          $response['surface_charge_TRACKON']     = $surface_charge_TRACKON;
          $response['express_charge_TRACKON']     = $express_charge_TRACKON;
          $response['surface_charges_dtdc_heavy']     = $surface_charges_dtdc_heavy;
          $response['express_charges_dtdc_heavy']     = $express_charges_dtdc_heavy;

          $response['state']     = $pincod->StateName;
          $response['city']     = $pincod->District;
          $response['keysu']     = 202;
       }
       echo json_encode($response);
   }


    public function forward_order()
    {
        if(empty(session('client_id'))){ return redirect()->route('clientpanel'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '20');
        $id = session('client_id');
        $a1 =  DB::table("quickway_client")->where('client_id',$id)->first();
        return view('client.header').view('client.forwardorder',compact('a1')).view('client.footer');
    }

   public function product_add_post(Request $request)
   {
        $client_id = session('client_id');
        $data1 = $request->all();
        $item_name = $data1['item_name'];
        $sku_code = $data1['sku_code'];
        $category = $data1['category'];
        $price = $data1['price'];
        $discount = $data1['discount'];
        $discount_type = $data1['discount_type'];

        if(empty($item_name) || empty($sku_code) || empty($category) || empty($price))
        {
            $response['status']     = 'success';
            $response['keysu']     = 201;
        }
        else
        {
            $d5 = DB::table("client_product")->insert(
                [
                   "client_id"     => $client_id,
                   "item_name"  => $item_name,
                   "sku_code"     => $sku_code,
                   "category"  => $category,
                   "price"     => $price,
                   "discount"  => $discount,
                   "discount_type"  => $discount_type,
                ]
           );

            $response['status']     = 'success';
            $response['keysu']     = 202;
        }

        echo json_encode($response);
   }

   public function serach_product(Request $request)
   {
      $client_id = session('client_id');
      $data1 = $request->all();
      $term = $data1['term'];
      
      $product =  DB::table('client_product')
      ->where('item_name', 'LIKE', '%'.$term.'%')
      ->where('client_id', $client_id)
      ->get();
      header('Content-Type: application/json');
      echo json_encode($product);
      exit;
   }

   public function product_row_post(Request $request)
   {
       $data1 = $request->all();
       $product_id = $data1['product_id'];
       $product =  DB::table("client_product")->where('product_id',$product_id)->first();
       if(empty($product))
       {
            $response['status']     = 'success';
            $response['keysu']     = 201;
       }
       else
       {
            $response['product_id']   = $product->product_id;
            $response['item_name']    = $product->item_name;
            $response['sku_code']     = $product->sku_code;
            $response['category']     = $product->category;
            $response['price']        = $product->price;
            $response['discount']     = $product->discount;
            $response['discount_type']= $product->discount_type;
            $response['status']     = 'success';
            $response['keysu']     = 202;
       }

       echo json_encode($response);
   }

   public function forwardorder_postdata(Request $request)
   {
       $client_id = session('client_id');
       $data1 = $request->all();
       
       if(!empty($data1['shipping_charge']) && $data1['pickup_location'] &&  $data1['cust_pincode'] &&  $data1['item_name'] &&  $data1['lenght'])
       {
            $last_id = DB::table("client_order")->insert(
                [
                "client_id"             => $client_id,
                "order_id"              => $data1['order_id'],
                "subtotal"              => $data1['subtotal'],
                "totaldiscount"         => $data1['totaldiscount'],
                "totalamount"           => $data1['totalamount'],
                "payment_mode"          => $data1['payment_mode'],
                "collect_amount"        => $data1['collect_amount'],
                "pickup_location"       => $data1['pickup_location'],
                "cust_fname"            => $data1['cust_fname'],
                "cust_lname"            => $data1['cust_lname'],
                "cust_mobile"           => $data1['cust_mobile'],
                "cust_email"            => $data1['cust_email'],
                "cust_alt_mobile"       => $data1['cust_alt_mobile'],
                "cust_pincode"          => $data1['cust_pincode'],
                "cust_country"          => $data1['cust_country'],
                "cust_state"            => $data1['cust_state'],
                "cust_city"             => $data1['cust_city'],
                "cust_address1"         => $data1['cust_address1'],
                "cust_address2"         => $data1['cust_address2'],
                "cust_billing_type"     => $data1['cust_billing_type'],
                "cust_billing_pincode"  => $data1['cust_billing_pincode'],
                "cust_billing_country"  => $data1['cust_billing_country'],
                "cust_billing_state"    => $data1['cust_billing_state'],
                "cust_billing_city"     => $data1['cust_billing_city'],
                "cust_billing_address1" => $data1['cust_billing_address1'],
                "cust_billing_address2" => $data1['cust_billing_address2'],
                "package_type"          => $data1['package_type'],
                "no_of_box"             => $data1['no_of_box'],
                "chargeable_weight"     => $data1['chargeable_weight'],
                "shipping_charge"       => $data1['shipping_charge'],
                "vendor_type"           => $data1['vendor_type'],
                "shipping_mode"         => $data1['shipping_mode'],
                "status"                => '0',
                ]);

                if(!empty($data1['item_name']))
                {
                    $cnt1 = count($data1['item_name']);
                    for($i=0; $i<$cnt1; $i++)
                    {
                        $d5 = DB::table("client_order_product")->insert(
                        [
                            "order_id"      => $data1['order_id'],
                            "product_id"    => $_POST['product_id'][$i],
                            "item_name"     => $_POST['item_name'][$i],
                            "price"         => $_POST['price'][$i] ,
                            "quantity"      => $_POST['quantity'][$i],
                            "discount"      => $_POST['discount'][$i],
                            "final_price"   => $_POST['final_price'][$i],
                        ]    
                        );
                    }
                }
                if(!empty($data1['lenght']))
                {
                    $cnt2 = count($data1['lenght']);
                    for($j=0; $j<$cnt2; $j++)
                    {
                        $d6 = DB::table("client_order_box")->insert(
                        [
                            "order_id"   => $data1['order_id'],
                            "lenght"     => $_POST['lenght'][$j],
                            "breadth"    => $_POST['breadth'][$j] ,
                            "height"     => $_POST['height'][$j],
                            "package_weight"    => $_POST['package_weight'][$j],
                        ]
                        );
                    }
                }
                Session::flash('message', 'Forward order add successfully.');
                return redirect('pending-order');
        }
        else
        {
                Session::flash('message', 'Shipping Charge OR Drop Pincode OR Pickup Location OR Product AND BOX Not be Empty.');
        }   
   } 
   
   
    public function pending_order()
    {
        if(empty(session('client_id'))){ return redirect()->route('clientpanel'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '21');
        return view('client.header').view('client.pendingorder').view('client.footer');
    }


   public function pending_order_list(Request $request)
   {
       $id = session('client_id');
       if ($request->ajax())
       {
            $data =  DB::table("client_order")->where('client_id', $id)->where('status', '0')->orderBy('id', 'DESC'); 
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('order_id', function($row)
                {
                   return $order_id = '<a href="'.route('forwardorder-edit', $row->order_id).'">'.$row->order_id.'</a><BR>'.date("d-m-Y H:i:A",strtotime($row->create_datetime));
                })
                
                ->addColumn('address', function($row)
                {
                    $client_pickup_location =  DB::table("client_pickup_location")->where('pincode',$row->pickup_location)->where('client_id',$row->client_id)->first();
                    return $address = '
                        <div class="pickup"><i class="fa fa-map-marker" aria-hidden="true"></i> '.$client_pickup_location->facility_name.' ('.$client_pickup_location->pickup_city.' - '.$row->pickup_location.')</div>
                        <div class="drop"><i class="fa fa-tint" aria-hidden="true"></i> '.$row->cust_fname.' '.$row->cust_lname.' ('.$row->cust_city.' - '.$row->cust_pincode.')</div>
                    ';
                })

                ->addColumn('package', function($row)
                {
                   return $package = 'Pkg Wt. '.$row->chargeable_weight.' gm<br>';
                })

                ->addColumn('payment', function($row)
                {
                    if($row->payment_mode == '0')
					{
                       return $payment = '₹ '.$row->collect_amount.'<BR> Pre-Paid';
                    }
                    else
                    {
                        return $payment = '₹ '.$row->collect_amount.'<BR> COD';
                    }   
                })

                ->addColumn('delivery', function($row)
                {
                    $pincode =  DB::table("pincode")->where('pincode',$row->cust_pincode)->first();
                    if($row->shipping_mode == '0')
					{
                        return $delivery = '<i class="fa fa-truck" aria-hidden="true"></i> Surface<BR>'.$pincode->DESTINATION_CATEGORY;
                    }
                    else
                    if($row->shipping_mode == '1')
					{
                        return $delivery = '<i class="fa fa-plane" aria-hidden="true"></i> Express<BR>'.$pincode->DESTINATION_CATEGORY;
                    }    
                })
                ->addColumn('vendor_type', function($row)
                {
                    return $vendor_type = $row->vendor_type;
                })
            ->rawColumns(['order_id','address','package','payment','delivery','vendor_type'])
            ->make(true);
        }
    }


    public function forwardorder_edit($id)
    {
        if(empty(session('client_id'))){ return redirect()->route('clientpanel'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '20');
        $client_order =  DB::table("client_order")->where('order_id',$id)->first();
        return view('client.header').view('client.forwardorderedit',compact('client_order')).view('client.footer');
    }


    public function invoice_print($id)
    {
        if(empty(session('client_id'))){ return redirect()->route('clientpanel'); } 
        $client_order =  DB::table("client_order")->where('order_id',$id)->first();
        return view('client.invoice_print',compact('client_order'));
    }


   public function add_product_qty(Request $request)
   {
       $data1 = $request->all();
       $product_id = $data1['product_id'];
       $qty= $data1['qty'];
       $product =  DB::table("client_product")->where('product_id',$product_id)->first();
       if(empty($product))
       {
            $response['status']     = 'success';
            $response['keysu']     = 201;
       }
       else
       {

            $response['price']     = $product->price*$qty - $product->discount*$qty;
            $response['discount']     = $product->discount*$qty;
            $response['status']     = 'success';
            $response['keysu']     = 202;
       }
       echo json_encode($response);
   }

   public function city_state_details(Request $request)
   {
       $client_id = session('client_id');
       $data1 = $request->all();
       $cust_billing_pincode = $data1['cust_billing_pincode'];
  

          $pincod =  DB::table("pincod22")->where('Pincode',$cust_billing_pincode)->first();

          //dd($pincod);
          $response['status']     = 'success';
          $response['state']     = $pincod->StateName;
          $response['city']     = $pincod->District;
          $response['keysu']     = 202;
       
       echo json_encode($response);
   }

   public function forwardorder_update(Request $request)
   {
       $client_id = session('client_id');
       $data1 = $request->all();

       $d5 = DB::table("client_order")->where("order_id",$data1['order_id'])->update(
        [
            "subtotal"              => $data1['subtotal'],
            "totaldiscount"         => $data1['totaldiscount'],
            "totalamount"           => $data1['totalamount'],
            "payment_mode"          => $data1['payment_mode'],
            "collect_amount"        => $data1['collect_amount'],
            "pickup_location"       => $data1['pickup_location'],
            "cust_fname"            => $data1['cust_fname'],
            "cust_lname"            => $data1['cust_lname'],
            "cust_mobile"           => $data1['cust_mobile'],
            "cust_email"            => $data1['cust_email'],
            "cust_alt_mobile"       => $data1['cust_alt_mobile'],
            "cust_pincode"          => $data1['cust_pincode'],
            "cust_country"          => $data1['cust_country'],
            "cust_state"            => $data1['cust_state'],
            "cust_city"             => $data1['cust_city'],
            "cust_address1"         => $data1['cust_address1'],
            "cust_address2"         => $data1['cust_address2'],
            "cust_billing_type"     => $data1['cust_billing_type'],
            "cust_billing_pincode"  => $data1['cust_billing_pincode'],
            "cust_billing_country"  => $data1['cust_billing_country'],
            "cust_billing_state"    => $data1['cust_billing_state'],
            "cust_billing_city"     => $data1['cust_billing_city'],
            "cust_billing_address1" => $data1['cust_billing_address1'],
            "cust_billing_address2" => $data1['cust_billing_address2'],
            "package_type"          => $data1['package_type'],
            "no_of_box"             => $data1['no_of_box'],
            "chargeable_weight"     => $data1['chargeable_weight'],
            "shipping_charge"       => $data1['shipping_charge'],
            "vendor_type"           => $data1['vendor_type'],
            "shipping_mode"         => $data1['shipping_mode'],
        ]
        );

        if(!empty($data1['item_name']))
        {
            $cnt1 = count($data1['item_name']);
            //dd($cnt1);
            for($i=0; $i<$cnt1; $i++)
            {
                if(!empty($_POST['order_product_id'][$i]))
                {
                    $d5 = DB::table("client_order_product")->where("id",$_POST['order_product_id'][$i])->update(
                    [
                        "item_name"    => $_POST['item_name'][$i],
                        "price"        => $_POST['price'][$i],
                        "quantity"     => $_POST['quantity'][$i],
                        "discount"     => $_POST['discount'][$i],
                        "final_price"  => $_POST['final_price'][$i],
                    ]
                    );
                }
                else
                {
                   /* $d5 = DB::table("client_order_product")->insert(
                    [
                        "order_id"      => $data1['order_id'],
                        "product_id"    => $_POST['product_id'][$i],
                        "item_name"     => $_POST['item_name'][$i],
                        "price"         => $_POST['price'][$i],
                        "quantity"      => $_POST['quantity'][$i],
                        "discount"      => $_POST['discount'][$i],
                        "final_price"   => $_POST['final_price'][$i],
                    ]
                    );*/
                }
                
                
            }
        }

        if(!empty($data1['lenght']))
        {
            $cnt2 = count($data1['lenght']);
            for($j=0; $j<$cnt2; $j++)
            {
                if(!empty($_POST['box_id'][$j]))
                {
                    $d6 = DB::table("client_order_box")->where("id",$_POST['box_id'][$j])->update(
                    [
                        "lenght"     => $_POST['lenght'][$j],
                        "breadth"    => $_POST['breadth'][$j] ,
                        "height"     => $_POST['height'][$j],
                        "package_weight"  => $_POST['package_weight'][$j],
                    ]
                    );
                }   
            }
        }

        Session::flash('message', 'Order Update successfully.');
		return redirect('forwardorder-edit/'.$data1['order_id']);
   } 


    public function product_list()
    {
       if(empty(session('client_id'))){ return redirect()->route('clientpanel'); } 
       session()->forget('active_menu');
       Session::put('active_menu', '22');
       $id = session('client_id');
       $a1 =  DB::table("client_product")->where('client_id',$id)->first();
       return view('client.header').view('client.productlist',compact('a1')).view('client.footer');
    }

    public function product_datatable(Request $request)
    {
        $id = session('client_id');
        if ($request->ajax())
  		{
  			$data =  DB::table("client_product")->where('client_id',$id)->orderBy('product_id', 'ASC'); 
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row)
            {
                $page_name = '16';
                $actionBtn = '
                <a data-bs-toggle="modal" data-bs-target="#mymodal" data-id="'.route('view_model', ['page_name' => $page_name, 'param2' => $row->product_id]).'" id="menu"  class="edit btn btn-success btn-sm">Edit</a>
                <a href="'.route('product-delete', $row->product_id).'" onclick="return confirm(`Are you sure? Want to Delete`)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    public function product_delete($id)
    {       
         DB::table('client_product')->where('product_id',$id)->delete();
         Session::flash('message', 'Product delete successfully.');
		 return redirect('product-list');
    }


    public function product_edit(Request $request)
	{
        $data1 = $request->all();
        $d5 = DB::table("client_product")->where("product_id",$data1['product_id'])->update(
            [
                "item_name"  => $data1['item_name'],
				"sku_code"   => $data1['sku_code'],
                "category"   => $data1['category'],
				"price"      => $data1['price'],
                "discount"   => $data1['discount'],
				"discount_type"  => $data1['discount_type'],
            ]
        );
        Session::flash('message', 'Product update successfully.');
		return redirect('product-list');
    }

    
 

} 


