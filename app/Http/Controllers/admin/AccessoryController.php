<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Accessory;
use \Illuminate\Notifications\Notifiable;
use App\Enums\NotificationType;

class AccessoryController extends Controller
{
    public function index(){
        $accessories = Accessory::paginate(4);
        return view('admin.accessory.index',compact('accessories'));
    }
    public function create(){
        $types = Type::all();
        return view('admin.accessory.create',compact('types'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'type_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $accessory = new Accessory();
        $accessory->title = $validatedData['title'];
        $accessory->desc = $validatedData['description'];
        $accessory->type_id = $validatedData['type_id'];
        // $imagePath = $request->file('image')->store('uploads/accessorys', 'public');
        $filename = time() . '.' . $request->image->extension();
        $filpath =  $request->image->move(public_path('uploads/accessorys'), $filename);

        $accessory->image = $filename;
        if($accessory){
            $accessory->save($validatedData);
            session()->flash('notification.message', 'accesoire été ajouter avec succès');
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
        $types = Type::all();
        $accessory = Accessory::findOrFail($id);
        return view('admin.accessory.edit',compact('accessory','types'));
    }
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string|max:5000',
            'type_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $accessory = Accessory::findOrFail($id);
        $accessory->title = $validatedData['title'];
        $accessory->desc = $validatedData['description'];
        $accessory->type_id = $validatedData['type_id'];

        // $imagePath = $request->file('image')->store('uploads/accessorys', 'public');
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $filpath =  $request->image->move(public_path('uploads/accessorys'), $filename);
            $accessory->image = $filename;
        }
        if($accessory){
            $accessory->save($validatedData);
            session()->flash('notification.message', 'accesoire été ajouter avec succès');
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
        $accessory = Accessory::findOrFail($id);
        if($accessory){
            File::delete($accessory->image);
            $accessory->delete();
            session()->flash('notification.message', 'accessory été supprimer avec succès');
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
