<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $this->data['site_title'] = Setting::where('option_name', 'site_title')->first()->option_value ?? '';
        $this->data['site_logo'] = Setting::where('option_name', 'site_logo')->first()->option_value ?? '';
        $this->data['ads_banner'] = Setting::where('option_name', 'ads_banner')->first()->option_value ?? '';
        $this->data['ads_link'] = Setting::where('option_name', 'ads_link')->first()->option_value ?? '';
        return view('backend.settings', $this->data);
    }

    public function storeOrUpdate(Request $request)
    {
        $logo = '';

        //checking site title
        $site_title = Setting::where('option_name', 'site_title')->first();
        if ($site_title) {
            $site_title->update([
                'option_value' => $request->site_title
            ]);
        } else {
            Setting::create([
                'option_name' => 'site_title',
                'option_value' => $request->site_title
            ]);
        }

        //checking site logo
        if ($request->hasFile('site_logo')) {
            $site_logo = Setting::where('option_name', 'site_logo')->first();
            if ($site_logo) {
                //removing old image if exist
                if ($site_logo->option_value) {
                    unlink(public_path('storage/' . $site_logo->option_value));
                }

                $logo = 'site_logo.' . $request->site_logo->extension();

                //moving file
                $request->site_logo->move(public_path('storage'), $logo);

                $site_logo->update([
                    'option_value' => $logo
                ]);
            } else {
                $logo = 'site_logo.' . $request->site_logo->extension();

                //moving file
                $request->site_logo->move(public_path('storage'), $logo);

                Setting::create([
                    'option_name' => 'site_logo',
                    'option_value' => $logo
                ]);
            }
        }

        //Checking Advertising Banner
        if ($request->hasFile('ads_banner')) {
            $ads_banner = Setting::where('option_name', 'ads_banner')->first();
            if ($ads_banner) {
                //removing old image if exist
                if ($ads_banner->option_value) {
                    unlink(public_path('storage/' . $ads_banner->option_value));
                }

                $banner = 'ads_banner.' . $request->ads_banner->extension();

                //moving file
                $request->ads_banner->move(public_path('storage'), $banner);

                $ads_banner->update([
                    'option_value' => $banner
                ]);
            } else {
                $banner = 'ads_banner.' . $request->ads_banner->extension();

                //moving file
                $request->ads_banner->move(public_path('storage'), $banner);

                Setting::create([
                    'option_name' => 'ads_banner',
                    'option_value' => $banner
                ]);
            }
        }

        //checking ads link
        $ads_link = Setting::where('option_name', 'ads_link')->first();
        if ($ads_link) {
            $ads_link->update([
                'option_value' => $request->ads_link
            ]);
        } else {
            Setting::create([
                'option_name' => 'ads_link',
                'option_value' => $request->ads_link
            ]);
        }

        return redirect()->back()->with('msg', 'Settings has been updated!');
    }
}
