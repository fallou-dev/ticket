<?php

namespace App\Http\Controllers;
use App\Models\ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class clientController extends Controller
{
    public function insertform() {
        return view('client.create_ticket');
     }
      
     public function insert(Request $request) {
         
      
        $proprietaire    = $request->input('ticket_proprietaire');
        $titre = $request->input('ticket_titre');
        $priorite = $request->input('ticket_priorite');
        $description = $request->input('ticket_description');
        $ticket=ticket::create([
         'titre' => $titre ,
         'description' => $description ,
         'priorite' => $priorite ,
         'proprietaire' => $proprietaire ,
        ]);
       
       
        return redirect('listTicket');
     }

     public function view() {
        $proprietaire    =  Auth::user()->name;
        
        $tickets = ticket::where('proprietaire', '=',$proprietaire)->get();
        return view('client.ticket_view',['tickets'=>$tickets]);
     }

     public function search(Request $request) {
        $proprietaire    =  Auth::user()->name;
        $etat    = $request->input('ticket_etat');
        $tickets = ticket::where('proprietaire', '=',$proprietaire)->where('etat','Like','%' .$etat. '%')->get();
        return view('client.ticket_view',['tickets'=>$tickets]);
   }
  
   public function show_edit_page($id) {
      $tickets = ticket::where('id', '=',$id)->get();
      return view('client.ticket_edit',['tickets'=>$tickets]);
     }
  
     public function edit(Request $request,$id) {
      $titre = $request->input('ticket_titre');
        $priorite = $request->input('ticket_priorite');
        $description = $request->input('ticket_description');
        $tickets = ticket::where('id', '=',$id)->update(['titre'=> $titre,'description'=> $description,'priorite'=> $priorite,'etat'=> 'REÇU']); 
      
      return redirect('listTicket');
   }
   
}
