<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Accessory;
use \Illuminate\Notifications\Notifiable;
use App\Enums\NotificationType;

class TypeController extends Controller
{
    public function index(){
        $types = Type::all();
        return view('admin.type.index',compact('types'));
    }
    public function create(){
        return view('admin.type.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string|max:5000',
        ]);

        $type = new Type();
        $type->title = $validatedData['title'];
        $type->desc = $validatedData['desc'];

        if($type){
            $type->save($validatedData);
            session()->flash('notification.message', 'type été ajouter avec succès');
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
        $type = Type::findOrFail($id);
        return view('admin.type.edit',compact('type'));
    }
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'desc' => 'string|max:5000',
        ]);
        $type = Type::findOrFail($id);
        $type->title = $validatedData['title'];
        $type->desc = $validatedData['desc'];

        if($type){
            $type->save($validatedData);
            session()->flash('notification.message', 'type été ajouter avec succès');
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
        $type = Type::findOrFail($id);
        if($type){
            $type->delete();
            session()->flash('notification.message', 'type été supprimer avec succès');
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
