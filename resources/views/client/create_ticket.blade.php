<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Ticket') }}
        </h2>
    </x-slot>
<x-guest-layout>
      <form action = "/creat" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

         <input type="hidden" name="ticket_proprietaire" value='{{ Auth::user()->name }}'/>
         <div>
            <x-input-label for="titre" :value="__('Titre')" />
            <x-text-input id="titre" class="block mt-1 w-full" type="text" name="ticket_titre" required/>
          
        </div>
        
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" class="block mt-1 w-full" type="text" name="ticket_description" required ></textarea>
           
        </div>
        <div>
            <x-input-label for="priorite" :value="__('Priorite')" />
            <select name="ticket_priorite" required>
            <option value="faible">Faible</option>
            <option value="normal">Normal</option>
            <option value="haut">Haut</option>
           
            </select>
           
        </div>
         <br><br>
        <div>
        <x-primary-button class="ml-3">
                {{ __('Add Ticket') }}
            </x-primary-button>
</div>        
               
      </form>

</x-guest-layout>
</x-app-layout>