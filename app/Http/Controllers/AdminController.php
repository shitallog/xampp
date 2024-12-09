<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Imports\PincodeImport; // Make sure to create this Import class;
use App\Models\Product;
use App\Models\Service;
use App\Models\pincode;
use Mail;
use Illuminate\Support\Facades\Log;

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


class AdminController extends Controller
{
	public function __construct()
    {
        //$this->middleware('auth');
    }

    public function admin_dashboard()
    {
       // dd(session('user_id'));
        if(empty(session('user_id'))){ return redirect()->route('login'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '1');
        return view('layout.header').view('admin.dashboard').view('layout.footer');
   } 

    public function pincode()
    {
       // dd(session('user_id'));
        if(empty(session('user_id'))){ return redirect()->route('login'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '2');
        return view('layout.header').view('admin.pincode').view('layout.footer');
    } 



public function view_model($page_name = '', $param2 = '')
{
    // Fetching the dynamic page name based on the provided ID
    $modelpagename = DB::table("modelpagename")->where("id", $page_name)->first();
    
    if ($modelpagename) {
        $page_name = $modelpagename->page_name; 
    } else {
        // Fallback if no page name is found
        $page_name = 'default_page';
    }

    // Prepare the data to pass to the view
    $data['param2'] = $param2;
    
    // Return the corresponding dynamic page view
    return view('viewmodal.' . $page_name, $data);
}

public function pincode_list(Request $request)
{
    if ($request->ajax()) {
        $data = DB::table("services")->orderBy('id', 'ASC');
        
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $page_name = '1'; // The dynamic page id for 'services' page
                $actionBtn = '
                    <a data-bs-toggle="modal" data-bs-target="#mymodal" 
                       data-id="' . route('view_model', ['page_name' => $page_name, 'param2' => $row->id]) . '" 
                       id="menu" class="edit btn btn-success btn-sm">Edit</a>
                    <a href="' . route('pincode-delete', $row->id) . '" 
                       onclick="return confirm(`Are you sure? Want to Delete`)" 
                       class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}

public function pincode_add(Request $request)
{
    $data1 = $request->all();
    DB::table("services")->insert(
        [
            "name" => $data1['name'],
        ]
    );
    Session::flash('message', 'Service added successfully.');
    return redirect('service-master');
}

public function pincode_delete($id)
{
    DB::table('services')->where('id', $id)->delete();
    Session::flash('message', 'Service deleted successfully.');
    return redirect('service-master');
}

public function pincode_edit(Request $request)
{
    $data = $request->all();
    DB::table('services')
        ->where('id', $data['service_id'])
        ->update([
            'name' => $data['name'],
        ]);

    Session::flash('message', 'Service updated successfully.');
    return redirect('service-master');
}

public function B2B()
{
	if(empty(session('user_id'))){ return redirect()->route('login'); } 
	session()->forget('active_menu');
	Session::put('active_menu', '3');
	return view('layout.header').view('admin.B2B').view('layout.footer');
}




// Fetch B2B products list for DataTable
public function B2B_list(Request $request)
{
    if ($request->ajax()) {
        $data = DB::table("products")
            ->join('services', 'products.service_id', '=', 'services.id')
            ->select('products.id', 'products.product_name', 'services.name as service_name') // Adjusted column name
            ->orderBy('products.id', 'DESC');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $page_name = '4';
                $actionBtn = '
                 <a data-bs-toggle="modal" data-bs-target="#mymodal" 
                       data-id="' . route('view_model', ['page_name' => $page_name, 'param2' => $row->id]) . '" 
                       id="menu" class="edit btn btn-success btn-sm">Edit</a>
                <a href="' . route('B2B-delete', $row->id) . '" onclick="return confirm(`Are you sure? Want to Delete`)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}


// Add a new product



public function B2B_add(Request $request)
{
    try {
        // Validate incoming data
        $data = $request->validate([
            'service_id' => 'required|exists:services,id',
            'product_name' => 'required|string|max:255',
        ]);

        // Insert the new product into the 'products' table
        DB::table('products')->insert([
            'service_id' => $data['service_id'],
            'product_name' => $data['product_name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Set success message and redirect
        Session::flash('message', 'Product added successfully.');
        return redirect()->route('product-master');

    } catch (\Exception $e) {
        // Log the error and return the generic message
        Log::error('Error adding product: ' . $e->getMessage());
        return redirect()->back()->withErrors(['message' => 'Something went wrong, Please try again...']);
    }
}

public function getProductsByService(Request $request)
{
    $serviceId = $request->service_id;

    if (!$serviceId) {
        return response()->json([], 400);
    }

    // Fetch products for the given service
    $products = Product::where('service_id', $serviceId)->get(['id', 'product_name']);

    return response()->json($products);
}


public function getServices()
{
    // Fetch services
    $services = Service::all();

    // Return services as JSON, returning the 'name' and 'id' for each service
    return response()->json($services);
}



// Edit an existing product
public function B2B_edit(Request $request)
{
    $data = $request->all();

    // Check if 'id' is in the request
    if (isset($data['id'])) {
        DB::table("products")->where("id", $data['id'])->update([
            'service_id' => $data['service_id'],
            'product_name' => $data['product_name'],
            'updated_at' => now(),
        ]);

        Session::flash('message', 'Product updated successfully.');
        return redirect()->route('product-master');
    } else {
        return redirect()->back()->with('error', 'Product ID is missing.');
    }
}



// Delete a product
public function B2B_delete($id)
{
	DB::table('products')->where('id', $id)->delete();
	Session::flash('message', 'Product deleted successfully.');
	return redirect()->route('product-master');
}


    public function B2C()
    {
       // dd(session('user_id'));
        if(empty(session('user_id'))){ return redirect()->route('login'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '4');
        return view('layout.header').view('admin.B2C').view('layout.footer');
    }
	public function B2C_list(Request $request)
{
    if ($request->ajax()) {
        // Fetch data from the appropriate tables
		$data = DB::table('pincode')
    ->join('services', 'pincode.service_id', '=', 'services.id')  // Join pincode with services
    ->join('products', 'pincode.product_id', '=', 'products.id') // Join products with pincode
    ->select(
        'services.name as service_name',
        'products.product_name',
        'pincode.dest_pincode as pincode', // Use the correct column name
        'pincode.id'
    )
    ->orderBy('pincode.id', 'DESC');  // Order by pincode.id or other column

	
        // Return data as JSON for DataTables
        return Datatables::of($data)
            ->addIndexColumn() // Add index column to DataTable
            ->addColumn('action', function ($row) {
                // Action buttons (Edit, Delete)
                $actionBtn = '
                    <a data-bs-toggle="modal" data-bs-target="#mymodal" 
                       data-id="' . route('view_model', ['page_name' => '6', 'param2' => $row->id]) . '" 
                       id="menu" class="edit btn btn-success btn-sm">Edit</a>
                    <a href="' . route('B2C-delete', $row->id) . '" 
                       onclick="return confirm(`Are you sure? Want to Delete`)" 
                       class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action']) // Allow raw HTML for action buttons
            ->make(true);
    }
}

	
	
	

// 	public function B2C_list(Request $request)
// {
//     if ($request->ajax()) {
//         $data = DB::table('pincode')->orderBy('id', 'DESC'); // No 'service_name' in the order clause
//         return Datatables::of($data)
//             ->addIndexColumn()
//             ->addColumn('action', function ($row) {
//                 $actionBtn = '
//                     <a data-bs-toggle="modal" data-bs-target="#mymodal" 
//                        data-id="'.route('view_model', ['page_name' => '6', 'param2' => $row->id]).'" 
//                        id="menu" class="edit btn btn-success btn-sm">Edit</a>
//                     <a href="'.route('B2C-delete', $row->id).'" 
//                        onclick="return confirm(`Are you sure? Want to Delete`)" 
//                        class="delete btn btn-danger btn-sm">Delete</a>';
//                 return $actionBtn;
//             })
//             ->rawColumns(['action'])
//             ->make(true);
//     }
// }



	
// public function B2C_add(Request $request)
// {
//     // Validate the form data
//     $request->validate([
//         'pincode' => 'required|string|max:6',
//         'service_id' => 'required|integer',
//         'product_id' => 'required|integer',
//     ]);

//     // Get the form data
//     $data = $request->only(['pincode', 'service_id', 'product_id']);

//     // Insert the data into the bb_tat table
//     DB::table('pincode')->insert([
//         'pincode' => $data['pincode'],
//         'service_id' => $data['service_id'],
//         'product_id' => $data['product_id'],
//         // Add any other fields you need to insert
//         'created_at' => now(), // Assuming you want to store the current time as the creation time
//         'updated_at' => now(), // Assuming you want to store the current time for updates as well
//     ]);

//     // Flash a success message
//     Session::flash('message', 'Pincode data added successfully.');

//     // Redirect to the appropriate route (replace 'B2C-master' with the correct route if needed)
//     return redirect('B2C-master');
// }

// public function B2C_add(Request $request)
// {
//     // Validate the form data
//     $request->validate([
//         'service_id' => 'required|integer',
//         'product_id' => 'required|integer',
//         'pincode_file' => 'required|file|mimes:xlsx,xls', // Ensure it's an Excel file
//     ]);

//     // Handle file upload
//     if ($request->hasFile('pincode_file')) {
//         // Get the uploaded file
//         $file = $request->file('pincode_file');
        
//         // Use Laravel Excel to import the file data
//         Excel::import(new PincodeImport($request->service_id, $request->product_id), $file);

//         // Flash a success message
//         Session::flash('message', 'Pincode data added successfully.');
//     }

//     // Redirect to the appropriate route
//     return redirect('B2C-master');
// }

public function B2C_add(Request $request)
{
    // Validate the form data
    $request->validate([
        'service_id' => 'required|integer|exists:services,id',
        'product_id' => 'required|integer|exists:products,id',
        'pincode_file' => 'required|file|mimes:xlsx,xls',
    ]);

// dd($request);

    try {
        // Check if the file is uploaded
        if ($request->hasFile('pincode_file')) {
            // Get the uploaded file
            $file = $request->file('pincode_file');

            // Use Laravel Excel to import the file data
            Excel::import(new PincodeImport($request->service_id, $request->product_id), $file);
			
            // Flash a success message
            Session::flash('message', 'Pincode data added successfully.');
        } else {
            Session::flash('error', 'No file uploaded. Please try again.');
        }
    } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        // Handle validation exceptions from Laravel Excel
        $failures = $e->failures();
        $errorMessage = 'Failed to add pincode data due to validation errors.';

        foreach ($failures as $failure) {
            $errorMessage .= ' Row ' . $failure->row() . ': ' . implode(', ', $failure->errors());
        }

        Session::flash('error', $errorMessage);
    } catch (\Exception $e) {
        // Log error for debugging
        Log::error('Error importing pincode data: ' . $e->getMessage());

        // Flash a general error message
        Session::flash('error', 'An error occurred while adding pincode data. Please try again.');
    }
	// dd($request);
    // Redirect back to the master page
    return redirect()->route('pincode-master');
}





public function B2C_edit(Request $request)
{
    // Validate the form data
    $request->validate([
        'service_id' => 'required|integer|exists:services,id', // Ensure service_id exists in services table
        'product_id' => 'required|integer|exists:products,id', // Ensure product_id exists in products table
        'pincode_file' => 'nullable|file|mimes:xlsx,xls', // File upload is optional, but if provided, it must be an Excel file
    ]);

    try {
        // Check if the file is uploaded
        if ($request->hasFile('pincode_file')) {
            // Get the uploaded file
            $file = $request->file('pincode_file');

            // Use Laravel Excel to import the file data
            Excel::import(new PincodeImport($request->service_id, $request->product_id), $file);
            
            // Flash a success message after successful import
            Session::flash('message', 'Pincode data update successfully.');
        } else {
            // If no file is uploaded, display an error message
            Session::flash('error', 'No file uploaded. Please try again.');
        }
    } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        // Handle validation exceptions from Laravel Excel
        $failures = $e->failures();
        $errorMessage = 'Failed to add pincode data due to validation errors.';

        // Loop through each failure and append the error messages
        foreach ($failures as $failure) {
            $errorMessage .= ' Row ' . $failure->row() . ': ' . implode(', ', $failure->errors());
        }

        // Flash the error message
        Session::flash('error', $errorMessage);
    } catch (\Exception $e) {
        // Log error for debugging
        Log::error('Error importing pincode data: ' . $e->getMessage());

        // Flash a general error message
        Session::flash('error', 'An error occurred while adding pincode data. Please try again.');
    }

    // Redirect to the master page after processing
    return redirect()->route('pincode-master');
}


public function B2C_delete($id)
{
	DB::table('pincode')->where('id', $id)->delete();
	Session::flash('message', 'Pincode deleted successfully.');
	return redirect()->route('pincode-master');
}




    public function LTL()
    {
       // dd(session('user_id'));
        if(empty(session('user_id'))){ return redirect()->route('login'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '5');
        return view('layout.header').view('admin.LTL').view('layout.footer');
    }

    public function LTL_list(Request $request)
    {
        if ($request->ajax())
  		{
  			$data =  DB::table("ltl_tat")->orderBy('id', 'DESC'); 
             return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', function($row)
 				{
                    $page_name = '8';
                    $actionBtn = '
					<a data-bs-toggle="modal" data-bs-target="#mymodal" data-id="'.route('view_model', ['page_name' => $page_name, 'param2' => $row->id]).'" id="menu" class="edit btn btn-success btn-sm">Edit</a>
 					<a href="'.route('LTL-delete', $row->id).'" onclick="return confirm(`Are you sure? Want to Delete`)" class="delete btn btn-danger btn-sm">Delete</a>';
                     return $actionBtn;
                })
                 ->rawColumns(['action'])
                 ->make(true);
          }
    }

    public function LTL_add(Request $request)
    {
	   $data1 = $request->all();

	   $d5 = DB::table("ltl_tat")->insert(
			 [
				"ORIGIN_CITY_CODE"     => $data1['ORIGIN_CITY_CODE'],
				"ORIGIN_CITY_NAME"  => $data1['ORIGIN_CITY_NAME'],
				"DEST_PINCODE"    => $data1['DEST_PINCODE'],
				"DEST_CITY_CODE"     => $data1['DEST_CITY_CODE'],
				"DEST_CITY_NAME"     => $data1['DEST_CITY_NAME'],
				"PRODUCT"        => $data1['PRODUCT'],
				"LINE_HAUL_TATDays"         => $data1['LINE_HAUL_TATDays'],
                "END_MILE_TATDays"        => $data1['END_MILE_TATDays'],
                "TAT_Days"        => $data1['TAT_Days'],
                "CUT_OFF_TIME"        => $data1['CUT_OFF_TIME'],
                "SSL_ODA"        => $data1['SSL_ODA'],
			 ]
		);
		Session::flash('message', 'LTL TAT add successfully.');
		return redirect('LTL-master');
    }

    public function LTL_edit(Request $request)
	{
        $data1 = $request->all();
        $d5 = DB::table("ltl_tat")->where("id",$data1['pincode_id'])->update(
            [
                "ORIGIN_CITY_CODE"     => $data1['ORIGIN_CITY_CODE'],
				"ORIGIN_CITY_NAME"  => $data1['ORIGIN_CITY_NAME'],
				"DEST_PINCODE"    => $data1['DEST_PINCODE'],
				"DEST_CITY_CODE"     => $data1['DEST_CITY_CODE'],
				"DEST_CITY_NAME"     => $data1['DEST_CITY_NAME'],
				"PRODUCT"        => $data1['PRODUCT'],
				"LINE_HAUL_TATDays"         => $data1['LINE_HAUL_TATDays'],
                "END_MILE_TATDays"        => $data1['END_MILE_TATDays'],
                "TAT_Days"        => $data1['TAT_Days'],
                "CUT_OFF_TIME"        => $data1['CUT_OFF_TIME'],
                "SSL_ODA"        => $data1['SSL_ODA'],
            ]
        );
        Session::flash('message', 'LTL TAT update successfully.');
		return redirect('LTL-master');
    }
    

    public function LTL_delete($id)
    {       
         DB::table('bc_tat')->where('id',$id)->delete();
         Session::flash('message', 'LTL TAT delete successfully.');
		return redirect('LTL-master');
    }
    

    public function pickupboy()
    {
       // dd(session('user_id'));
        if(empty(session('user_id'))){ return redirect()->route('login'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '6');
        return view('layout.header').view('admin.pickupboy').view('layout.footer');
    }

    public function pickup_list(Request $request)
    {
        if ($request->ajax())
  		{
  			$data =  DB::table("pickup_boy")->orderBy('id', 'DESC'); 
             return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('status', function($row)
				{
					if($row->is_Active == '0')
					{
						return $status = '<span class="badge bg-success">Active</span>';
					}else
					{
						return $status =  '<span class="badge bg-danger">De-Active</span>';
					}
				})
                 ->addColumn('action', function($row)
 				{
                    $page_name = '10';
                    $actionBtn = '
					<a data-bs-toggle="modal" data-bs-target="#mymodal" data-id="'.route('view_model', ['page_name' => $page_name, 'param2' => $row->id]).'" id="menu" class="edit btn btn-success btn-sm">Edit</a>
 					<a href="'.route('pickup-delete', $row->id).'" onclick="return confirm(`Are you sure? Want to Delete`)" class="delete btn btn-danger btn-sm">Delete</a>';
                     return $actionBtn;
                })
                ->rawColumns(['status','action'])
                 ->make(true);
          }
    }

    public function pickupboy_add(Request $request)
    {
	   $data1 = $request->all();

	   $d5 = DB::table("pickup_boy")->insert(
			 [
				"name"       => $data1['name'],
				"mobile_no"  => $data1['mobile_no'],
				"email_id"   => $data1['email_id'],
				"gender"     => $data1['gender'],
				"dob"        => $data1['dob'],
				"address"    => $data1['address'],
                "is_Active"    => '0',
			 ]
		);
		Session::flash('message', 'Pickup boy add successfully.');
		return redirect('pickupboy-master');
    }

    public function pickupboy_edit(Request $request)
	{
        $data1 = $request->all();
        $d5 = DB::table("pickup_boy")->where("id",$data1['pickupboy_id'])->update(
            [
                "name"       => $data1['name'],
				"mobile_no"  => $data1['mobile_no'],
				"email_id"   => $data1['email_id'],
				"gender"     => $data1['gender'],
				"dob"        => $data1['dob'],
				"address"    => $data1['address'],
            ]
        );
        Session::flash('message', 'Pickupboy update successfully.');
		return redirect('pickupboy-master');
    }

    public function pickup_delete($id)
    {       
        $d5 = DB::table("pickup_boy")->where("id",$id)->update(
            [
                "is_Active"   => '1',
            ]
        );
         Session::flash('message', 'Pickup delete successfully.');
		return redirect('pickupboy-master');
    }


    public function vendor()
    {
       // dd(session('user_id'));
        if(empty(session('user_id'))){ return redirect()->route('login'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '2');
        return view('layout.header').view('admin.vendor').view('layout.footer');
    } 

    public function vendor_add(Request $request)
    {
	   $data1 = $request->all();

	   $d5 = DB::table("vendor")->insert(
			 [
				"vendor_name"     => $data1['vendor_name'],
			 ]
		);
		Session::flash('message', 'Vendor add successfully.');
		return redirect('vendor-master');
    }

    public function vendor_list(Request $request)
    {
        if ($request->ajax())
  		{
  			$data =  DB::table("vendor")->orderBy('vendor_id', 'ASC'); 
             return Datatables::of($data)
                  ->addIndexColumn()
     
                 ->addColumn('action', function($row)
 				{
                    $page_name = '15';
                    $actionBtn = '
					<a data-bs-toggle="modal" data-bs-target="#mymodal" data-id="'.route('view_model', ['page_name' => $page_name, 'param2' => $row->vendor_id]).'" id="menu" class="edit btn btn-success btn-sm">Edit</a>';
                     return $actionBtn;
                })
                 ->rawColumns(['action'])
                 
                 ->make(true);
          }
    

     }

    public function vendor_edit(Request $request)
	{
        $data1 = $request->all();
        $d5 = DB::table("vendor")->where("vendor_id",$data1['vendor_id'])->update(
            [
                "vendor_name"     => $data1['vendor_name'],
            ]
        );
        Session::flash('message', 'Vendor update successfully.');
		return redirect('vendor-master');
   }

    
    public function client_list()
    {
       // dd(session('user_id'));
        if(empty(session('user_id'))){ return redirect()->route('login'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '8');
        return view('layout.header').view('client.client').view('layout.footer');
    }


    public function client_datatable(Request $request)
    {
        if ($request->ajax())
  		{
  			$data =  DB::table("quickway_client")->orderBy('client_id', 'DESC'); 
             return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('status', function($row)
				{
					if($row->is_Active == '0')
					{
						return $status = '<span class="badge bg-success">Active</span>';
					}else
					{
						return $status =  '<span class="badge bg-danger">De-Active</span>';
					}
				})
                 ->addColumn('action', function($row)
 				{
                    $actionBtn = '
					<a href="'.route('client-edit', $row->client_id).'" class="edit btn btn-success btn-sm">Edit</a> 
 					<a  href="'.route('client-delete', $row->client_id).'" onclick="return confirm(`Are you sure? Want to Delete`)" class="delete btn btn-danger btn-sm">Delete</a>';
                     return $actionBtn;
                })
                ->rawColumns(['status','action'])
                 ->make(true);
          }
    }

    public function client_add()
    {
       // dd(session('user_id'));
        if(empty(session('user_id'))){ return redirect()->route('login'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '7');
        return view('layout.header').view('client.addclient').view('layout.footer');
    }



    public function client_postdata(Request $request)
    {
	   $data1 = $request->all();

	   $last_id = DB::table("quickway_client")->insert(
			[
				"username"          => $data1['username'],
				"password"          =>  md5($data1['password']),
				"company_name"      => $data1['company_name'],
				"company_mobile_no" => $data1['company_mobile_no'],
				"company_email"     => $data1['company_email'],
                "company_address"   => $data1['company_address'],
				"company_pincode"   => $data1['company_pincode'],
				"company_pan"       => $data1['company_pan'],
                "company_gst"       => $data1['company_gst'],
                "account_name"      => $data1['account_name'],
                "bank_name"         => $data1['bank_name'],
                "account_no"        => $data1['account_no'],
                "ifsc_code"         => $data1['ifsc_code'],
				"sales_person"      => $data1['sales_person'],
				"sales_person_mobile"   => $data1['sales_person_mobile'],
				"sales_person_email"    => $data1['sales_person_email'],
				"account_person"        => $data1['account_person'],
				"account_person_mobile" => $data1['account_person_mobile'],
                "account_person_email"  => $data1['account_person_email'],
				"logistics_person"      => $data1['logistics_person'],
				"logistics_person_mobile" => $data1['logistics_person_mobile'],
				"logistics_person_email"  => $data1['logistics_person_email'],
                "is_Active"    => '0',
			]
		);

        /************************ DELHIVERY ********************** */

        if(!empty($data1['weight_DELHIVERY_s']))
		{
			$cnt1 = count($data1['weight_DELHIVERY_s']);
			for($i=0; $i<$cnt1; $i++)
			{
				$d5 = DB::table("client_surface_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"    => $_POST['vendor1'][$i],
					"weight"     => $_POST['weight_DELHIVERY_s'][$i] ,
					"city"       => $_POST['city_DELHIVERY_s'][$i],
					"zone"       => $_POST['zone_DELHIVERY_s'][$i],
                    "metro"      => $_POST['metro_DELHIVERY_s'][$i] ,
					"rol_a"      => $_POST['rol_a_DELHIVERY_s'][$i],
					"rol_b"      => $_POST['rol_b_DELHIVERY_s'][$i],
					"spl_des"    => $_POST['spl_des_DELHIVERY_s'][$i],
				]
				);
				
			}
		}

        if(!empty($data1['weight_DELHIVERY_e']))
		{
			$cnt = count($data1['weight_DELHIVERY_e']);
			for($i=0; $i<$cnt; $i++)
			{
				$d5 = DB::table("client_express_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"    => $_POST['vendor2'][$i],
					"weight"     => $_POST['weight_DELHIVERY_e'][$i] ,
					"city"       => $_POST['city_DELHIVERY_e'][$i],
					"zone"       => $_POST['zone_DELHIVERY_e'][$i],
                    "metro"      => $_POST['metro_DELHIVERY_e'][$i] ,
					"rol_a"      => $_POST['rol_a_DELHIVERY_e'][$i],
					"rol_b"      => $_POST['rol_b_DELHIVERY_e'][$i],
					"spl_des"    => $_POST['spl_des_DELHIVERY_e'][$i],
				]
				);
				
			}
		}

        /************************ DTDC HEAVY ********************** */

        if(!empty($data1['weight_DTDC_HEAVY_s']))
		{
			$cnt1 = count($data1['weight_DTDC_HEAVY_s']);
			for($i=0; $i<$cnt1; $i++)
			{
				$d5 = DB::table("client_surface_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"    => $_POST['vendor3'][$i],
					"weight"     => $_POST['weight_DTDC_HEAVY_s'][$i] ,
					"city"       => $_POST['city_DTDC_HEAVY_s'][$i],
					"region"     => $_POST['region_DTDC_HEAVY_s'][$i],
					"zone"       => $_POST['zone_DTDC_HEAVY_s'][$i],
                    "metro"      => $_POST['metro_DTDC_HEAVY_s'][$i] ,
					"rol_a"      => $_POST['rol_a_DTDC_HEAVY_s'][$i],
					"rol_b"      => $_POST['rol_b_DTDC_HEAVY_s'][$i],
					"spl_des"    => $_POST['spl_des_DTDC_HEAVY_s'][$i],
				]
				);
				
			}
		}

        if(!empty($data1['weight_DTDC_HEAVY_e']))
		{
			$cnt = count($data1['weight_DTDC_HEAVY_e']);
			for($i=0; $i<$cnt; $i++)
			{
				$d5 = DB::table("client_express_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"    => $_POST['vendor4'][$i],
					"weight"     => $_POST['weight_DTDC_HEAVY_e'][$i] ,
					"city"       => $_POST['city_DTDC_HEAVY_e'][$i],
					"region"     => $_POST['region_DTDC_HEAVY_e'][$i],
					"zone"       => $_POST['zone_DTDC_HEAVY_e'][$i],
                    "metro"      => $_POST['metro_DTDC_HEAVY_e'][$i] ,
					"rol_a"      => $_POST['rol_a_DTDC_HEAVY_e'][$i],
					"rol_b"      => $_POST['rol_b_DTDC_HEAVY_e'][$i],
					"spl_des"    => $_POST['spl_des_DTDC_HEAVY_e'][$i],
				]
				);
				
			}
		}

        if(!empty($data1['weight_DTDC_HEAVY_d']))
		{
			$cnt2 = count($data1['weight_DTDC_HEAVY_d']);
			for($i=0; $i<$cnt2; $i++)
			{
				$d5 = DB::table("client_cargo_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"     => $_POST['vendor5'][$i] ,
					"weight"     => $_POST['weight_DTDC_HEAVY_d'][$i] ,
					"city"       => $_POST['city_DTDC_HEAVY_d'][$i],
					"region"     => $_POST['region_DTDC_HEAVY_d'][$i],
					"zone"       => $_POST['zone_DTDC_HEAVY_d'][$i],
                    "metro"      => $_POST['metro_DTDC_HEAVY_d'][$i] ,
					"rol_a"      => $_POST['rol_a_DTDC_HEAVY_d'][$i],
					"rol_b"      => $_POST['rol_b_DTDC_HEAVY_d'][$i],
					"spl_des"    => $_POST['spl_des_DTDC_HEAVY_d'][$i],
				]
				);
				
			}
		}

        /************************ DTDC E-COM ********************** */

        if(!empty($data1['weight_p']))
		{
			$cnt = count($data1['weight_p']);
			for($i=0; $i<$cnt; $i++)
			{
				$d5 = DB::table("client_express_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"     => $_POST['vendor6'][$i],
					"weight"     => $_POST['weight_p'][$i],
					"city"       => $_POST['city_p'][$i],
					"region"     => $_POST['region_p'][$i],
					"zone"       => $_POST['zone_p'][$i],
                    "metro"      => $_POST['metro_p'][$i] ,
					"rol_a"      => $_POST['rol_a_p'][$i],
					"rol_b"      => $_POST['rol_b_p'][$i],
					"spl_des"    => $_POST['spl_des_p'][$i],
				]
				);
				
			}
		}

        if(!empty($data1['weight_s']))
		{
			$cnt1 = count($data1['weight_s']);
			for($i=0; $i<$cnt1; $i++)
			{
				$d5 = DB::table("client_surface_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"     => $_POST['vendor7'][$i],
					"weight"     => $_POST['weight_s'][$i] ,
					"city"       => $_POST['city_s'][$i],
					"region"     => $_POST['region_s'][$i],
					"zone"       => $_POST['zone_s'][$i],
                    "metro"      => $_POST['metro_s'][$i] ,
					"rol_a"      => $_POST['rol_a_s'][$i],
					"rol_b"      => $_POST['rol_b_s'][$i],
					"spl_des"    => $_POST['spl_des_s'][$i],
				]
				);
				
			}
		}

        if(!empty($data1['weight_c']))
		{
			$cnt2 = count($data1['weight_c']);
			for($i=0; $i<$cnt2; $i++)
			{
				$d5 = DB::table("client_cargo_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"     => $_POST['vendor8'][$i],
					"weight"     => $_POST['weight_c'][$i] ,
					"city"       => $_POST['city_c'][$i],
					"region"     => $_POST['region_c'][$i],
					"zone"       => $_POST['zone_c'][$i],
                    "metro"      => $_POST['metro_c'][$i] ,
					"rol_a"      => $_POST['rol_a_c'][$i],
					"rol_b"      => $_POST['rol_b_c'][$i],
					"spl_des"    => $_POST['spl_des_c'][$i],
				]
				);
				
			}
		}

        /************************ TRACKON ********************** */

        if(!empty($data1['weight_TRACKON_s']))
		{
			$cnt1 = count($data1['weight_TRACKON_s']);
			for($i=0; $i<$cnt1; $i++)
			{
				$d5 = DB::table("client_surface_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"    => $_POST['vendor9'][$i],
					"weight"     => $_POST['weight_TRACKON_s'][$i] ,
					"city"       => $_POST['city_TRACKON_s'][$i],
					"region"     => $_POST['region_TRACKON_s'][$i],
					"zone"       => $_POST['zone_TRACKON_s'][$i],
                    "metro"      => $_POST['metro_TRACKON_s'][$i] ,
					"rol_a"      => $_POST['rol_a_TRACKON_s'][$i],
					"rol_b"      => $_POST['rol_b_TRACKON_s'][$i],
					"spl_des"    => $_POST['spl_des_TRACKON_s'][$i],
				]
				);
				
			}
		}

        if(!empty($data1['weight_TRACKON_e']))
		{
			$cnt = count($data1['weight_TRACKON_e']);
			for($i=0; $i<$cnt; $i++)
			{
				$d5 = DB::table("client_express_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"    => $_POST['vendor10'][$i],
					"weight"     => $_POST['weight_TRACKON_e'][$i] ,
					"city"       => $_POST['city_TRACKON_e'][$i],
					"region"     => $_POST['region_TRACKON_e'][$i],
					"zone"       => $_POST['zone_TRACKON_e'][$i],
                    "metro"      => $_POST['metro_TRACKON_e'][$i] ,
					"rol_a"      => $_POST['rol_a_TRACKON_e'][$i],
					"rol_b"      => $_POST['rol_b_TRACKON_e'][$i],
					"spl_des"    => $_POST['spl_des_TRACKON_e'][$i],
				]
				);
				
			}
		}


        /************************ BEES ********************** */

        
        if(!empty($data1['weight_BEES_s']))
		{
			$cnt1 = count($data1['weight_BEES_s']);
			for($i=0; $i<$cnt1; $i++)
			{
				$d5 = DB::table("client_surface_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"    => $_POST['vendor11'][$i],
					"weight"     => $_POST['weight_BEES_s'][$i] ,
					"city"       => $_POST['city_BEES_s'][$i],
					"region"     => $_POST['region_BEES_s'][$i],
					"zone"       => $_POST['zone_BEES_s'][$i],
                    "metro"      => $_POST['metro_BEES_s'][$i] ,
					"rol_a"      => $_POST['rol_a_BEES_s'][$i],
					"rol_b"      => $_POST['rol_b_BEES_s'][$i],
					"spl_des"    => $_POST['spl_des_BEES_s'][$i],
				]
				);
				
			}
		}

        if(!empty($data1['weight_BEES_e']))
		{
			$cnt = count($data1['weight_BEES_e']);
			for($i=0; $i<$cnt; $i++)
			{
				$d5 = DB::table("client_express_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"    => $_POST['vendor12'][$i],
					"weight"     => $_POST['weight_BEES_e'][$i] ,
					"city"       => $_POST['city_BEES_e'][$i],
					"region"     => $_POST['region_BEES_e'][$i],
					"zone"       => $_POST['zone_BEES_e'][$i],
                    "metro"      => $_POST['metro_BEES_e'][$i] ,
					"rol_a"      => $_POST['rol_a_BEES_e'][$i],
					"rol_b"      => $_POST['rol_b_BEES_e'][$i],
					"spl_des"    => $_POST['spl_des_BEES_e'][$i],
				]
				);
				
			}
		}

		/************************ BLUDART ********************** */

        if(!empty($data1['weight_BLUDART_s']))
		{
			$cnt1 = count($data1['weight_BLUDART_s']);
			for($i=0; $i<$cnt1; $i++)
			{
				$d5 = DB::table("client_surface_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"    => $_POST['vendor13'][$i],
					"weight"    => $_POST['weight_BLUDART_s'][$i],
					"west_central"     => $_POST['west_central_s'][$i] ,
					"south"       => $_POST['south_s'][$i],
					"east"     => $_POST['east_s'][$i],
					"kerela"       => $_POST['kerela_s'][$i],
                    "jk_ne"      => $_POST['jk_ne_s'][$i] ,
					"north"      => $_POST['north_s'][$i],
					"bihar_jhar"      => $_POST['bihar_jhar_s'][$i],
					"delhi_noida"    => $_POST['delhi_noida_s'][$i],
				
				]
				);
				
			}
		}

        if(!empty($data1['weight_BLUDART_e']))
		{
			$cnt = count($data1['weight_BLUDART_e']);
			for($i=0; $i<$cnt; $i++)
			{
				$d5 = DB::table("client_express_charges")->insert(
				[
					"client_id"  => $last_id,
                    "vendor"    => $_POST['vendor14'][$i],
					"weight"    => $_POST['weight_BLUDART_e'][$i],
					"west_central"     => $_POST['west_central_e'][$i] ,
					"south"       => $_POST['south_e'][$i],
					"east"     => $_POST['east_e'][$i],
					"kerela"       => $_POST['kerela_e'][$i],
                    "jk_ne"      => $_POST['jk_ne_e'][$i] ,
					"north"      => $_POST['north_e'][$i],
					"bihar_jhar"      => $_POST['bihar_jhar_e'][$i],
					"delhi_noida"    => $_POST['delhi_noida_e'][$i],
				]
				);
				
			}
		}

        
		Session::flash('message', 'Client add successfully.');
		return redirect('client-list');
    }

