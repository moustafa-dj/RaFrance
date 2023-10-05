<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use Illuminate\Support\Facades\File;
use \Illuminate\Notifications\Notifiable;
use App\Enums\NotificationType;

class DomainController extends Controller
{
    public function index(){
        $domains = Domain::paginate(4);
        return view('admin.domain.index',compact('domains'));
    }
    public function create(){
        return view('admin.domain.create');
    }
    public function store(Request $request){

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $domain = new Domain();
        $domain->title = $validatedData['title'];
        $domain->link = $validatedData['link'];
        $domain->description = $validatedData['description'];
        $filename = time() . '.' . $request->image->extension();
        $filpath =  $request->image->move(public_path('uploads/domains'), $filename);
        $domain->image = $filename;
        

        if($domain){
            $domain->save($validatedData);
            session()->flash('notification.message', 'domain été ajouter avec succès');
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
        $domain = Domain::findOrFail($id);
        return view('admin.domain.edit',compact('domain'));
    }
    public function update(Request $request ,$id){
        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'link' => 'string|max:255',
            'description' => 'required|string|max:5000',
        ]);
 
        $domain = Domain::findOrFail($id);
        $domain->title = $validatedData['title'];
        $domain->description = $validatedData['description'];
        $domain->link = $validatedData['link'];
        if ($request->hasFile('image')) {
            File::delete($domain->image);
            $filename = time() . '.' . $request->image->extension();
            $filpath =  $request->image->move(public_path('uploads/domains'), $filename);
            $domain->image = $filpath;
        }

        if($domain){
            $domain->save($validatedData);
            session()->flash('notification.message', 'domain été modifier avec succès');
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
        $domain = Domain::findOrFail($id);
        if($domain){
            $domain->delete();
            session()->flash('notification.message', 'domain été supprimer avec succès');
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
