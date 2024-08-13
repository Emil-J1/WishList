<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WishList;
use Filament\Http\Controllers\Auth\LoginController;

class FrontPageController extends Controller
{
    public function edit($id)
    {
        $wishlist = WishList::find($id);

        if (Auth::id() !== $wishlist->user_id) {
            // The currently authenticated user is not the owner of the wishlist.
            // Redirect them back with an error message.
            return redirect()->back()->with('error', 'Ups, du har ikke tilladelse til at redigere denne ønskeliste.');
        }
    }

    public function show(WishList $wishlist)
    {
        // The dynamic $wishes variable, is a collection of all the wishes from a wishlist.
        $wishes = $wishlist->wishes;
        return view('wishlist')->with('wishes', $wishes)->with('wishlist', $wishlist);
    }
}
