<div>
<div>
    <!-- component -->
<table class="border-collapse w-full ">
    <div class="w-full flex mb-4 p-2 justify-end"><x-jet-button wire:click="showCreateModal">Create Tags</x-jet-button></div>
    
    <thead>
        <tr>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Name</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Slug</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Manage</th>

        </tr>
    </thead>
    <tbody >
      @forelse($tags as $tag)
      <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Company name</span>
               {{$tag->tag_name}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                {{$tag->slug}}
            </td>
          
            
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                Edit/Delete
            </td>
        </tr>

      @empty
      <tr class="text-gray-700"> 
        <td class="px-4 py-3 boder ">
          Empty
        </td>
      </tr>
      @endforelse
        
       
       
    </tbody>
</table>
<x-jet-dialog-modal wire:model="showTagModal">
<x-slot name="title">Create Tag</x-slot>
<x-slot name="content">
<div class="mt-10 sm:mt-0">
  
    <div class="md:col-span-1">
     
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form >
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6">
                <label for="street-address" class="block text-sm font-medium text-gray-700">Tag Name</label>
                <input wire:model="tagName" type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>   
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</x-slot>
<x-slot name="footer">
<x-jet-button wire:click="closetagModal" >Cancel</x-jet-button>
<x-jet-button wire:click="createTag" >Create</x-jet-button>

</x-slot>
</x-jet-dialog-modal>
</div>

</div>
