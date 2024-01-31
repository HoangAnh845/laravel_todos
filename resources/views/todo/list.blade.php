<x-layout>
    <div class="container mx-auto">
        <div class="flex justify-between items-center my-5">
            <div class="font-light text-3xl">
                <a href="/todo/list">Todo List</a>
            </div>
            <div class="">
                <button disabled type="button" class="text-white bg-blue-700 cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2 " width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                    </svg>
                    <a href="/todo/create">Add New Todo</a>
                </button>
                <button disabled type="button" class="text-white bg-blue-700 cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle mr-2" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                    <a href="/user/edit/{{$user->id}}"> {{$user->name}} </a>
                </button>
                <button disabled type="button" class="text-white bg-blue-700 cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right mr-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                    <a href="/logout"> Logout </a>
                </button>
            </div>
        </div>
        <div class="w-100 border h-px bg-gray-100"></div>

        @include('partials.flash_notification')

        <div class="todo_list my-5">
            <div class="">
                <div class="mb-5 flex items-center justify-between">
                    <x-form method="POST" action="{{route('todo.search')}}" id="search-form" class="flex items-center w-full justify-between">
                        <div class="flex items-center">
                            <x-input.group label="Starte Date" for="start_date" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                <input id="start_date" name="start_date" type="date" class="chooseDate appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" placeholder="Select date" date_format="DD/MM/YYYY" />
                            </x-input.group>
                        </div>
                        <div class="relative flex mt-3">
                            <div class="rounded-l-lg border-r focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-2 bg-blue-700 text-white font-medium">
                                <select id="status" name="status" class="outline-none bg-transparent">
                                    <option value="">Status</option>
                                    <option value="Not started">Not started</option>
                                    <option value="In progress">In progress</option>
                                    <option value="Done">Done</option>
                                </select>
                            </div>
                            <x-input.text class="textSearch block p-2.5 w-full z-20 text-sm text-gray-900 border-s-gray-50 border-s-2 border border-gray-300 outline-none " type="search" id="textSearch" name="textSearch" placeholder="Search todo..." />
                            <x-button type="submit" class="searchTodo p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <x-iconsvg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </x-iconsvg>
                                <span class="sr-only">Search</span>
                            </x-button>
                        </div>
                    </x-form>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-blue-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tags
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Note
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Starte Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Create Time
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($checkList !== null)
                        @foreach($todoList as $todo)
                        <tr id="{{ $todo->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $todo->name }}</th>
                            <td class="px-6 py-4">{{ $todo->status }}</td>
                            <td class="px-6 py-4">{{ $todo->tags }}</td>
                            <td class="px-6 py-4">{{ $todo->note }}</td>
                            <td class="px-6 py-4">{{ $todo->start_date }}</td>
                            <td class="px-6 py-4">{{ $todo->created_at }}</td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <!-- <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill font-medium text-yellow-300 hover:underline cursor-pointer" viewBox="0 0 16 16">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                                    </svg>
                                </span> -->
                                <span>
                                    <a href="/todo/edit/{{ $todo->id }}" class="editTodo font-medium text-violet-300 hover:underline cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </a>
                                </span>
                                <span>
                                    <a href="/todo/delete/{{ $todo->id }}" class="editTodo font-medium text-rose-300 hover:underline cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </a>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    {{ $todoList->links() }}
                </table>
                @if($checkList == null)
                <div class="w-100 h-[400px] flex flex-col items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <span class="font-light text-md">Not found your list todo</span>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // $(".searchTodo").submit((e) => {
        //     e.preventDefault();            
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('todo.search') }}",
        //         data: $("#search-form").serialize(),
        //         success: function(data) {
        //             console.log('--- DATA ---', data);

        //         }
        //     });
        // })


        // $.map((item,index) => {
        //     // console.log('--- DATA ---', $(this));
        //     $(this).click((e) => {

        //         // $.ajaxSetup({
        //         //     headers: {
        //         //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         //     }
        //         // });
        //         // $.ajax({
        //         //     url: '/todo/search',
        //         //     type: 'POST',
        //         //     todos: {
        //         //         name:inputSearch, 
        //         //         status:statuSearch
        //         //     },
        //         //     success: function(response) {
        //         //         console.log('--- DATA ---', response);


        //         //         // Thêm một todo vào danh sách
        //         //         // getTodos.push(todo);
        //         //         // localStorage.setItem('todos', JSON.stringify(getTodos));
        //         //         // windstatuSearchp://127.0.0.1:8000/todo/list";
        //         //     },
        //         //     error: function(error) {
        //         //         console.error(error);
        //         //     }
        //         // });
        //     })
        // })
    </script>
</x-layout>