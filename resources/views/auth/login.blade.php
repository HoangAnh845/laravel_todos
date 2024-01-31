<x-layout>
    <section class="w-full h-screen bg-[#7A88EF]">
        <div class="container mx-auto flex items-center justify-center h-screen py-12 overflow-hidden">
            <div class="w-4/12 h-5/6 bg-cover bg-center bg-no-repeat rounded-l-lg" style="background-image:url('images/sign_in.png')"></div>
            <div class="w-4/12 h-5/6 bg-white text-black rounded-r-lg">
                <div class="p-6 sm:p-8 h-full">
                    <div class="text-sm text-right font-light text-gray-500 dark:text-gray-400">
                        Don’t have an account? <a href="/register" class="text-xs font-medium text-primary-600 hover:underline dark:text-primary-500 border rounded-2xl py-2 px-4 ms-2">SIGN UP</a>
                    </div>
                    <div class="mt-10 mb-5">
                        <h1 class="text-3xl font-bold leading-tight tracking-tight ">Welcome Back</h1>
                        <h3 class="text-gray-400 mt-2 ms-1 text-md font-light">Login your account</h3>
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
                    <form class="space-y-4 md:space-y-6" action="/authenticate" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-md font-light">Email</label>
                            <input type="email" name="email" id="email" class="w-full p-2.5 outline-none border rounded-lg" placeholder="name@gmail.com" required require @if(old("email")) value="{{old('email')}}" @endif>
                        </div>
                        <div class="mb-1">
                            <label for="password" class="block mb-2 text-md font-light">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="w-full p-2.5 outline-none border rounded-lg" required require @if(old("password")) value="{{old('password')}}" @endif>
                        </div>
                        <a href="#" class="text-xs text-gray-400 block" style="margin-top:10px;">Forgot password?</a>
                        <button type="submit" class="text-white bg-indigo-500 shadow-lg shadow-indigo-500/50 w-3/6 py-2 rounded-full ">
                            Login
                        </button>
                        <div class="flex items-center gap-2 translate-y-14">
                            <span class="text-gray-400 text-sm">Login with</span>
                            <div class="flex gap-3 items-center">
                                <div class="p-2 border rounded-full">
                                    <img class="" src="images/icon-facebook.png" width="20" height="20" />
                                </div>
                                <div class="p-2 border rounded-full">
                                    <img class="" src="images/icon-in.png" width="20" height="20" />
                                </div>
                                <div class="p-2 border rounded-full">
                                    <a href="/login/google">
                                        <img class="" src="images/icon-google.png" width="20" height="20" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>