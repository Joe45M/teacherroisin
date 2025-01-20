<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ReferralController extends Controller
{
    public function setReferral(Request $request, $ref)
    {

        if ($ref) {

            Cookie::queue('ref', $ref);
        }

        return redirect(route('register'));
    }
}
