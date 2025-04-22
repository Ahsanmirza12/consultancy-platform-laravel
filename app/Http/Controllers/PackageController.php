<?php

namespace App\Http\Controllers;
use App\Models\Package;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PackageController extends Controller
{
     // Add this at the top

     public function index()
     {
         $package = Package::latest()->paginate(10); // ✅ no need for with('package')
         return view('packages.index', compact('package'));
     }
     public function index1()
     {
         $package = Package::latest()->paginate(10); // ✅ no need for with('package')
         return view('admin.packages.index', compact('package'));
     }
    
    //use App\Models\UserPackage;
    public function create()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }
    public function earningsSummary()
{
    $earnings = DB::table('subscriptions')
        ->join('packages', 'subscriptions.package_id', '=', 'packages.id')
        ->select(
            'packages.duration_days',
            DB::raw('SUM(packages.price) AS total_earnings'),
            DB::raw("CASE 
                        WHEN packages.duration_days = 30 THEN 'Monthly'
                        WHEN packages.duration_days = 180 THEN 'Six Months'
                        WHEN packages.duration_days = 365 THEN 'Yearly'
                        ELSE 'Other'
                     END AS duration_type")
        )
        ->where('subscriptions.payment_status', 'approved')
        ->groupBy('packages.duration_days')
        ->get();

    $total = $earnings->sum('total_earnings'); // calculate total of all earnings
print_r($earnings); exit;
    return view('index', compact('earnings', 'total'));

}
    public function createAdminPackage()
{
    return view('admin.packages.create'); // view to create a new package
}
public function storeAdminPackage(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'duration_days' => 'required|integer|min:1',
    ]);

    Package::create($validated);

    return redirect()->route('admin.packages.index')->with('success', 'Package purchased successfully!');
}

public function store(Request $request)
{
    // Get the currently authenticated user (if using authentication)
    $user = Auth::user();

    // Validate the incoming request
    $validated = $request->validate([
        'package_id' => 'required|exists:packages,id',
        'payment_screenshot' => 'required|image', // Assuming payment screenshot is an image file
    ]);

    // Store the payment screenshot if necessary
    $paymentScreenshotPath = $request->file('payment_screenshot')->store('payment_screenshots', 'public');

    // Create the user_package entry
    UserPackage::create([
        'user_id' => $user->id, // Get the user ID
        'package_id' => $validated['package_id'],
        'payment_screenshot' => $paymentScreenshotPath,
        'payment_status' => 'pending', // Or another default status
    ]);

    // Redirect or return a response
    return redirect()->route('some.route.name')->with('success', 'Package purchased successfully!');
}
public function editPackage($id)
{
    $package = Package::findOrFail($id);
    return view('admin.packages.edit', compact('package'));
}
public function updatePackage(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'duration_days' => 'required|integer',
    ]);

    $package = Package::findOrFail($id);
    $package->update([
        'name' => $request->name,
        'price' => $request->price,
        'duration_days' => $request->duration_days,
    ]);

    return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully!');


}





public function update(Request $request, $id)
{
    // Validate inputs
    $request->validate([
        'package_id' => 'required|exists:packages,id',
        'payment_method' => 'required',
        'payment_screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'start_date' => 'required|date',  // Ensure start_date is a valid date
        'end_date' => 'required|date',    // Ensure end_date is a valid date
    ]);

    // Debugging: Check the received data
    dd($request->all('$startDate'));

    // Get current user package
    $userPackage = UserPackage::findOrFail($id);

    // Get selected package details
    $package = Package::findOrFail($request->package_id);

    // Ensure start_date and end_date are coming in correct format
    $startDate = Carbon::parse($request->start_date);  // Parse the date to Carbon
    $endDate = Carbon::parse($request->end_date);      // Parse the date to Carbon

    // Calculate end date based on duration
    if ($package->duration_type === 'month') {
        $endDate = $startDate->copy()->addMonths($package->duration_value);
    } elseif ($package->duration_type === '6 month') {
        $endDate = $startDate->copy()->addMonths(6); // Assuming you want to add 6 months
    } elseif ($package->duration_type === 'year') {
        $endDate = $startDate->copy()->addYears($package->duration_value);
    } else {
        $endDate = $startDate; // fallback in case duration_type is invalid
    }

    // Update user package
    $userPackage->package_id = $package->id;
    $userPackage->start_date = $startDate;
    $userPackage->end_date = $endDate;
    $userPackage->payment_method = $request->payment_method;

    // Check if payment screenshot is uploaded
    if ($request->hasFile('payment_screenshot')) {
        $file = $request->file('payment_screenshot');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/payments'), $filename);

        $userPackage->payment_screenshot = 'uploads/payments/' . $filename;
    }

    $userPackage->save();

    return redirect()->back()->with('success', 'Package updated successfully!');
}
public function destroy($id)
{
    $Package = Package::findOrFail($id);
    $Package->delete();

    return back()->with('success', 'Package deleted successfully.');
}

}
