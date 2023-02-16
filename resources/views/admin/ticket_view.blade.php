<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Tickets') }}
        </h2>
    </x-slot>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="/css/liste.css">
<form action="/admin/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="ticket_etat"
            placeholder="Search Etat"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
   <div >
   @empty (!$tickets)
   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


         @foreach ($tickets as $ticket)
             
           <ul class="liste">
            <li><h1><strong>Ticket N ° {{ $ticket->id }}</strong></h1></li>
            <li>Titre              :{{ $ticket->titre }}</li>
            <li>Etat               :{{ $ticket->etat }}</li>
            <li>Description        :{{ $ticket->description }}</li>
            <li>Priorité           :{{ $ticket->priorite }}</li>
            <li>Propriétaire       :{{ $ticket->proprietaire }}</li>
            <li>Pris en charge par :{{ $ticket->assigne }}</li>
            <li>Créer le           :{{ $ticket->created_at }}</li>
            <li>Mis à jour le      :{{ $ticket->updated_at }}</li>
            </ul>
            <br>
            
           
           
            <form action = "/admin/assignement/{{ $ticket->id }}" method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            @if( $ticket->assigne=='Personne')
            
            <x-primary-button class="assignement" name="assigne" value="assigne">
            <strong>
             S'assigné ticket
            </strong>
            </x-primary-button>

            @elseif(Auth::user()->name==$ticket->assigne && $ticket->assigne!='Personne')
            <x-primary-button class="assignement2" name="assigne" value="notassigne" >
            <strong>
                Annuler assignement
            </strong>
            </x-primary-button>

         
            @endif
            </form>

            @if(Auth::user()->name==$ticket->assigne)
            <x-primary-button class="assignement3" onclick="window.location='/admin/management/{{ $ticket->id }}'">  
            <strong>
             Assigné Etat
            </strong>
            </x-primary-button>
            <x-primary-button class="assignement" onclick="window.location='/admin/assigner/{{ $ticket->id }}'">
            <strong>
             Assigné ticket
            </strong>
            </x-primary-button>
            @endif

            <hr>
         @endforeach

               </div>
            </div>
        </div>
    </div>
      @else 
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                La liste est vide
                </div>
            </div>
        </div>
    </div>
      
      @endempty
      </div>
      </x-app-layout>