<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\UserPackage;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Perform the search using Scout for both models
        $packageResults = Package::search($query)->get()->map(function ($package) {
            $package->source = 'Package'; // Add source field
            return $package;
        });

        $userPackageResults = UserPackage::search($query)->get()->map(function ($userPackage) {
            $userPackage->source = 'UserPackage'; // Add source field
            return $userPackage;
        });

        $userResults = User::search($query)->get()->map(function ($user) {  // Fix variable name
            $user->source = 'User'; // Add source field
            return $user;
        });

        // Combine all results into one array
        $results = $packageResults->merge($userPackageResults)->merge($userResults);  // Merge the collections correctly

        // Log the results for debugging (optional)
        Log::info('Search Results:', $results->toArray());

        // Return the combined results as JSON
        return response()->json($results);
    }
}
