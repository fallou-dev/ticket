<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>
<x-guest-layout>
      <form action = "/create" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="user_name" required/>
          
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="user_email" required />
           
        </div>
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="user_password" required />
           
        </div>
        <div>
            <x-input-label for="role" :value="__('Role')" />
            <select name="user_role">
            <option value="user">user</option>
            <option value="support">support</option>
            <option value="admin">admin</option>
            </select>
           
        </div>
         <br><br>
        <div>
        <x-primary-button class="ml-3">
                {{ __('Add user') }}
            </x-primary-button>
</div>        
               
  
      </form>

</x-guest-layout>
</x-app-layout>