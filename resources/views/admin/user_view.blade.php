<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Users') }}
        </h2>
    </x-slot>
    <link type="text/css" rel="stylesheet" href="/css/liste.css">
<link type="text/css" rel="stylesheet" href="css/table.css">
   <div class="font-semibold text-xl text-gray-800 leading-tight ">
   @empty (!$users)
   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <table class="styled-table">
                <thead>
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            
            <th colspan="2" >Action</th>
            
         </tr>
</thead>
         @foreach ($users as $user)
         <tbody>
         <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            
            
            <td> <x-primary-button class="assignement3" onclick="window.location='/user/edit/{{$user->id}}'">  
            <strong>
             Modifier
            </strong>
            </x-primary-button>
            </td>
            <td>
            <x-primary-button class="assignement2" onclick="window.location='/user/delete/{{$user->id}}'">  
            <strong>
             Supprimer
            </strong>
            </x-primary-button>
            </td>
            

         </tr>
         @endforeach
</tbody>
      </table>
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