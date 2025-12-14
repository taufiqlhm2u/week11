<x-layout>
    <x-slot:title>Create Agent</x-slot:title>

   <div class="h-screen flex justify-center items-center">
     <div class="bg-white shadow-lg w-90 rounded-sm px-4 py-3">
        <h2 class="text-2xl font-semibold">Add Agent</h2>
        <hr class="mb-3">
        <form action="/agent/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter agent's name" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                @error('name')
                <span class="text-red-600 italic text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-indigo-500" placeholder="Enter agent's description" ></textarea>
                  @error('description')
                <span class="text-red-600 italic text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="file" name="photo" id="photo" placeholder="Enter agent's photo" class="hidden" >
                <label for="photo" class="flex justify-center items-center text-sm font-medium h-25 w-full border border-dashed border-gray-500 text-gray-700 rounded-md hover:border-indigo-500 hover:text-indigo-500"><i class="ri-image-add-fill"></i>Upload Photo</label>
                  @error('photo')
                <span class="text-red-600 italic text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-8">
                <button type="submit" class="w-full bg-indigo-500 text-white text-md font-semibold px-3 py-2 rounded-md transform transition-all hover:bg-indigo-700">Submit</button>
            </div>
        </form>
    </div>
   </div>
</x-layout>