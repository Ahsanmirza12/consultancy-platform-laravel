<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\UserPackage;
use App\Notifications\PackagePurchased;
use App\Notifications\PackageSubscribed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPackageController extends Controller
{
    /**
     * Show the currently active package for the logged-in user.
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $activePackage = UserPackage::where('user_id', $user->id)
            ->where('payment_status', 'approved')
            ->where('end_date', '>=', now())
            ->latest()
            ->first();

        return view('packages.index', compact('activePackage'));
    }
    public function subscriptions()
    {
        // Paginate with 5 items per page (you can change the number)
        $activepackages = UserPackage::with(['user', 'package'])
            ->latest()
            ->paginate(5); // Adjust the number as per your needs
    
        return view('subscriptions.index', compact('activepackages'));
    }
    

    /**
     * Show the form to purchase a new package.
     */
    public function create()
    {
        $packages = Package::all();
        return view('packages.buy-package', compact('packages'));
    }
    


    
    
    /**
     * Store the new user package and send notification.
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'payment_screenshot' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'payment_method' => 'required|in:jazz_cash,easy_paisa,hbl_mobile',
        ]);

        /** @var \App\Models\Package|null $package */
        $package = Package::find($request->package_id);

        if (!$package) {
            return back()->with('error', 'Selected package not found.');
        }

        if ($request->hasFile('payment_screenshot')) {
            $image = $request->file('payment_screenshot');
        
            // Unique filename
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        
            // Move to screenshots folder inside public
            $image->move(public_path('storage/screenshots'), $imageName);
        
            // Set path to store in DB
            $screenshotPath = 'screenshots/' . $imageName;
        }
        

        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $userPackage = UserPackage::create([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'payment_screenshot' => $screenshotPath,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending'
            
        ]);

        // Send notification to user
        $user->notify(new PackageSubscribed($package->name, $userPackage->end_date));

        return back()->with('success', 'Package submitted. Please wait for admin approval.');
    }
    /**
 * Show form to edit a user package.
 */
public function edit($id)
{
    $userPackage = UserPackage::findOrFail($id);
    $packages = Package::all();

    return view('packages.edit-package', compact('userPackage', 'packages'));
}

/**
 * Update the selected user package.
 */
public function update(Request $request, $id)
{
    // Validate incoming request
    $request->validate([
        'package_id' => 'required|exists:packages,id',
        'payment_method' => 'required|string',
        'payment_screenshot' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Get the user package record
    $userPackage = UserPackage::findOrFail($id);

    // Get the package details
    $package = Package::find($request->package_id);
    if (!$package) {
        return back()->with('error', 'Selected package not found.');
    }

    // Set screenshot path to existing value by default
    $screenshotPath = $userPackage->payment_screenshot;

    // Check if new screenshot uploaded
    if ($request->hasFile('payment_screenshot')) {
        $image = $request->file('payment_screenshot');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/screenshots'), $imageName);
        $screenshotPath = 'screenshots/' . $imageName;
    }

    // Update the package details including new start and end date
    $userPackage->update([
        'package_id' => $request->package_id,
        'payment_method' => $request->payment_method,
        'payment_screenshot' => $screenshotPath,
        'start_date' => now(),
        'end_date' => now()->addDays($package->duration_days),
    ]);

    return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
}

public function updateStatus(Request $request, $id)
{
    $request->validate([
        'payment_status' => 'required|in:pending,approved,rejected'
    ]);

    $userPackage = UserPackage::findOrFail($id);
    $userPackage->payment_status = $request->payment_status;
    $userPackage->save();

    if ($request->payment_status === 'approved') {
        $user = $userPackage->user;
        $package = $userPackage->package;

        // Notify the user
        $user->notify(new PackageSubscribed($package->name, $userPackage->end_date));
    }

    return back()->with('success', 'Package status updated successfully.');
}

/**
 * Delete the selected user package.
 */
public function destroy($id)
{
    $userPackage = UserPackage::findOrFail($id);
    $userPackage->delete();

    return back()->with('success', 'Package deleted successfully.');
}

}
