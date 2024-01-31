<x-layout>
    <section class="w-full h-screen bg-[#7A88EF]">
        <div class="container mx-auto flex items-center justify-center h-screen py-12 overflow-hidden">
            <div class="w-4/12 h-5/6 bg-cover bg-center bg-no-repeat rounded-l-lg" style="background-image:url('images/sign_up.png')"></div>
            <div class="w-4/12 h-5/6 bg-white text-black rounded-r-lg">
                <div class="p-6 sm:p-8 h-full">
                    <div class="text-sm text-right font-light text-gray-500 dark:text-gray-400">
                        Already have an account? <a href="/login" class="text-xs font-medium text-primary-600 hover:underline dark:text-primary-500 border rounded-2xl py-2 px-4 ms-2">SIGN IN</a>
                    </div>
                    <div class="mt-10 mb-5">
                        <h1 class="text-3xl font-bold leading-tight tracking-tight ">Welcome to Todos</h1>
                        <h3 class="text-gray-400 mt-2 ms-1 text-md font-light">Register your account</h3>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="text-rose-400">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="space-y-4 md:space-y-6" action="/store" method="POST">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-md font-light">Name</label>
                            <input type="text" name="name" id="name" class="w-full p-2.5 outline-none border rounded-lg" placeholder="name@company.com" required @if(old("name")) value="{{old('name')}}" @endif>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-md font-light">Email</label>
                            <input type="email" name="email" id="email" class="w-full p-2.5 outline-none border rounded-lg" placeholder="name@company.com" required @if(old("email")) value="{{old('email')}}" @endif>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-md font-light">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="w-full p-2.5 outline-none border rounded-lg" required @if(old("password")) value="{{old('password')}}" @endif>
                        </div>
                        <button type="submit" class="text-white bg-indigo-500 shadow-lg shadow-indigo-500/50 w-3/6 py-2 rounded-full ">
                            Sign Up
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>