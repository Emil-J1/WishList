<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WishList;

class WishListController extends Controller
{
    public function index()
    {
         $user = Auth::user();
         $wishlists = $user->wishlists;
     
         return view('wishlists.index', compact('wishlists'));
    }
    
    public function edit($id)
    {
        $wishlist = WishList::find($id);

        if (Auth::id() !== $wishlist->user_id) {
            // The currently authenticated user is not the owner of the wishlist.
            // Redirect them back with an error message.
            return redirect()->back()->with('error', 'You do not have permission to edit this wishlist.');
        }
    }
    
    public function __construct()
    {
        // Middleware Eliminates the need for ID in the function.
        $this->middleware('auth')->only(['userWishListsShow']);
    }

    public function userWishListsShow()
    {
        // User middleware eliminates the need for ID in the function.
        $user = auth()->user();
        $userWishLists = $user->wishlists;
        return view('content.userWishLists', compact('userWishLists'));
    }
};