    public function client_edit($id)
    {
		
        if(empty(session('user_id'))){ return redirect()->route('login'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '9');

        $a1 =  DB::table("quickway_client")->where('client_id',$id)->first();
        return view('layout.header').view('client.clientedit',compact('a1')).view('layout.footer');
    }


    public function client_postdata_update(Request $request)
	{
        $data1 = $request->all();
        $d5 = DB::table("quickway_client")->where("client_id",$data1['client_id'])->update(
            [
                "company_name"      => $data1['company_name'],
				"company_mobile_no" => $data1['company_mobile_no'],
				"company_email"     => $data1['company_email'],
                "company_address"     => $data1['company_address'],
				"company_pincode"     => $data1['company_pincode'],
				"company_pan"       => $data1['company_pan'],
                "company_gst"       => $data1['company_gst'],
                "account_name"       => $data1['account_name'],
                "bank_name"       => $data1['bank_name'],
                "account_no"       => $data1['account_no'],
                "ifsc_code"       => $data1['ifsc_code'],
				"sales_person"      => $data1['sales_person'],
				"sales_person_mobile"   => $data1['sales_person_mobile'],
				"sales_person_email"    => $data1['sales_person_email'],
				"account_person"        => $data1['account_person'],
				"account_person_mobile" => $data1['account_person_mobile'],
                "account_person_email"  => $data1['account_person_email'],
				"logistics_person"      => $data1['logistics_person'],
				"logistics_person_mobile" => $data1['logistics_person_mobile'],
				"logistics_person_email"  => $data1['logistics_person_email'],
            ]
        );

        /********************DELHIVERY***************/

		if(!empty($data1['weight_DELHIVERY_s']))
		{
			$cnt = count($data1['weight_DELHIVERY_s']);
			for($i=0; $i<$cnt; $i++)
			{
				
                $d5 = DB::table("client_surface_charges")->where("id",$_POST['client_surface_charges_id1'][$i])->update(
                [
                    "weight"     => $_POST['weight_DELHIVERY_s'][$i] ,
					"city"       => $_POST['city_DELHIVERY_s'][$i],
					"zone"       => $_POST['zone_DELHIVERY_s'][$i],
                    "metro"      => $_POST['metro_DELHIVERY_s'][$i] ,
					"rol_a"      => $_POST['rol_a_DELHIVERY_s'][$i],
					"rol_b"      => $_POST['rol_b_DELHIVERY_s'][$i],
					"spl_des"    => $_POST['spl_des_DELHIVERY_s'][$i],
                ]
                );
			
			}
		}

		if(!empty($data1['weight_DELHIVERY_e']))
		{
			$cnt = count($data1['weight_DELHIVERY_e']);
			for($i=0; $i<$cnt; $i++)
			{
				
                $d5 = DB::table("client_express_charges")->where("id",$_POST['client_express_charges_id1'][$i])->update(
                [
                    "weight"     => $_POST['weight_DELHIVERY_e'][$i] ,
					"city"       => $_POST['city_DELHIVERY_e'][$i],
					"zone"       => $_POST['zone_DELHIVERY_e'][$i],
                    "metro"      => $_POST['metro_DELHIVERY_e'][$i] ,
					"rol_a"      => $_POST['rol_a_DELHIVERY_e'][$i],
					"rol_b"      => $_POST['rol_b_DELHIVERY_e'][$i],
					"spl_des"    => $_POST['spl_des_DELHIVERY_e'][$i],
                ]
                );
			
			}
		}


		/********************DTDC HEAVY***************/
        if(!empty($data1['weight_DTDC_HEAVY_s']))
		{
			$cnt = count($data1['weight_DTDC_HEAVY_s']);
			for($i=0; $i<$cnt; $i++)
			{
				
                $d5 = DB::table("client_surface_charges")->where("id",$_POST['client_surface_charges_id2'][$i])->update(
                [
                    "weight"     => $_POST['weight_DTDC_HEAVY_s'][$i] ,
					"city"       => $_POST['city_DTDC_HEAVY_s'][$i],
					"region"       => $_POST['region_DTDC_HEAVY_s'][$i],
					"zone"       => $_POST['zone_DTDC_HEAVY_s'][$i],
                    "metro"      => $_POST['metro_DTDC_HEAVY_s'][$i] ,
					"rol_a"      => $_POST['rol_a_DTDC_HEAVY_s'][$i],
					"rol_b"      => $_POST['rol_b_DTDC_HEAVY_s'][$i],
					"spl_des"    => $_POST['spl_des_DTDC_HEAVY_s'][$i],
                ]
                );
			
			}
		}

		if(!empty($data1['weight_DTDC_HEAVY_e']))
		{
			$cnt = count($data1['weight_DTDC_HEAVY_e']);
			for($i=0; $i<$cnt; $i++)
			{
				
                $d5 = DB::table("client_express_charges")->where("id",$_POST['client_express_charges_id2'][$i])->update(
                [
                    "weight"     => $_POST['weight_DTDC_HEAVY_e'][$i] ,
					"city"       => $_POST['city_DTDC_HEAVY_e'][$i],
					"region"       => $_POST['region_DTDC_HEAVY_e'][$i],
					"zone"       => $_POST['zone_DTDC_HEAVY_e'][$i],
                    "metro"      => $_POST['metro_DTDC_HEAVY_e'][$i] ,
					"rol_a"      => $_POST['rol_a_DTDC_HEAVY_e'][$i],
					"rol_b"      => $_POST['rol_b_DTDC_HEAVY_e'][$i],
					"spl_des"    => $_POST['spl_des_DTDC_HEAVY_e'][$i],
                ]
                );
			
			}
		}

		if(!empty($data1['weight_DTDC_HEAVY_d']))
		{
			$cnt2 = count($data1['weight_DTDC_HEAVY_d']);
			for($i=0; $i<$cnt2; $i++)
			{
				
                $d5 = DB::table("client_cargo_charges")->where("id",$_POST['client_cargo_charges_id1'][$i])->update(
                [
                    "weight"     => $_POST['weight_DTDC_HEAVY_d'][$i] ,
					"city"       => $_POST['city_DTDC_HEAVY_d'][$i],
					"region"     => $_POST['region_DTDC_HEAVY_d'][$i],
					"zone"       => $_POST['zone_DTDC_HEAVY_d'][$i],
                    "metro"      => $_POST['metro_DTDC_HEAVY_d'][$i] ,
					"rol_a"      => $_POST['rol_a_DTDC_HEAVY_d'][$i],
					"rol_b"      => $_POST['rol_b_DTDC_HEAVY_d'][$i],
					"spl_des"    => $_POST['spl_des_DTDC_HEAVY_d'][$i],
                ]
                );
			
			}
		}


		/********************DTDC E-COM***************/

		if(!empty($data1['weight_p']))
		{
			$cnt = count($data1['weight_p']);
			for($i=0; $i<$cnt; $i++)
			{
				
                $d5 = DB::table("client_express_charges")->where("id",$_POST['client_express_charges_id'][$i])->update(
                [
                    "weight"     => $_POST['weight_p'][$i] ,
					"city"       => $_POST['city_p'][$i],
					"region"     => $_POST['region_p'][$i],
					"zone"       => $_POST['zone_p'][$i],
                    "metro"      => $_POST['metro_p'][$i] ,
					"rol_a"      => $_POST['rol_a_p'][$i],
					"rol_b"      => $_POST['rol_b_p'][$i],
					"spl_des"    => $_POST['spl_des_p'][$i],
                ]
                );
			
			}
		}


        if(!empty($data1['weight_s']))
		{
			$cnt1 = count($data1['weight_s']);
			for($i=0; $i<$cnt1; $i++)
			{
				
                $d5 = DB::table("client_surface_charges")->where("id",$_POST['client_surface_charges_id'][$i])->update(
                [
                    "weight"     => $_POST['weight_s'][$i] ,
					"city"       => $_POST['city_s'][$i],
					"region"     => $_POST['region_s'][$i],
					"zone"       => $_POST['zone_s'][$i],
                    "metro"      => $_POST['metro_s'][$i] ,
					"rol_a"      => $_POST['rol_a_s'][$i],
					"rol_b"      => $_POST['rol_b_s'][$i],
					"spl_des"    => $_POST['spl_des_s'][$i],
                ]
                );
			
			}
		}


        if(!empty($data1['weight_c']))
		{
			$cnt2 = count($data1['weight_c']);
			for($i=0; $i<$cnt2; $i++)
			{
				
                $d5 = DB::table("client_cargo_charges")->where("id",$_POST['client_cargo_charges_id'][$i])->update(
                [
                    "weight"     => $_POST['weight_c'][$i] ,
					"city"       => $_POST['city_c'][$i],
					"region"     => $_POST['region_c'][$i],
					"zone"       => $_POST['zone_c'][$i],
                    "metro"      => $_POST['metro_c'][$i] ,
					"rol_a"      => $_POST['rol_a_c'][$i],
					"rol_b"      => $_POST['rol_b_c'][$i],
					"spl_des"    => $_POST['spl_des_c'][$i],
                ]
                );
			
			}
		}


		/********************TRACKON***************/
		if(!empty($data1['weight_TRACKON_s']))
		{
			$cnt = count($data1['weight_TRACKON_s']);
			for($i=0; $i<$cnt; $i++)
			{
				
                $d5 = DB::table("client_surface_charges")->where("id",$_POST['client_surface_charges_id3'][$i])->update(
                [
                    "weight"     => $_POST['weight_TRACKON_s'][$i] ,
					"city"       => $_POST['city_TRACKON_s'][$i],
					"region"       => $_POST['region_TRACKON_s'][$i],
					"zone"       => $_POST['zone_TRACKON_s'][$i],
                    "metro"      => $_POST['metro_TRACKON_s'][$i] ,
					"rol_a"      => $_POST['rol_a_TRACKON_s'][$i],
					"rol_b"      => $_POST['rol_b_TRACKON_s'][$i],
					"spl_des"    => $_POST['spl_des_TRACKON_s'][$i],
                ]
                );
			
			}
		}


		if(!empty($data1['weight_TRACKON_e']))
		{
			$cnt = count($data1['weight_TRACKON_e']);
			for($i=0; $i<$cnt; $i++)
			{
				
                $d5 = DB::table("client_express_charges")->where("id",$_POST['client_express_charges_id3'][$i])->update(
                [
                    "weight"     => $_POST['weight_TRACKON_e'][$i] ,
					"city"       => $_POST['city_TRACKON_e'][$i],
					"region"       => $_POST['region_TRACKON_e'][$i],
					"zone"       => $_POST['zone_TRACKON_e'][$i],
                    "metro"      => $_POST['metro_TRACKON_e'][$i] ,
					"rol_a"      => $_POST['rol_a_TRACKON_e'][$i],
					"rol_b"      => $_POST['rol_b_TRACKON_e'][$i],
					"spl_des"    => $_POST['spl_des_TRACKON_e'][$i],
                ]
                );
			
			}
		}

		/********************BEES***************/
        
		if(!empty($data1['weight_BEES_s']))
		{
			$cnt = count($data1['weight_BEES_s']);
			for($i=0; $i<$cnt; $i++)
			{
				
                $d5 = DB::table("client_surface_charges")->where("id",$_POST['client_surface_charges_id4'][$i])->update(
                [
                    "weight"     => $_POST['weight_BEES_s'][$i] ,
					"city"       => $_POST['city_BEES_s'][$i],
					"region"       => $_POST['region_BEES_s'][$i],
					"zone"       => $_POST['zone_BEES_s'][$i],
                    "metro"      => $_POST['metro_BEES_s'][$i] ,
					"rol_a"      => $_POST['rol_a_BEES_s'][$i],
					"rol_b"      => $_POST['rol_b_BEES_s'][$i],
					"spl_des"    => $_POST['spl_des_BEES_s'][$i],
                ]
                );
			
			}
		}


		if(!empty($data1['weight_BEES_e']))
		{
			$cnt = count($data1['weight_BEES_e']);
			for($i=0; $i<$cnt; $i++)
			{
				
                $d5 = DB::table("client_express_charges")->where("id",$_POST['client_express_charges_id4'][$i])->update(
                [
                    "weight"     => $_POST['weight_BEES_e'][$i] ,
					"city"       => $_POST['city_BEES_e'][$i],
					"region"       => $_POST['region_BEES_e'][$i],
					"zone"       => $_POST['zone_BEES_e'][$i],
                    "metro"      => $_POST['metro_BEES_e'][$i] ,
					"rol_a"      => $_POST['rol_a_BEES_e'][$i],
					"rol_b"      => $_POST['rol_b_BEES_e'][$i],
					"spl_des"    => $_POST['spl_des_BEES_e'][$i],
                ]
                );
			
			}
		}


		/********************BLUDART***************/
        
		if(!empty($data1['weight_BLUDART_s']))
		{
			$cnt = count($data1['weight_BLUDART_s']);
			for($i=0; $i<$cnt; $i++)
			{
				
                $d5 = DB::table("client_surface_charges")->where("id",$_POST['client_surface_charges_id5'][$i])->update(
                [
                    "weight"     => $_POST['weight_BLUDART_s'][$i] ,
					"west_central"       => $_POST['west_central_s'][$i],
					"south"       => $_POST['south_s'][$i],
					"east"       => $_POST['east_s'][$i],
                    "kerela"      => $_POST['kerela_s'][$i] ,
					"jk_ne"      => $_POST['jk_ne_s'][$i],
					"north"      => $_POST['north_s'][$i],
					"bihar_jhar"    => $_POST['bihar_jhar_s'][$i],
					"delhi_noida"    => $_POST['delhi_noida_s'][$i],
                ]
                );
			
			}
		}

		if(!empty($data1['weight_BLUDART_e']))
		{
			$cnt = count($data1['weight_BLUDART_e']);
			for($i=0; $i<$cnt; $i++)
			{
				
                $d5 = DB::table("client_express_charges")->where("id",$_POST['client_express_charges_id5'][$i])->update(
                [
                    "weight"     => $_POST['weight_BLUDART_e'][$i] ,
					"west_central"       => $_POST['west_central_e'][$i],
					"south"       => $_POST['south_e'][$i],
					"east"       => $_POST['east_e'][$i],
                    "kerela"      => $_POST['kerela_e'][$i] ,
					"jk_ne"      => $_POST['jk_ne_e'][$i],
					"north"      => $_POST['north_e'][$i],
					"bihar_jhar"    => $_POST['bihar_jhar_e'][$i],
					"delhi_noida"    => $_POST['delhi_noida_e'][$i],
                ]
                );
			
			}
		}
		  
        Session::flash('message', 'Client update successfully.');
		return redirect('client-list');
    }

    public function client_delete($id)
    {       
        $d5 = DB::table("quickway_client")->where("client_id",$id)->update(
            [
                "is_Active"   => '1',
            ]
        );
        Session::flash('message', 'Client delete successfully.');
		return redirect('client-list');
    }


	public function all_pending_order()
    {
        if(empty(session('user_id'))){ return redirect()->route('login'); } 
        session()->forget('active_menu');
        Session::put('active_menu', '9');
        return view('layout.header').view('admin.all_pending_order').view('layout.footer');
    }




   public function all_pending_order_list(Request $request)
   {
       if ($request->ajax())
       {
        $data =  DB::table("client_order")->where('status', '0')->orderBy('id', 'DESC'); 
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('order_id', function($row)
                {
                   return $order_id = '<a href="'.route('order-deatils', $row->order_id).'">'.$row->order_id.'</a><BR>'.date("d-m-Y H:i:A",strtotime($row->create_datetime));
                })

				->addColumn('client_name', function($row)
                {
					$quickway_client =  DB::table("quickway_client")->where('client_id',$row->client_id)->first();
                   return $client_name = $quickway_client->company_name;
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
            ->rawColumns(['order_id','client_name','address','package','payment','delivery','vendor_type'])
            ->make(true);
        }
    }

	public function orderdeatils($id)
    {
        $client_order =  DB::table("client_order")->where('order_id',$id)->first();
		if(!empty($client_order))
		{
			return view('layout.header').view('admin.orderdeatils',compact('client_order')).view('layout.footer');
		}
		else
		{
			return redirect()->route('login'); 
		}	
    }



} 