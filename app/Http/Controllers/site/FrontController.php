<?php
namespace App\Http\Controllers\site;
use App\Models\SiteSetting;
use App\Models\Domain;
use App\Models\Type;
use App\Models\Service;
use App\Models\Accessory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function siteSetting(){
        $siteSettings = SiteSetting::all();
        return view('front/home', compact('siteSettings'));
    }
    public function Accessory(){
        $types = Type::all();
        return view('front/accessory', compact('types'));
    }
    public function contact(){
        $siteSettings = SiteSetting::all();
        return view('front.contact', compact('siteSettings'));
    }
    public function domainD($id){
        $domain = Domain::findOrFail($id);
        // dd($id);
        $services = Service::where('domain_id', $id)->get();
        // dd($services);
        return view('front.domain', compact('domain','services'));
    }
    public function service($id){
        $service = Service::findOrFail($id);
        // dd($id);
        // dd($services);
        return view('front.service', compact('service'));
    }
    public function frontData(){
        $domains = Domain::all();
        $domainlist = Domain::limit(3)->get();
        return view('welcome')->with([
            'domains'=>$domains,
            'domainlist'=>$domainlist
        ]);
    }
}
