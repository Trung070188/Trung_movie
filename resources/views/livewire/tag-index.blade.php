<section class="container mx-auto p-6 font-mono ">
  <div class="w-full flex mb-4 p-2 justify-end">
    <x-jet-button wire:click="showCreateModal">Create Tags</x-jet-button>
  </div>
  <div class="w-full overflow-x-auto">
    <table class="w-full">
      <thead>
        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
          <th class="px-4 py-3">Name</th>
          <th class="px-4 py-3">Slug</th>
          <th class="px-4 py-3">Manage</th>

        </tr>
      </thead>
      <tbody class="bg-white"> 

  </div>

  @forelse($tags as $tag)
  <tr class="class=text-gray-700">
    <td class="px-4 py-3 border">
      {{$tag->tag_name}}
    </td>
    <td class="px-4 py-3 border">
      {{$tag->slug}}
    </td>


    <td class="px-4 py-3 border">
      <x-m-button wire:click="showEditModal({{$tag->id}})" class="bg-green-500 hover:bg-green-700 text-white">Edit</x-m-button>
      <x-m-button wire:click="deleteTag({{$tag->id}})" class="bg-red-500 hover:bg-red-700 text-white">Delete</x-m-button>
    </td>
  </tr>

  @empty
  <tr class="text-gray-700">
    <td class="px-4 py-3 boder ">
      Empty
    </td>
  </tr>
  @endforelse



  </table>
  <x-jet-dialog-modal wire:model="showTagModal">
    @if ($tagId)
    <x-slot name="title">Update Tag</x-slot>
    @else
    <x-slot name="title">Create Tag</x-slot>
    @endif

    <x-slot name="content">
      <div class="mt-10 sm:mt-0">

        <div class="md:col-span-1">

        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form>
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
      <x-jet-button wire:click="closetagModal" class="bg-gray-600 hover:bg-gray-800 text-white">Cancel</x-jet-button>
      @if($tagId)
      <x-m-button wire:click="updateTag" class="">Update</x-m-button>
      @else
      <x-m-button wire:click="createTag" class="">Create</x-m-button>

      @endif

    </x-slot>
  </x-jet-dialog-modal>
</section>