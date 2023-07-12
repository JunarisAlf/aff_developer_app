<div class="my-auto">
   
    <form class="mt-4 pt-2"  wire:submit.prevent="register">
        {{-- name lengkap --}}
        <div class="mb-4">
            <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Nama Lengkap</label>
            <div class="relative">
                <input name="full_name" class="w-full rounded border-gray-100 @error('full_name') border-red-500 @enderror placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" wire:model="full_name" type="text">
                @error('full_name')
                    <i class='bx bx-error-circle absolute text-xl text-red-500 ltr:right-2 rtl:left-2 top-2'></i>
                @enderror
            </div>
            @error('full_name')
                <div class="text-xs text-red-500 mt-2">{{$message}}</div>
            @enderror
        </div>

        {{-- email --}}
        <div class="mb-4">
            <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Email</label>
            <div class="relative">
                <input name="email" class="w-full rounded border-gray-100 @error('email') border-red-500 @enderror placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" wire:model="email" type="email">
                @error('email')
                    <i class='bx bx-error-circle absolute text-xl text-red-500 ltr:right-2 rtl:left-2 top-2'></i>
                @enderror
            </div>
            @error('email')
                <div class="text-xs text-red-500 mt-2">{{$message}}</div>
            @enderror
        </div>

         {{-- nomor wa --}}
         <div class="mb-4">
            <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Nomor Whatsapp</label>
            <div class="relative">
                <input name="wa_number" class="w-full rounded border-gray-100 @error('wa_number') border-red-500 @enderror placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" wire:model="wa_number" type="number">
                @error('wa_number')
                    <i class='bx bx-error-circle absolute text-xl text-red-500 ltr:right-2 rtl:left-2 top-2'></i>
                @enderror
            </div>
            @error('wa_number')
                <div class="text-xs text-red-500 mt-2">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-4">
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto Profil</label>
                <input name="file" wire:model="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">.jpg, .jpeg, atau .png (Disarankan ratio gambar 1:1)</p>
                @error('role')
                    <div class="text-xs text-red-500 mt-2">{{$message}}</div>
                @enderror
            </div>
        </div>

        {{-- password --}}
        <div class="mb-4" x-data="{ showPassword: false }">
            <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Password</label>
            <div class="relative">
                <div class="flex" x-data="{ showPassword: false }">
                    <input x-bind:type="showPassword ? 'text' : 'password'" wire:model="password" name="password" type="password" class="w-full rounded ltr:rounded-r-none rtl:rounded-l-none placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60 @error('password') border-red-500 @enderror " placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                    <button @click="showPassword = !showPassword" class="bg-gray-50 px-4 rounded ltr:rounded-l-none rtl:rounded-r-none border border-gray-100 ltr:border-l-0 rtl:border-r-0 dark:bg-zinc-700 dark:border-zinc-600 dark:text-gray-100" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                </div>
               
            </div>
            @error('password')
                <div class="text-xs text-red-500 mt-2">{{$message}}</div>
            @enderror
        </div>

        
        <div class="mb-3">
            <div class="flex">
                <div class="flex-grow-1">
                    <label class="text-gray-600 dark:text-gray-100 font-medium mb-2 block">Konfirmasi Password</label>
                </div>
            </div>
            <div class="flex" x-data="{ showPassword: false }">
                <input x-bind:type="showPassword ? 'text' : 'password'" wire:model="password_confirmation" name="password_confirmation" type="password" class="w-full rounded ltr:rounded-r-none rtl:rounded-l-none placeholder:text-sm py-2 border-gray-100 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-gray-100 dark:placeholder:text-zinc-100/60 @error('password') border-red-500 @enderror " placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                <button @click="showPassword = !showPassword" class="bg-gray-50 px-4 rounded ltr:rounded-l-none rtl:rounded-r-none border border-gray-100 ltr:border-l-0 rtl:border-r-0 dark:bg-zinc-700 dark:border-zinc-600 dark:text-gray-100" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
            </div>
        </div>

        <div class="mb-3 mt-12" >
            <button class="btn border-transparent bg-violet-500 w-full py-2.5 text-white w-100 waves-effect waves-light shadow-md shadow-violet-200 dark:shadow-zinc-600" type="submit">Daftar</button>
        </div>
    </form>


   @if (session()->has('error'))
        <div class="relative px-5 py-3 border-2 bg-red-50 text-red-700 border-red-100 rounded">
            <p>{{session('error')}}</p>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="relative px-5 py-3 border-2 bg-green-50 text-green-700 border-green-100 rounded mb-3">
            <p>{{session('success')}}</p>
        </div>
    @endif
    
    
    <div class="mt-12 text-center">
        <p class="text-gray-500 dark:text-gray-100">Sudah memiliki akun?<a href="{{route('login_page')}}" class="text-violet-500 font-semibold"> Masuk</a> </p>
    </div>


 
    
</div>