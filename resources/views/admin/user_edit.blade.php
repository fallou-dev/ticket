<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>
<x-guest-layout>
      <form action = "/user/edit/{{$users[0]->id}}" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      
        
            
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="user_name" value='{{$users[0]->name}}' required/>
            
                  
   
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="user_email" value='{{$users[0]->email}}' required/>
                  
            
            <x-input-label for="role" :value="__('Role')" />
            <select name="user_role">
            <option value="admin">admin</option>
            <option value="support">support</option>
            <option value="user">user</option>
            </select>
          
               
                  <br><br>
 
                     <x-primary-button class="ml-3">
                {{ __('Edit user') }}
            </x-primary-button>
              
      </form>
      </x-guest-layout>
</x-app-layout>
