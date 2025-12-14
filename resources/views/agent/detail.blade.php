<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-nav></x-nav>

    <div class="mt-5 flex justify-center">
        <div
        class="bg-white w-80 p-2 rounded-xl shadow-lg transform transition-all hover:-translate-y-2 hover:shadow-2xl transition-300">
        <img src="{{ asset('images/agents/' . $agent->image) }}" loading="lazy" alt="" class="h-60 object-cover rounded-xl">

        <div class="p-2">
            <h3 class="font-semibold text-lg">{{ $agent->name }}</h3>
            <p class="text-gray-600 text-sm">{{ $agent->description }}</p>
            <p class="text-sm text-gray-700">Release: <i>{{ $agent->release_date }}</i></p>
        </div>
        <div class="m-2">
            <a role="button" href="/agent/edit/{{ $agent->id }}"
                class="text-white bg-[#0d6efd] transform transition-all hover:bg-[#0b5ed7] px-3 py-1 rounded-md "><i
                    class="ri-edit-fill"></i></a>
            <a role="button" href="/agent/destroy/{{ $agent->id }}" class="text-white bg-[#dc3545] hover:bg-[#bb2d3b] px-3 py-1 rounded-md "><i
                    class="ri-delete-bin-6-fill" data-confirm-delete="true"></i></a>
        </div>

    </div>
    </div>
</x-layout>