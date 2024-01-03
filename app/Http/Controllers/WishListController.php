<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WishList;

class WishListController extends Controller
{   public function index()
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
            return redirect()->back()->with('error', 'Whoops, you do not have permission to edit this wishlist.');
        }
    }

    public function show(WishList $wishlist)
    {
        // The dynamic $wishes variable, is a collection of all the wishes from a wishlist.
        $wishes = $wishlist->wishes;
        return view('wishlist')->with('wishes', $wishes)->with('wishlist', $wishlist);
    }
};
