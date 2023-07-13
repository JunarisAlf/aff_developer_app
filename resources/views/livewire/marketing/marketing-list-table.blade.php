<div class="grid grid-cols-12 gap-5">
    <div class="col-span-12">
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div class="w-full overflow-x-auto">
                    <div class="flex flex-row  gap-6 mb-8 mt-4 items-center justify-between">
                        <div class="w-[30%] min-w-max">
                            <div class="flex flex-row items-center gap-2">
                                <label>Show</label>
                                <input class="w-16 rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="number" name="paginate_count" wire:model.lazy="paginate_count" id="example-email-input">
                                <label>Of {{$data_count}} Entries</label>
                            </div>
                        </div>
                        <div class="w-[30%] flex items-center min-w-[250px]">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mr-3">Status</label>
                            <select id="countries" class="bg-zinc-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="status">
                                <option selected>Pilih Kolom</option>
                                @foreach ($statusSelect as $status)
                                    <option value="{{$status['value']}}">{{$status['label']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-[40%] min-w-[350px]">
                            <div class="flex">
                                
                                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-zinc-200 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-zinc-700 dark:hover:bg-zinc-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">{{$searchField['label']}}<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/> </svg>
                                </button>
                                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                        @foreach ($searchableField as $key => $field)
                                            <li>
                                                <button wire:click="searchFieldChange('{{$key}}')" type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$field['label']}}</button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="relative w-full">
                                    <input wire:model.lazy="searchQuery" type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-zinc-100 rounded-r-lg border-l-zinc-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-500 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Pencarian" required>
                                    <button type="button" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                        {{-- <span class="sr-only">Search</span> --}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-zinc-1000" style="min-width: max-content">
                        <thead class="text-xs text-gray-700 dark:text-gray-100 uppercase bg-zinc-100/50 dark:bg-zinc-700">
                            <tr>
                                <th scope="col" class="p-4">Nomor</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Nomor WA</th>
                                <th scope="col" class="px-6 py-3">Klik</th>
                                <th scope="col" class="px-6 py-3">Submit</th>
                                <th scope="col" class="px-6 py-3">Penjualan</th>
                                <th scope="col" class="px-6 py-3">Bergabung</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($marketings->isEmpty())
                                <tr class="bg-white border-b border-zinc-100 hover:bg-zinc-100/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                    <td colspan="8" class="w-4 p-4 text-center">Tidak ada data</td>
                                </tr>
                            @else
                                @foreach ($marketings as $key => $marketing)
                                    <tr class="bg-white border-b border-zinc-100 hover:bg-zinc-100/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                        <td class="w-4 p-4 text-center"> {{$key+1}} </td>
                                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                            <img class="w-10 h-10 rounded-full" src="{{asset("storage/profile/$marketing->profile_image")}}" >
                                                <div class="ltr:pl-3 rtl:pr-3 ltr:text-left rtl:text-right">
                                                    <div class="text-base font-semibold dark:text-gray-100">{{$marketing->full_name}}</div>
                                                    <div class="font-normal text-zinc-1000 dark:text-zinc-100/80">{{$marketing->email}}</div>
                                                </div>  
                                        </th>
                                        <td class="px-6 py-4 dark:text-zinc-100/80">
                                            <a href={{"https://wa.me?$marketing->wa_number"}} target="_blank" class="btn text-white bg-green-500 border-green-500 hover:bg-green-600 hover:border-green-600 focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-500/30 active:bg-green-600 active:border-green-600 scale-80"><i class="mdi mdi-whatsapp text-16 align-middle "></i></a>
                                            {{$marketing->wa_number}}
                                            
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center dark:text-zinc-100/80">
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 ltr:mr-2 rtl:ml-2"></div> 
                                                {{1110}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center dark:text-zinc-100/80">
                                                <div class="h-2.5 w-2.5 rounded-full bg-sky-500 ltr:mr-2 rtl:ml-2"></div> 
                                                {{11}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center dark:text-zinc-100/80">
                                                <div class="h-2.5 w-2.5 rounded-full bg-violet-500 ltr:mr-2 rtl:ml-2"></div> 
                                                {{1}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center dark:text-zinc-100/80">
                                                {{$marketing->createdLong()}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 dark:text-zinc-100/80">
                                            <button  type="button" class="btn border-0 bg-green-500 p-0 align-middle text-white focus:ring-2 focus:ring-green-500/30 hover:bg-green-600 scale-80"><i class="mdi mdi-account-details bg-white bg-opacity-20 w-10 h-full text-16 py-2 px-3 align-middle rounded-l"></i><span class="px-3 leading-[2.8]">Detail</span></button>

                                            <button  type="button" class="btn border-0 bg-red-500 p-0 align-middle text-white focus:ring-2 focus:ring-red-500/30 hover:bg-red-600 scale-80" ><i class="mdi mdi-block-helper bg-white bg-opacity-20 w-10  h-full text-16 py-2 px-3 align-middle rounded-l "></i><span class="px-3 leading-[2.8]">Suspend</span></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="mt-8 w-full flex justify-center">
                    {{$marketings->links()}}
                </div>
            </div>

        </div>
    </div>
    
</div>