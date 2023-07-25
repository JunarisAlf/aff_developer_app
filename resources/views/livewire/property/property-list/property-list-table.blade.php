<div class="grid grid-cols-12 gap-5">
    <div class="col-span-12">
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body pb-0">
                <h6 class="mb-1 text-15 font-bold text-gray-700 dark:text-gray-100">List Properti</h6>
            </div>
            <div class="card-body">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-zinc-1000" >
                        <thead class="text-xs text-gray-700 dark:text-gray-100 uppercase bg-zinc-100/50 dark:bg-zinc-700">
                            <tr>
                                <th scope="col" class="p-4">Nomor</th>
                                <th scope="col" class="px-6 py-3">Nama Property</th>
                                <th scope="col" class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($properties->isEmpty())
                                <tr class="bg-white border-b border-zinc-100 hover:bg-zinc-100/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                    <td colspan="8" class="w-4 p-4 text-center">Tidak ada data</td>
                                </tr>
                            @else
                                @foreach ($properties as $key => $property)
                                    <tr class="bg-white border-b border-zinc-100 hover:bg-zinc-100/50 dark:bg-zinc-700/50 dark:border-zinc-600">
                                        <td class="w-4 p-4 text-center"> {{$key+1}} </td>
                                        <th scope="row" class="px-6 py-4 dark:text-zinc-100/80">
                                            <div class="text-base font-semibold dark:text-gray-100">{{$property->name}}</div> 
                                        </th>
                                     
                                        <td class="px-6 py-4 dark:text-zinc-100/80  flex flex-row items-center justify-center">
                                            <button  type="button" class="btn border-0 bg-green-500 p-0 align-middle text-white focus:ring-2 focus:ring-green-500/30 hover:bg-green-600 scale-80"><i class="mdi mdi-account-details bg-white bg-opacity-20 w-10 h-full text-16 py-2 px-3 align-middle rounded-l"></i><span class="px-3 leading-[2.8]">Detail</span></button>
                                            <button  type="button" class="btn border-0 bg-red-500 p-0 align-middle text-white focus:ring-2 focus:ring-red-500/30 hov er:bg-red-600 scale-80"><i class="mdi mdi-account-details bg-white bg-opacity-20 w-10 h-full text-16 py-2 px-3 align-middle rounded-l"></i><span class="px-3 leading-[2.8]">Delete</span></button>
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