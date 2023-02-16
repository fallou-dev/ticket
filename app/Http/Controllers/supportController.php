<?php

namespace App\Http\Controllers;
use App\Models\ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class supportController extends Controller
{
    public function view() {
       
        
        $tickets = ticket::where('etat', '!=','CLÔTURÉ')->get();
        return view('support.ticket_view',['tickets'=>$tickets]);
     }

     public function search(Request $request) {
        
        $etat    = $request->input('ticket_etat');
        $tickets = ticket::where('assigne', '!=','CLÔTURÉ')->where('etat','Like','%' .$etat. '%')->get();
        return view('support.ticket_view',['tickets'=>$tickets]);
   }

   public function assignement(Request $request,$id) {
      $proprietaire    =  Auth::user()->name;
      $assigne    = $request->input('assigne');
      if($assigne=='assigne'){
      $tickets = ticket::where('id', '=',$id)->update(['assigne'=> $proprietaire ,'etat'=> 'EN COURS']);
      $tickets = ticket::where('id', '=',$id)->get();
      return view('support.ticket_management',['tickets'=>$tickets]);
      }
      elseif($assigne=='enAttente'){
         $tickets = ticket::where('id', '=',$id)->update(['etat'=> 'EN ATTENTE' ]); 
      }
      elseif($assigne=='nonTraiter'){
         $tickets = ticket::where('id', '=',$id)->update(['etat'=> 'NE PAS TRAITER' ]); 
      }
      elseif($assigne=='terminer'){
         $tickets = ticket::where('id', '=',$id)->update(['etat'=> 'TERMINÉ' ]); 
      }
      elseif($assigne=='cloturer'){
         $tickets = ticket::where('id', '=',$id)->update(['etat'=> 'CLÔTURÉ' ]); 
      }
      elseif($assigne=='notassigne'){
         $tickets = ticket::where('id', '=',$id)->update(['assigne'=> 'Personne' ,'etat'=> 'REÇU' ]); 
      }
      $tickets = ticket::where('etat', '!=','CLÔTURÉ')->get();
      
      return redirect("support/listTicket");
    
 }
 public function show($id) {
   $tickets = ticket::where('id', '=',$id)->get();
   return view('support.ticket_management',['tickets'=>$tickets]);
  }
}
