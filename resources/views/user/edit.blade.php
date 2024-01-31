<x-layout>
    <div class="container mx-auto">
        <div class="my-5">
            <div class="font-light text-3xl font-normal">Edit This User</div>
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
                            <a href="/todo/create" class="ms-1 text-sm font-medium text-blue-700 hover:text-blue-600 md:ms-2 dark:text-blue-400 dark:hover:text-whit font-medium">Edit</a>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="w-100 border h-px bg-gray-100"></div>
        </div>
        <div>
            <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
            <x-form class="w-full max-w-lg" method="POST" action="{{ route('put.update.user',$user->id) }}">
                <div class="w-full md:w-1/2 md:mb-0 flex flex-col gap-6">

                    <x-input.group label="Name" for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        <input type="text" placeholder="Write here..." id="name" name="name" value="{{$user->name}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" require @if(old("name")) value="{{old('name')}}" @endif />
                    </x-input.group>
                    @error('name')
                    <div class="alert alert-danger text-rose-500 mt-2 text-xs">{{ $message }}</div>
                    @enderror

                    <x-input.group label="Email" for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        <input type="email" placeholder="Write here..." id="email" name="email" value="{{$user->email}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" require @if(old("email")) value="{{old('email')}}" @endif />
                    </x-input.group>
                    @error('email')
                    <div class="alert alert-danger text-rose-500 mt-2 text-xs">{{ $message }}</div>
                    @enderror

                    <x-input.group label="Password" for="password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        <input type="password" placeholder="••••••••" id="password" name="password" value="{{$user->password}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" />
                    </x-input.group>
                    @error('password')
                    <div class="alert alert-danger text-rose-500 mt-2 text-xs">{{ $message }}</div>
                    @enderror

                </div>
                <button class="edit mt-5 inline-flex items-center p-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800" type="submit">
                    Edit
                </button>
            </x-form>
        </div>
    </div>
</x-layout>