<?php

namespace App\Http\Controllers\admin;
use App\Models\Estimate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Notifications\Notifiable;
use App\Enums\NotificationType;

class EstimateController extends Controller
{
    public function index(){
        $estimates = Estimate::paginate(4);
        return view('admin.estimate.index',compact('estimates'));
    }
    public function send(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'firstname' => 'required|string',
            'email' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
            'pcode' => 'required',
            'message' => 'required|string',
        ]);

        $estimate = Estimate::create($validatedData);

        if($estimate){
            session()->flash('notification.message', 'devis été envoyer avec succès');
            session()->flash('notification.type', NotificationType::SUCCESS);
            session()->flash('timeout', 5000);
        }else{
            session()->flash('notification.message', 'un problème est apparu');
            session()->flash('notification.type', NotificationType::ERROR);
            session()->flash('timeout', 5000); 
        }
        return redirect()->back();
    }
    public function details(Estimate $estimate){
        return view('admin.estimate.details',compact('estimate'));
    }
    public function delete(Estimate $estimate){
        $estimate->delete();
        
        if($estimate){
            session()->flash('notification.message', 'devis été supprimer avec succès');
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
