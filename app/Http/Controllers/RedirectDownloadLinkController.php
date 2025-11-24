<?php

namespace App\Http\Controllers;

use App\Models\MobileApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Jenssegers\Agent\Agent;

class RedirectDownloadLinkController extends Controller
{
    public function __invoke(Request $request)
    {

        $mobileApp = MobileApp::where('hidden', false)
            ->latest('created_at')
            ->first();

        if (!$mobileApp) {

            return Redirect::route('home')->with('status', 'The download link is currently unavailable.');
        }

        $agent = new Agent();
        $redirectUrl = false;


        if ($agent->isAndroidOS()) {
            $redirectUrl = $mobileApp->android ?: $mobileApp->apk;
        } elseif ($agent->isIOS()) {

            $redirectUrl = $mobileApp->ios;
        }

        if (!$redirectUrl) {
            return Redirect::route('chose.device')->with('message', __('Chose your device type to download app!'));
        }

        return Redirect::away($redirectUrl);
    }
}
