<x-layout>
    <x-slot:title>Agent</x-slot:title>

    <x-nav></x-nav>

    <div class="max-w-300 mx-auto mt-5">
        <div class="mb-5 flex justify-between ">
            <h2 class="text-2xl font-bold">Agent List</h2>
            <form action="/agent/search">
                <div class="border border-gray-400 rounded-md w-60 shadow">
                    <span class="pl-2"><i class="ri-search-line"></i></span>
                    <input type="search" name="keyword" id="" placeholder="Search agent" autocomplete="off"
                        class="w-50 py-1 outline-none" value="{{ old('keyword') }}">
                </div>
            </form>
            <a href="/agent/create"
                class="bg-blue-600 text-white px-3 py-1 rounded-md shadow-lg transform transition-all hover:-translate-y-0.5">Add<i
                    class="ri-add-line"></i></a>
        </div>

        <div class="flex justify-center flex-wrap gap-5">
            @foreach ($agent as $a)
                <div
                    class="bg-white w-55 p-2 rounded-xl shadow-lg transform transition-all hover:-translate-y-2 hover:shadow-2xl transition-300">
                    <img src="{{ asset('images/agents/' . $a->image) }}" loading="lazy" alt=""
                        class="h-35 object-cover rounded-xl">

                    <div class="p-2">
                        <h3 class="font-semibold text-lg">{{ $a->name }}</h3>
                        <p class="text-gray-600 text-sm">{{ $a->desc }}<a href="/agent/show/{{ $a->id }}"
                                class="text-blue-700 hover:underline">Detail&raquo;</a></p>
                    </div>
                    <div class="m-2">
                        <a role="button" href="/agent/edit/{{ $a->id }}"
                            class="text-white bg-[#0d6efd] transform transition-all hover:bg-[#0b5ed7] px-3 py-1 rounded-md "><i
                                class="ri-edit-fill"></i></a>
                        <a role="button" href="/agent/destroy/{{ $a->id }}" class="text-white bg-[#dc3545] hover:bg-[#bb2d3b] px-3 py-1 rounded-md "><i
                                class="ri-delete-bin-6-fill" data-confirm-delete="true"></i></a>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="my-5 px-4">
            {{ $agent->links() }}
        </div>

    </div>
</x-layout>