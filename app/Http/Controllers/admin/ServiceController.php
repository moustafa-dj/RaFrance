<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Domain;
use \Illuminate\Notifications\Notifiable;
use App\Enums\NotificationType;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::paginate(4);
        return view('admin.service.index',compact('services'));
    }
    public function create(){
        $domains = Domain::all();
        return view('admin.service.create',compact('domains'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'gtitle' => 'required|string|max:255',
            'stitle' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'bdescription' => 'required|string|max:5000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'domain_id' => 'required',
        ]);

        $service = new Service();
        $service->title = $validatedData['title'];
        $service->gtitle = $validatedData['gtitle'];
        $service->stitle = $validatedData['stitle'];
        $service->description = $validatedData['description'];
        $service->bdescription = $validatedData['bdescription'];
        // $imagePath = $request->file('image')->store('uploads/services', 'public');
        $filename = time() . '.' . $request->image->extension();
        $filpath =  $request->image->move(public_path('uploads/services'), $filename);

        $service->image = $filename;
        $service->domain_id = $validatedData['domain_id'];
        if($service){
            $service->save($validatedData);
            session()->flash('notification.message', 'service été ajouter avec succès');
            session()->flash('notification.type', NotificationType::SUCCESS);
            session()->flash('timeout', 5000);
        }else{
            session()->flash('notification.message', 'un problème est apparu');
            session()->flash('notification.type', NotificationType::ERROR);
            session()->flash('timeout', 5000); 
        }
        return redirect()->back();
    }
    public function edit($id){
        $service = Service::findOrFail($id);
        $domains = Domain::all();
        return view('admin.service.edit',compact('service','domains'));
    }
    public function update(Request $request ,$id){
        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'gtitle' => 'string|max:255',
            'stitle' => 'string|max:255',
            'description' => 'string|max:5000',
            'bdescription' => 'string|max:5000',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'domain_id' => 'nullable',
        ]);

        $service = Service::findOrFail($id);
        $service->title = $validatedData['title'];
        $service->gtitle = $validatedData['gtitle'];
        $service->stitle = $validatedData['stitle'];
        $service->description = $validatedData['description'];
        $service->bdescription = $validatedData['bdescription'];
        if ($request->hasFile('image')) {
            File::delete($service->image);
            $filename = time() . '.' . $request->image->extension();
            $filpath =  $request->image->move(public_path('uploads/services'), $filename);
    
            $service->image = $filpath;
        }

        $service->domain_id = $validatedData['domain_id'];
        if($service){
            $service->save($validatedData);
            session()->flash('notification.message', 'service été modifier avec succès');
            session()->flash('notification.type', NotificationType::SUCCESS);
            session()->flash('timeout', 5000);
        }else{
            session()->flash('notification.message', 'un problème est apparu');
            session()->flash('notification.type', NotificationType::ERROR);
            session()->flash('timeout', 5000); 
        }
        return redirect()->back();
    }
    public function delete($id){
        $service = Service::findOrFail($id);
        if($service){
            File::delete($service->image);
            $service->delete();
            session()->flash('notification.message', 'service été supprimer avec succès');
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
