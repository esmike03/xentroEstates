<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubQuery;
use App\Models\Subdivision;
use Illuminate\Database\QueryException;

class SubQueryController extends Controller
{
    // Show the sub query form
    public function create($subdivision_id, Request $request)
    {
        // Fetch the subdivision, or return a 404 error if not found
        $subdivision = Subdivision::findOrFail($subdivision_id);
        $lotNo = $request->input('lot_no');
        $area = $request->input('area');
        $block = $request->input('block_number');
        $cat = $request->input('cat');
        $status = $request->input('status');
        return view('sub_query', compact('subdivision', 'lotNo', 'area', 'cat', 'status', 'block'));
    }

    public function store_cat(Request $request)
    {

        $request->validate([
            'cat_name' => 'required|string|max:255',
            'cat_price' => 'required|integer|min:0',
        ]);

        Category::create([
            'cat_name' => $request->cat_name,
            'cat_price' => $request->cat_price,
        ]);

        return redirect()->back()->with('success', 'Category added successfully.');
    }

    public function cat_destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    public function category_update(Request $request, $id)
    {
        $request->validate([
            'cat_name' => 'required|string|max:255',
            'cat_price' => 'required|numeric|min:0',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'cat_name' => $request->cat_name,
            'cat_price' => $request->cat_price,
        ]);

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    // Store sub query data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address'      => 'required|string|max:255',
            'purpose'      => 'required|string|max:255',
            'lot'          => 'required|string|max:255',
            'block'        => 'required|string|max:255',
            'subdivision_id' => 'required|exists:ngh,id', // FIXED: Use 'ngh' instead of 'subdivisions'
        ]);

        try {
            SubQuery::create($validatedData);
            return redirect()->back()->with('success', 'Sub Query submitted successfully!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Error Code 1062 = Duplicate Entry
                return redirect()->back()->with('error', 'This email has already submitted a query.');
            }
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function index()
    {
        $queries = SubQuery::with('subdivision')->get();  // Fetch all queries from the database
        return view('/viewsubquery', compact('queries')); // Pass data to Blade view
    }

    public function category()
    {
        $category = Category::all();  // Fetch all queries from the database
        return view('category_sub', compact('category')); // Pass data to Blade view
    }
    public function destroy($id)
    {
        $query = SubQuery::findOrFail($id);
        $query->delete();

        return redirect()->route('admin.queries.index')->with('success', 'Query deleted successfully.');
    }
}
