<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Ticket') }}
        </h2>
    </x-slot>
<x-guest-layout>
      <form action = "/client/edit/{{$tickets[0]->id}}" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      
        
            
            <x-input-label for="titre" :value="__('Titre')" />
            <x-text-input id="titre" class="block mt-1 w-full" type="text" name="ticket_titre" value='{{$tickets[0]->titre}}' required/>
            
                  
   
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" class="block mt-1 w-full" type="text" name="ticket_description"  required >{{$tickets[0]->description}}</textarea>                  
            
            <x-input-label for="priorite" :value="__('Priorite')" />
            <select name="ticket_priorite" required>
            <option value="faible">Faible</option>
            <option value="normal">Normal</option>
            <option value="haut">Haut</option>
            </select>
          
               
                  <br><br>
 
                     <x-primary-button class="ml-3">
                {{ __('Edit ticket') }}
            </x-primary-button>
              
      </form>
      </x-guest-layout>
</x-app-layout>
