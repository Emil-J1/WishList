<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\WishList;

class CheckWishListOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        $wishListId = $request->route('id');
        $wishList = WishList::find($wishListId);
        $user = Auth::user(); // Get the currently logged in user

        if ($wishList && $wishList->user_id === $user->id) {
            return $next($request); // The user is authorized, and the request continues
        } else {
             return redirect()->back()->with('error', 'You do not have permission to access this wish list.');
        }
    }

};
