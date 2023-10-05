<?php

namespace App\Http\Controllers\admin;
use App\Models\SiteSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Notifications\Notifiable;
use App\Enums\NotificationType;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siteSettings = SiteSetting::paginate(4);

        return view('admin.site-settings.index', compact('siteSettings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.site-settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'key' => 'required|unique:site_settings',
            'value' => 'nullable',
        ]);

        $site = SiteSetting::create($validatedData);

        if($site){
            session()->flash('notification.message', 'setting été ajouter avec succès');
            session()->flash('notification.type', NotificationType::SUCCESS);
            session()->flash('timeout', 5000);
        }else{
            session()->flash('notification.message', 'un problème est apparu');
            session()->flash('notification.type', NotificationType::ERROR);
            session()->flash('timeout', 5000); 
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteSetting $siteSetting)
    {
        return view('admin.site-settings.edit', compact('siteSetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteSetting $siteSetting)
    {
        $validatedData = $request->validate([
            'key' => 'nullable',
            'value' => 'nullable',
        ]);

        $siteSetting->update($validatedData);
        if($siteSetting){
            session()->flash('notification.message', 'setting été modifier avec succès');
            session()->flash('notification.type', NotificationType::SUCCESS);
            session()->flash('timeout', 5000);
        }else{
            session()->flash('notification.message', 'un problème est apparu');
            session()->flash('notification.type', NotificationType::ERROR);
            session()->flash('timeout', 5000); 
        }
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(SiteSetting $siteSetting)
    {
        $siteSetting->delete();
        
        if($siteSetting){
            session()->flash('notification.message', 'setting été supprimer avec succès');
            session()->flash('notification.type', NotificationType::SUCCESS);
            session()->flash('timeout', 5000);
        }else{
            session()->flash('notification.message', 'un problème est apparu');
            session()->flash('notification.type', NotificationType::ERROR);
            session()->flash('timeout', 5000); 
        }

        return redirect()->back();
    }
}
