
<div class="flex flex-col">

    <div class="grid grid-cols-12 gap-5">
        <div class="col-span-12">
            <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                <div class="card-body pb-0">
                    <h6 class="mb-1 text-15 font-bold text-gray-700 dark:text-gray-100">Informasi Umum</h6>
                </div>
                <div class="card-body">
                    <div class="mt-4">
                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Nama Properti</label>
                        <div class="relative">
                            <input name="name" class="w-full rounded border-gray-300 @error('name') border-red-500 @enderror placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text">
                            @error('name')
                                <i class='bx bx-error-circle absolute text-xl text-red-500 ltr:right-2 rtl:left-2 top-2'></i>
                            @enderror
                        </div>
                        @error('name')
                            <div class="text-xs text-red-500 mt-2">{{$message}}</div>
                        @enderror
                    </div>
    
                    <div class="mt-4">
                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Harga</label>
                        <div class="relative">
                            <input name="price" class="w-full rounded border-gray-300 @error('price') border-red-500 @enderror placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100"  type="number">
                            @error('price')
                                <i class='bx bx-error-circle absolute text-xl text-red-500 ltr:right-2 rtl:left-2 top-2'></i>
                            @enderror
                        </div>
                        @error('price')
                            <div class="text-xs text-red-500 mt-2">{{$message}}</div>
                        @enderror
                    </div>
    
                    <div class="mt-4">
                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Alamat</label>
                        <div class="relative">
                            <input name="address" class="w-full rounded border-gray-300 @error('address') border-red-500 @enderror placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text">
                            @error('address')
                                <i class='bx bx-error-circle absolute text-xl text-red-500 ltr:right-2 rtl:left-2 top-2'></i>
                            @enderror
                        </div>
                        @error('address')
                            <div class="text-xs text-red-500 mt-2">{{$message}}</div>
                        @enderror
                    </div>
    
                    <div class="mt-4" wire:ignore>
                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Deskripsi</label>
                        <div id="property-description"></div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-5">
        <div class="col-span-12">
            <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                <div class="card-body pb-0">
                    <h6 class="mb-1 text-15 font-bold text-gray-700 dark:text-gray-100">Detail</h6>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mt-8 col-span-2 md:col-span-1">
                            <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2 text-center">Summary</label>
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 dark:text-gray-100 uppercase bg-gray-50/50 dark:bg-zinc-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3"> Nama</th>
                                        <th scope="col" class="px-6 py-3">Nilai</th>
                                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($summaries as $key => $summary)
                                        <tr class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                            <td class="px-2 py-2 dark:text-zinc-100/80">
                                                <input name="address" class="w-full rounded border-gray-300 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" wire:model="summaries.{{ $key }}.key">
                                            </td>
                                            <td class="px-2 py-2 dark:text-zinc-100/80">
                                                <input name="address" class="w-full rounded border-gray-300 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" wire:model="summaries.{{ $key }}.value">
                                            </td>
                                            <td wire:click="deleteSummary({{$key}})" class="px-2 py-2 dark:text-zinc-100/80 flex flex-row justify-center">
                                                <button type="button" class="btn text-white bg-red-500 border-red-500 hover:bg-red-600 hover:border-red-600 focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-500/30 active:bg-red-600 active:border-red-600 "><i class="bx bx-trash text-16 align-middle"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                   
                                    <tr class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                        <td wire:click="addSummaryRow" class="px-2 py-2 dark:text-zinc-100/80" colspan="3">
                                            <button type="button" class="btn text-white bg-green-500 border-green-500 hover:bg-green-600 hover:border-green-600 focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-500/30 active:bg-green-600 active:border-green-600 w-full"><i class="bx bx-plus text-16 align-middle ltr:mr-1 rtl:ml-1 "></i><span class="align-middle">Tambah Baris</span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
        
                        <div class="mt-8 col-span-2 md:col-span-1">
                            <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2 text-center">Fitur</label>
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 dark:text-gray-100 uppercase bg-gray-50/50 dark:bg-zinc-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nomor</th>
                                        <th scope="col" class="px-6 py-3">Fitur</th>
                                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($features as $key => $feature)
                                        <tr class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                            <td class="px-2 py-2 dark:text-zinc-100/80 text-center w-[50px]">
                                               {{$key+1}}
                                            </td>
                                            <td class="px-2 py-2 dark:text-zinc-100/80">
                                                <input name="address" class="w-full rounded border-gray-300 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" wire:model="features.{{ $key }}">
                                            </td>
                                            <td wire:click="deleteFeature({{$key}})" class="px-2 py-2 dark:text-zinc-100/80 flex flex-row justify-center">
                                                <button type="button" class="btn text-white bg-red-500 border-red-500 hover:bg-red-600 hover:border-red-600 focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-500/30 active:bg-red-600 active:border-red-600 "><i class="bx bx-trash text-16 align-middle"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                   
                                    <tr class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                        <td wire:click="addFeatureRow" class="px-2 py-2 dark:text-zinc-100/80" colspan="3">
                                            <button type="button" class="btn text-white bg-green-500 border-green-500 hover:bg-green-600 hover:border-green-600 focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-500/30 active:bg-green-600 active:border-green-600 w-full"><i class="bx bx-plus text-16 align-middle ltr:mr-1 rtl:ml-1 "></i><span class="align-middle">Tambah Baris</span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-5">
        <div class="col-span-12">
            <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                <div class="card-body pb-0">
                    <h6 class="mb-1 text-15 font-bold text-gray-700 dark:text-gray-100">Media</h6>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mt-8 col-span-2">
                            <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2 text-center">Gallery Foto</label>
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 dark:text-gray-100 uppercase bg-gray-50/50 dark:bg-zinc-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">File</th>
                                        <th scope="col" class="px-6 py-3">Preview</th>
                                        <th scope="col" class="px-6 py-3">Status</th>
                                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($img_gallery as $key => $img)
                                        <tr class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                            <td class="px-2 py-2 dark:text-zinc-100/80">
                                                <input name="file" wire:model="img_gallery.{{ $key }}.file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file">
                                            </td>
                                            <td class="px-2 py-2 dark:text-zinc-100/80">
                                               -
                                            </td>
                                            <td class="px-2 py-2 dark:text-zinc-100/80">
                                               -
                                            </td>
                                            <td wire:click="deleteImgGallery({{$key}})" class="px-2 py-2 dark:text-zinc-100/80 flex flex-row justify-center">
                                                <button type="button" class="btn text-white bg-red-500 border-red-500 hover:bg-red-600 hover:border-red-600 focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-500/30 active:bg-red-600 active:border-red-600 "><i class="bx bx-trash text-16 align-middle"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                   
                                    <tr class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                        <td wire:click="addImgGalleryRow" class="px-2 py-2 dark:text-zinc-100/80" colspan="4">
                                            <button type="button" class="btn text-white bg-green-500 border-green-500 hover:bg-green-600 hover:border-green-600 focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-500/30 active:bg-green-600 active:border-green-600 w-full"><i class="bx bx-plus text-16 align-middle ltr:mr-1 rtl:ml-1 "></i><span class="align-middle">Tambah Baris</span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
        
                        <div class="mt-8 col-span-1 md:col-span-1">
                            <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2 text-center">Fitur</label>
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 dark:text-gray-100 uppercase bg-gray-50/50 dark:bg-zinc-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nomor</th>
                                        <th scope="col" class="px-6 py-3">Fitur</th>
                                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($features as $key => $feature)
                                        <tr class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                            <td class="px-2 py-2 dark:text-zinc-100/80 text-center w-[50px]">
                                               {{$key+1}}
                                            </td>
                                            <td class="px-2 py-2 dark:text-zinc-100/80">
                                                <input name="address" class="w-full rounded border-gray-300 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" wire:model="features.{{ $key }}">
                                            </td>
                                            <td wire:click="deleteSummary({{$key}})" class="px-2 py-2 dark:text-zinc-100/80 flex flex-row justify-center">
                                                <button type="button" class="btn text-white bg-red-500 border-red-500 hover:bg-red-600 hover:border-red-600 focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-500/30 active:bg-red-600 active:border-red-600 "><i class="bx bx-trash text-16 align-middle"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                   
                                    <tr class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                        <td wire:click="addFeatureRow" class="px-2 py-2 dark:text-zinc-100/80" colspan="3">
                                            <button type="button" class="btn text-white bg-green-500 border-green-500 hover:bg-green-600 hover:border-green-600 focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-500/30 active:bg-green-600 active:border-green-600 w-full"><i class="bx bx-plus text-16 align-middle ltr:mr-1 rtl:ml-1 "></i><span class="align-middle">Tambah Baris</span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>