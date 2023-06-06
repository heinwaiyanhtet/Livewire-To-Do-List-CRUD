<div class="container flex justify-center mt-6">

    <div class="w-7/12">
        @forelse($todos as $todo)

            <div>
                <div class="mt-6 border border-gray-900 rounded-lg bg-gray-50 p-2 block">

                <div class="flex items-center" x-data="{ open: false}">

                    <input  type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">

                    {{-- {{ $isEditing[3] }} --}}
                        <div class="ml-2 w-10/12" x-show="open" @keydown.enter="open = false" x-transition>
                            <input type="text"
                                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                   name=""
                                   value="{{ $todo->todos }}"
                                   wire:keydown.enter="updateToDo({{ $todo->id }}, $event.target.value)"
                             >

                        </div>

                        <label class="ml-2" @click="open = true" x-show="!open">
                            {{ $todo->todos }}
                        </label>

                </div>

                {{-- <div class="flex justify-start mt-4">
                        <div class="w-10/12">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Notes </label>
                            <textarea id="message" rows="6" class="mr-6 w-11/12 p-2.5  text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your notes for tasks here..."></textarea>
                        </div>

                        <div class="w-2/4">
                            <label for="Priority" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Priority</label>
                            <select id="Priority" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                {{-- <option selected>Select Priority</option> --}}
                                {{-- <option value="US">None</option>
                                <option value="CA">Low</option>
                                <option value="FR">Meium</option>
                                <option value="DE">High</option>
                            </select>

                            <button wire:click="deleteToDo({{$todo->id}})" type="button" class="mt-2 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                        </div>
                    </div>
                </div> --}}

            </div>

        @empty

            <div class="mt-14 border border-gray-900 rounded-md bg-gray-50 h-9 items-center flex justify-center">
                <h1 class="text-center"> There is no todo here</h1>
            </div>

        @endforelse

        <form wire:submit.prevent="storeToDo()" class="mt-6 mb-6">
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                 <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" viewBox="0 0 512 512"><path d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>

                </div>
                <input type="search" wire:model="todo" id="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Add Task" required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Add</button>
            </div>
        </form>

    </div>

</div>
