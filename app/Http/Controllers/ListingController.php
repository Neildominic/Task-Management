<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use App\Models\UserHasListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ListingController extends Controller
{
    protected $listing;

    public function __construct(
        Listing $listing
    ){
        $this->listing = $listing;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'title', 'status', 'page'
        ]);

        $query = $this->listing->with('userHasListing')
            ->orderByDesc('created_at');

        if($filters['title'] ?? false) {
            $query->where('title', 'LIKE', '%' . $filters['title'] . '%');
        }
        if($filters['status'] ?? false) {
            $query->where('status', '=',  $filters['status']);
        }

        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => $query->paginate(10)
                    ->withQueryString()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $isPublished = 0;

        if ($request->draft == false) {
            $isPublished = 1;
        }

        $createListing = $this->listing->create([
            'title'         => $request->title,
            'description'   => $request->description,
            'status'        => $request->status,
            'is_Published'  => $isPublished
        ]);

        UserHasListing::create([
            'user_id'       =>  Auth::id(),
            'listing_id'    => $createListing->id
        ]);

        return redirect()->route('listing.index')
            ->with('success', 'Task was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $isPublished = 0;

        if ($request->draft == false) {
            $isPublished = 1;
        }

        $listing->update([
            'title'         => $request->title,
            'description'   => $request->description,
            'status'        => $request->status,
            'is_Published'  => $isPublished
        ]);

        return redirect()->route('listing.index')
            ->with('success', 'Task was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->back()
            ->with('success', 'Task was deleted!');
    }
}
