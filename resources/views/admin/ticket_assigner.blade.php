<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Ticket') }}
        </h2>
    </x-slot>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="/css/liste.css">

   <div >
   
   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                

    
        
           <ul class="liste">
            <li><h1><strong>Ticket N ° {{ $tickets[0]->id }}</strong></h1></li>
            <li>Titre              :{{ $tickets[0]->titre }}</li>
            <li>Etat               :{{ $tickets[0]->etat }}</li>
            <li>Description        :{{ $tickets[0]->description }}</li>
            <li>Priorité           :{{ $tickets[0]->priorite }}</li>
            <li>Propriétaire       :{{ $tickets[0]->proprietaire }}</li>
            <li>Pris en charge par :{{ $tickets[0]->assigne }}</li>
            <li>Créer le           :{{ $tickets[0]->created_at }}</li>
            <li>Mis à jour le      :{{ $tickets[0]->updated_at }}</li>
            </ul>
            <br>
            
        <form action = "/admin/attribuer/{{ $tickets[0]->id }}" method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <x-input-label for="name" :value="__('Assigné à:')" />
            <select name="user_name">
            @foreach ($users as $user)
            <option value="{{ $user->name }}">{{ $user->name }}</option> 
            @endforeach
            </select>
            <x-primary-button class="assignement" >
            <strong>
                Assigner
            </strong>
            </x-primary-button>
         
       </form>
            <hr>
            

         
   

               </div>
            </div>
        </div>
    </div>
    
      </div>
      </x-app-layout>