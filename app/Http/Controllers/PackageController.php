<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function insert()
    {
        return view('Admin.packageinsert'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'packagename' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'days' => 'required|integer|min:1',
            'description' => 'nullable|string|max:500',
        ]);

        Package::create([
            'packagename' => $request->packagename,
            'amount' => $request->amount,
            'days' => $request->days,
            'description' => $request->description,
        ]);

        return redirect()->route('packages.insert')->with('success', 'Package inserted successfully!');
    }

    public function index()
    {
        $packages = Package::all();
        return view('Admin.packageview', compact('packages')); 
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('Admin.packageedit', compact('package'));
    }

    public function delete_package($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('packages.index')->with('success', 'Package deleted successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'packagename' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'days' => 'required|integer|min:1',
            'description' => 'nullable|string|max:500',
        ]);

        $package = Package::findOrFail($id);
        $package->update([
            'packagename' => $request->packagename,
            'amount' => $request->amount,
            'days' => $request->days,
            'description' => $request->description,
        ]);

        return redirect()->route('packages.index')->with('success', 'Package updated successfully');
    }
}

