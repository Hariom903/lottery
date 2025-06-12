<?php

namespace App\Http\Controllers\Policies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoliciesController extends Controller
{
    //
    public function privacyNotice()
    {
        return view('Policies.PrivacyNotice');
    }
    public function termsOfuse()
    {
        return view('Policies.TermsofUse');
    }
    public function cookiePolicy()
    {
        return view('Policies.CookiePolicy');
    }
}
