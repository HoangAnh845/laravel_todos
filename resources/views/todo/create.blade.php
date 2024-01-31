<x-layout>
    <div class="container mx-auto">
        <div class="my-5">
            <div class="font-light text-3xl font-normal">Create New Todo</div>

            <nav class="flex mb-5 mt-3" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/todo/list" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 ">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="/todo/create" class="ms-1 text-sm font-medium text-blue-700 hover:text-blue-600 md:ms-2 dark:text-blue-400 dark:hover:text-whit font-medium">Create</a>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="w-100 border h-px bg-gray-100"></div>
        </div>
        <div class="todo_create my-5">
            <x-form class="w-full max-w-lg" method="POST" action="/todo/store">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 md:mb-0">

                        <x-input.group label="Name todo" for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            <input type="text" placeholder="Write here..." id="name" name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" require @if(old("name")) value="{{old('name')}}" @endif />
                        </x-input.group>
                        @error('name')
                        <div class="alert alert-danger text-rose-500 mt-2 text-xs">{{ $message }}</div>
                        @enderror


                    </div>
                    <div class="w-full md:w-1/2 px-3">

                        <x-input.group label="Tags" for="tags" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"></x-input.group>
                        <div class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white">
                            <select id="tags" name="tags" class="w-full bg-transparent outline-none">
                                <option selected value="work">Work</option>
                                <option value="study">Study</option>
                                <option value="personal">Personal</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        @error('tags')
                        <div class="alert alert-danger text-rose-500 mt-2 text-xs">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="w-full mb-7">

                    <x-input.group label="Starte Date" for="start_date" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        <input id="start_date" name="start_date" type="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" placeholder="Select date" require @if(old("start_date")) value="{{ old('start_date') }}" @endif />
                    </x-input.group>
                    @error('start_date')
                    <div class="alert alert-danger text-rose-500 mt-2 text-xs">{{ $message }}</div>
                    @enderror

                </div>
                <div class="w-full mb-7">

                    <x-input.group label="Note" for="note" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        <input type="text" placeholder="Write here..." id="note" name="note" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" @if(old("note")) value="{{old('note')}}" @endif />
                    </x-input.group>

                </div>
                <div class="w-full mb-7">

                    <x-input.group label="Describe" for="des" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"></x-input.group>
                    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <div class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">
                            <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x sm:rtl:divide-x-reverse dark:divide-gray-600">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                                    <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 20">
                                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M1 6v8a5 5 0 1 0 10 0V4.5a3.5 3.5 0 1 0-7 0V13a2 2 0 0 0 4 0V6" />
                                        </svg>
                                        <span class="sr-only">Attach file</span>
                                    </button>
                                    <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                            <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                        </svg>
                                        <span class="sr-only">Embed map</span>
                                    </button>
                                    <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                            <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z" />
                                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                                        </svg>
                                        <span class="sr-only">Upload image</span>
                                    </button>
                                    <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                                            <path d="M14.067 0H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.933-2ZM6.709 13.809a1 1 0 1 1-1.418 1.409l-2-2.013a1 1 0 0 1 0-1.412l2-2a1 1 0 0 1 1.414 1.414L5.412 12.5l1.297 1.309Zm6-.6-2 2.013a1 1 0 1 1-1.418-1.409l1.3-1.307-1.295-1.295a1 1 0 0 1 1.414-1.414l2 2a1 1 0 0 1-.001 1.408v.004Z" />
                                        </svg>
                                        <span class="sr-only">Format code</span>
                                    </button>
                                    <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM13.5 6a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm-7 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm3.5 9.5A5.5 5.5 0 0 1 4.6 11h10.81A5.5 5.5 0 0 1 10 15.5Z" />
                                        </svg>
                                        <span class="sr-only">Add emoji</span>
                                    </button>
                                </div>
                                <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse sm:ps-4">
                                    <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.5 3h9.563M9.5 9h9.563M9.5 15h9.563M1.5 13a2 2 0 1 1 3.321 1.5L1.5 17h5m-5-15 2-1v6m-2 0h4" />
                                        </svg>
                                        <span class="sr-only">Add list</span>
                                    </button>
                                    <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z" />
                                        </svg>
                                        <span class="sr-only">Settings</span>
                                    </button>
                                    <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M18 2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2ZM2 18V7h6.7l.4-.409A4.309 4.309 0 0 1 15.753 7H18v11H2Z" />
                                            <path d="M8.139 10.411 5.289 13.3A1 1 0 0 0 5 14v2a1 1 0 0 0 1 1h2a1 1 0 0 0 .7-.288l2.886-2.851-3.447-3.45ZM14 8a2.463 2.463 0 0 0-3.484 0l-.971.983 3.468 3.468.987-.971A2.463 2.463 0 0 0 14 8Z" />
                                        </svg>
                                        <span class="sr-only">Timeline</span>
                                    </button>
                                    <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                            <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="sr-only">Download</span>
                                    </button>
                                </div>
                            </div>
                            <button type="button" data-tooltip-target="tooltip-fullscreen" class="p-2 text-gray-500 rounded cursor-pointer sm:ms-auto hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 19">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 1h5m0 0v5m0-5-5 5M1.979 6V1H7m0 16.042H1.979V12M18 12v5.042h-5M13 12l5 5M2 1l5 5m0 6-5 5" />
                                </svg>
                                <span class="sr-only">Full screen</span>
                            </button>
                            <div id="tooltip-fullscreen" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Show full screen
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <textarea id="des" name="des" rows="8" class="appearance-none block w-full bg-gray-200 text-gray-700 py-3 px-4 leading-tight focus:outline-none focus:bg-white" placeholder="Write an article...">@if(old("des")) {{old('des')}} @endif</textarea>
                    </div>

                </div>
                <button class="create inline-flex items-center p-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800" type="submit">
                    Submit
                </button>
            </x-form>

        </div>
    </div>
    <script>
        var todoDraft = JSON.parse(localStorage.getItem('todoDraft'));
        if (todoDraft === null || todoDraft.length === undefined) {
            localStorage.setItem('todoDraft', JSON.stringify({}));
        }

        if (todoDraft !== null || todoDraft.length !== undefined) {
            $('input').on('blur', function() {
                localStorage.setItem('todoDraft', JSON.stringify({
                    name: $('#name').val(),
                    tag: $('#tags').val(),
                    start_data: $('#start_date').val(),
                    note: $('#note').val(),
                    des: $('#des').val()
                }));
            });
            $('#name').val(todoDraft.name);
            // $('#tags').checked(todoDraft.tags);
            $('#start_data').val(todoDraft.start_data);
            $('#note').val(todoDraft.note);
            $('#des').val(todoDraft.des);
        }

        // in dữ liệu vào

        // Sub
        $(".create").click(function() {
            localStorage.removeItem('todoDraft');
        })


        // button.click((e) => {
        //     console.log('--- DATA ---', e);

        // })
        // button.addEventListener('click', function(e) {
        //     // e.preventDefault();
        // });

        // Check xem đã có dữ liệu hiện tại hay chưa 
        // Nếu có thì thêm một đối tượng vào mảng
        // Nếu chưa tạo một mảng trống để lưu trữ trên localstorage
        // var getTodos = JSON.parse(localStorage.getItem('todos'));
        // // Lấy thời gian hiện tại
        // var now = new Date();
        // var day = ("0" + now.getDate()).slice(-2);
        // var month = ("0" + (now.getMonth() + 1)).slice(-2);
        // var year = now.getFullYear();
        // var create_date = year + "-" + month + "-" + day;


        // if (getTodos === null || !Array.isArray(getTodos)) {
        //     localStorage.setItem('todos', JSON.stringify([]));
        // } else {

        // }
        // button.addEventListener('click', function(e) {
        //     e.preventDefault();
        //     const name = $('name').value;
        //     const tags = $('tags').value;
        //     const starte_date = $('start_date').value;
        //     const note = $('note').value;
        //     const des = $('des').value;




        //     var todo = {
        //         name: name,
        //         status: 'Not Started',
        //         tags: tags,
        //         starte_date: starte_date,
        //         note: note,
        //         des: des
        //     };

        //     // console.log('--- DATA ---', todo);

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         url: '/todo/store',
        //         type: 'POST',
        //         todos: todo,
        //         success: function(response) {
        //             console.log('--- DATA ---', response);

        //             // Thêm một todo vào danh sách
        //             // getTodos.push(todo);
        //             // localStorage.setItem('todos', JSON.stringify(getTodos));
        //             // window.location.href = "http://127.0.0.1:8000/todo/list";
        //         },
        //         error: function(error) {
        //             console.error(error);
        //         }
        //     });

        // })
    </script>
</x-layout>