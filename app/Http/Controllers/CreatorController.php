<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreatorController extends Controller
{
    // Display list of blogs (paginated)
    public function home()
    {
        $creators = Creator::with('place')->latest()->paginate(6);
        return view('blogs.home', compact('creators'));
    }

    public function about()
    {
        return view('blogs.about');
    }
    public function contact()
    {
        return view('blogs.contact');
    }
    
    // Show single blog
    public function show(Creator $creator)
    {
        return view('blogs.show', compact('creator'));
    }

    // Show create form (only for logged-in users)
    public function create()
    {
        $places = Place::all();
        return view('blogs.create', compact('places'));
    }

    // Store a new blog
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'place_id' => 'required|exists:places,id',
        ]);

        Creator::create($validated);

        return redirect()->route('blogs.home')->with('success', 'Blog published successfully!');
    }

    // Delete a blog (only for logged-in users)
    public function destroy(Creator $creator)
    {
        $creator->delete();
        return redirect()->route('blogs.home')->with('success', 'Blog deleted successfully!');
    }
    
    // Search blogs by title or content
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $creators = Creator::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->orWhere('author', 'like', "%{$query}%")
            ->with('place')
            ->latest()
            ->paginate(6);
            
        return view('blogs.home', compact('creators', 'query'));
    }
        public function apiIndex()
    {
        $creators = Creator::with(['place', 'comments.user'])->get();
        
        return response()->json([
            'success' => true,
            'data' => $creators,
            'count' => $creators->count(),
            'message' => 'Creators retrieved successfully'
        ]);
    }

    /**
     * API method to get single creator
     */
    public function apiShow($id)
    {
        $creator = Creator::with(['place', 'comments.user'])->find($id);
        
        if (!$creator) {
            return response()->json([
                'success' => false,
                'message' => 'Creator not found'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $creator,
            'message' => 'Creator retrieved successfully'
        ]);
    }
}


