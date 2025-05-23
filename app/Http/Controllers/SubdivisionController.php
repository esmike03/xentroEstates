<?php

namespace App\Http\Controllers;

use GMP;
use App\Models\Block;
use App\Models\House;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\GallerySub;
use App\Models\Subdivision;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class SubdivisionController extends Controller
{
    /**
     * Show the form for creating a new subdivision.
     */
    public function store_gallery(Request $request)
    {

        $request->validate([
            'image' => 'required|image|max:4048',
            'subdivision_id' => 'required|string|max:255',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GallerySub::create([
            'subdivision_id' => $request->subdivision_id,
            'image' => $path,
        ]);

        return redirect()->back()->with('success', 'Image added to gallery successfully!');
    }

    public function index()
    {

        $category = Category::all();
        return view('create_subdivision', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_name'   => 'required|string|max:255',
            'sub_image'  => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
            'plot'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'blocks.*.houses.*.house_area' => 'required|numeric',
            // 'blocks.*.houses.*.house_price' => 'required|numeric|min:0',
            'location'   => 'required|string|max:255',
        ]);

        // Handle Image Upload
        $imagePath = $request->hasFile('sub_image')
            ? $request->file('sub_image')->store('subdivision_images', 'public')
            : null;
        $plotPath = $request->hasFile('plot')
            ? $request->file('plot')->store('subdivision_plots', 'public')
            : null;

        $totalBlocks = is_array($request->blocks) ? count($request->blocks) : 0;

        // **Step 1: Check for Duplicate Assigned House Numbers in the Same Block**
        foreach ($request->blocks ?? [] as $block) {
            $seenHouseNumbers = [];

            foreach ($block['houses'] ?? [] as $house) {
                $houseNumber = (int) $house['house_number'];

                // Check for duplicate in the request data
                if (in_array($houseNumber, $seenHouseNumbers)) {
                    return redirect()->back()
                        ->withErrors(["Duplicate assigned house number ($houseNumber) in the same block."])
                        ->withInput();
                }

                // Store house number to track duplicates in this block
                $seenHouseNumbers[] = $houseNumber;
            }
        }

        // **Step 2: If No Duplicates Found, Proceed with Saving Everything**
        $subdivision = Subdivision::create([
            'sub_name'     => $request->sub_name,
            'image'        => $imagePath,
            'plot'         => $plotPath, // New field for the lot arrangement image
            'block_number' => $totalBlocks,
            'house_number' => 0, // Will be updated later
            'house_area'   => 0,
            'house_status' => 'Available',
            'category'     => $request->category,
            'location'     => $request->location,
            'description'  => $request->description ?? '', // Ensure a value is always provided
        ]);
        $amenities = explode(',', $request->amenities);
        foreach ($amenities as $amenity) {
            Amenity::create([
                'subdivision_id' => $subdivision->id,
                'name' => trim($amenity),
            ]);
        }


        $totalHouses = 0;

        foreach ($request->blocks ?? [] as $block) {
            $blockRecord = Block::create([
                'subdivision_id' => $subdivision->id,
                'block_area'     => $block['block_area'],
            ]);

            foreach ($block['houses'] ?? [] as $house) {
                House::create([
                    'subdivision_id' => $subdivision->id,
                    'block_id'       => $blockRecord->id,
                    'house_area'     => $house['house_area'],
                    // 'house_price'    => $house['house_price'],
                    'assigned_house_number' => (int) $house['house_number'],
                    'house_status'   => $house['house_status'],
                    'category'   => $house['category'],
                ]);

                $totalHouses++;
            }
        }

        // Update total houses in subdivision
        $subdivision->update(['house_number' => $totalHouses]);

        return redirect()->back()->with('success', 'Subdivision, blocks, and lots created successfully!');
    }
    // public function show($id)
    // {
    //     // Retrieve subdivision along with blocks and their houses
    //     $subdivision = Subdivision::with(['blocks.houses'])->findOrFail($id);

    //     // Extract blocks and map them with their houses
    //     $blocks = $subdivision->blocks->map(function ($block) {
    //         return (object) [
    //             'block_id' => $block->id,  // Get block ID from the blocks table
    //             'block_area' => $block->block_area ?? 'N/A',  // Get block area from blocks table
    //             'houses' => $block->houses,  // Retrieve all houses for this block
    //         ];
    //     });

    //     return view('details', compact('subdivision', 'blocks'));
    // }



    public function showHouses($id)
    {
        $subdivision = Subdivision::with('houses')->findOrFail($id);
        return view('houses', compact('subdivision'));
    }
    public function details($id)
    {
        $subdivision = Subdivision::with(['houses', 'houses.block'])->findOrFail($id);

        // Group houses by block_id
        $blocks = $subdivision->houses
            ->groupBy('block_id')
            ->map(function ($houses, $blockId) {
                // Get the first house's block (all houses in a group should have the same block)
                $block = $houses->first()->block;

                return (object)[
                    'block_id'   => $blockId,
                    'block_area' => $block ? $block->block_area : 'N/A', // Access block_area from Block
                    'houses'     => $houses,
                ];
            });

        return view('/details', compact('subdivision', 'blocks'));
    }
    public function Adminindex()
    {
        $subdivisions = Subdivision::all();
        return view('AdminSub', compact('subdivisions'));
    }
    // Edit Subdivision Functions
    public function edit($id)
    {

        $categorys = Category::all();

        $subdivision = Subdivision::with('blocks.houses.category')->findOrFail($id);
        $gallery_images = GallerySub::where('subdivision_id', $subdivision->id)->get();
        return view('editsubdivision', compact('subdivision', 'categorys', 'gallery_images'));
    }

    public function update(Request $request, $id)
    {
        $subdivision = Subdivision::findOrFail($id);

        $request->validate([
            'sub_name' => 'required|string|max:255',
            'sub_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:501200',
            'plot'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'blocks.*.houses.*.house_area' => 'required|numeric',
            // 'blocks.*.houses.*.house_price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string', // Add this validation rule
        ]);

        $subdivision->sub_name = $request->sub_name;
        $subdivision->location = $request->location; // Update location
        $subdivision->description = $request->description ?? ''; // Ensure description is set

        if ($request->hasFile('sub_image')) {
            $imagePath = $request->file('sub_image')->store('subdivision_images', 'public');
            $subdivision->image = $imagePath;
        }

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
            $subdivision->video = $videoPath;
        }

        // Update plot image if a new file is provided
        if ($request->hasFile('plot')) {
            $plotPath = $request->file('plot')->store('subdivision_plots', 'public');
            $subdivision->plot = $plotPath;
        }

        $subdivision->save();

        // Update blocks and houses
        if ($request->blocks) {
            foreach ($request->blocks as $blockId => $blockData) {
                if (strpos($blockId, 'new_') === 0) {
                    // Create new block
                    $newBlock = Block::create([
                        'subdivision_id' => $subdivision->id,
                        'block_area' => $blockData['block_area'],

                    ]);

                    if (isset($blockData['houses'])) {
                        foreach ($blockData['houses'] as $houseId => $houseData) {
                            if (strpos($houseId, 'new_') === 0) {
                                House::create([
                                    'subdivision_id' => $subdivision->id,
                                    'block_id' => $newBlock->id,
                                    'house_area' => $houseData['house_area'],
                                    'category' => $houseData['category'],
                                    // 'house_price' => $houseData['house_price'],
                                    'assigned_house_number' => $houseData['assigned_house_number'], // Corrected line
                                    'category' => $houseData['category'],
                                    'house_status' => $houseData['house_status'],
                                ]);
                            } else {
                                //Update existing house
                                $house = House::find($houseId);
                                if ($house) {
                                    $house->update($houseData);
                                }
                            }
                        }
                    }
                } else {
                    // Update existing block
                    $block = Block::find($blockId);
                    if ($block) {
                        $block->update(['block_area' => $blockData['block_area']]);

                        if (isset($blockData['houses'])) {
                            foreach ($blockData['houses'] as $houseId => $houseData) {
                                if (strpos($houseId, 'new_') === 0) {
                                    House::create([
                                        'subdivision_id' => $subdivision->id,
                                        'block_id' => $block->id,
                                        'house_area' => $houseData['house_area'],
                                        // 'house_price' => $houseData['house_price'],
                                        'assigned_house_number' => $houseData['assigned_house_number'], // Corrected line
                                        'category' => $houseData['category'],
                                        'house_status' => $houseData['house_status'],
                                    ]);
                                } else {
                                    $house = House::find($houseId);
                                    if ($house) {
                                        $house->update($houseData);
                                    }
                                }
                            }
                        }
                    }
                }
                // After processing blocks and houses:
                $totalBlocks = Block::where('subdivision_id', $subdivision->id)->count();
                $totalHouses = House::where('subdivision_id', $subdivision->id)->count();

                $subdivision->update([
                    'block_number' => $totalBlocks,
                    'house_number' => $totalHouses,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Subdivision updated successfully!');
    }
    public function destroy($id)
    {
        $subdivision = Subdivision::findOrFail($id);

        // Delete related houses (due to foreign key constraints)
        $subdivision->houses()->delete();

        // Delete related blocks (due to foreign key constraints)
        $subdivision->blocks()->delete();

        // Finally, delete the subdivision
        $subdivision->delete();

        return redirect()->route('subdivisions.index')->with('success', 'Subdivision deleted successfully!');
    }
    public function destroyBlock($id)
    {
        $block = Block::findOrFail($id);
        $subdivisionId = $block->subdivision_id; // get the subdivision id

        // Delete related houses first
        $block->houses()->delete();

        $block->delete();

        // Update totals after deletion
        $totalBlocks = Block::where('subdivision_id', $subdivisionId)->count();
        $totalHouses = House::where('subdivision_id', $subdivisionId)->count();

        // Update the subdivision record
        $subdivision = Subdivision::find($subdivisionId);
        if ($subdivision) {
            $subdivision->update([
                'block_number' => $totalBlocks,
                'house_number' => $totalHouses,
            ]);
        }

        return redirect()->back()->with('success', 'Block deleted successfully!');
    }

    public function destroyHouse($id)
    {
        $house = House::findOrFail($id);
        $subdivisionId = $house->subdivision_id; // get the subdivision id

        $house->delete();

        // Update totals after deletion
        $totalBlocks = Block::where('subdivision_id', $subdivisionId)->count();
        $totalHouses = House::where('subdivision_id', $subdivisionId)->count();

        $subdivision = Subdivision::find($subdivisionId);
        if ($subdivision) {
            $subdivision->update([
                'block_number' => $totalBlocks,
                'house_number' => $totalHouses,
            ]);
        }

        return redirect()->back()->with('success', 'House deleted successfully!');
    }
    // user-side
    public function showSubdivisions()
    {
        // Retrieve all subdivisions from the database
        $subdivisions = Subdivision::all();

        // Return the view with the subdivisions data
        return view('showsubdivision', compact('subdivisions'));
    }
    public function show($subdivision_id)
    {
        $categorys = Category::all();
        // Fetch the subdivision or return a 404 error if not found
        $subdivision = Subdivision::findOrFail($subdivision_id);
        $subdivisions = Subdivision::with('blocks.houses.category')->findOrFail($subdivision_id);

        $gallery_images = GallerySub::where('subdivision_id', $subdivision_id)->get();


        // Return the view with the subdivision data
        return view('NGH_sud', compact('subdivision', 'subdivisions', 'categorys', 'gallery_images'));
    }

    public function destroy_gallery($id)
    {
        // Find the gallery image or fail.
        $gallery = GallerySub::findOrFail($id);

        // Delete the image file from storage if it exists.
        if (Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        // Delete the record from the database.
        $gallery->delete();

        return redirect()->back()->with('success', 'Gallery image deleted successfully!');
    }
}
