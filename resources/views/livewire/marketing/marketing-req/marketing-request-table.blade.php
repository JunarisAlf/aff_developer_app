<div class="grid grid-cols-12 gap-5">
    <div class="col-span-12">
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500" style="min-width: max-content">
                        <thead class="text-xs text-gray-700 dark:text-gray-100 uppercase bg-gray-50/50 dark:bg-zinc-700">
                            <tr>
                                <th scope="col" class="p-4">Nomor</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Nomor WA</th>
                                <th scope="col" class="px-6 py-3">Diminta</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($marketings->isEmpty())
                                <tr class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                    <td colspan="5" class="w-4 p-4 text-center">Tidak ada data</td>
                                </tr>
                            @else
                                @foreach ($marketings as $key => $marketing)
                                    <tr class="bg-white border-b border-gray-50 hover:bg-gray-50/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                        <td class="w-4 p-4 text-center"> {{$key+1}} </td>
                                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                            <div class="flex item-center">
                                                <img class="w-10 h-10 rounded-full" src="{{asset("storage/profile/$marketing->profile_image")}}" >
                                                <div class="ltr:pl-3 rtl:pr-3 ltr:text-left rtl:text-right">
                                                    <div class="text-base font-semibold dark:text-gray-100">
                                                        {{$marketing->full_name}}</div>
                                                    <div class="font-normal text-gray-500 dark:text-zinc-100/80">
                                                        {{$marketing->email}}
                                                    </div>
                                                </div>
                                            </div>
                                             
                                        </th>
                                        <td class="px-6 py-4 dark:text-zinc-100/80">
                                            <a href={{"https://wa.me?$marketing->wa_number"}} target="_blank" class="btn text-white bg-green-500 border-green-500 hover:bg-green-600 hover:border-green-600 focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-500/30 active:bg-green-600 active:border-green-600 scale-80"><i class="mdi mdi-whatsapp text-16 align-middle "></i></a>
                                            {{$marketing->wa_number}}
                                            
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center dark:text-zinc-100/80">
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 ltr:mr-2 rtl:ml-2"></div> 
                                                {{$marketing->createdLong()}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 dark:text-zinc-100/80">
                                            <button wire:click="accept({{$marketing->id}})" type="button" class="btn border-0 bg-green-500 p-0 align-middle text-white focus:ring-2 focus:ring-green-500/30 hover:bg-green-600 scale-80"><i class="bx bx-check-square bg-white bg-opacity-20 w-10 h-full text-16 py-3 align-middle rounded-l"></i><span class="px-3 leading-[2.8]">Terima</span></button>

                                            <button wire:click="reject({{$marketing->id}})" type="button" class="btn border-0 bg-red-500 p-0 align-middle text-white focus:ring-2 focus:ring-red-500/30 hover:bg-red-600 scale-80" ><i class="bx bx-x bg-white bg-opacity-20 w-10  h-full  text-16 py-3 align-middle rounded-l "></i><span class="px-3 leading-[2.8]">Tolak</span></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    
</div>