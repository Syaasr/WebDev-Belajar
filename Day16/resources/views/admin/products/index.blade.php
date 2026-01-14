<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                    + Tambah Produk
                </a>

                <table class="table-auto w-full border mt-4 text-sm">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Gambar</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Deskripsi</th>
                            <th class="px-4 py-2">Stok</th>
                            <th class="px-4 py-2">Harga</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="border-b text-center bg-gray-50">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">
                                <img src="{{ $product->image }}" class="w-16 h-16 object-cover mx-auto rounded">
                            </td>
                            <td class="px-4 py-2 font-bold">{{ $product->name }}</td>
                            <td class="px-4 py-2 text-gray-500">{{ Str::limit($product->description, 30) }}</td>
                            <td class="px-4 py-2">{{ $product->stock }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($product->price) }}</td>
                            <td class="px-4 py-2 space-y-1">
                                <a href="#" class="bg-yellow-400 text-white px-3 py-1 rounded block">Edit</a>
                                <a href="#" class="bg-red-500 text-white px-3 py-1 rounded block">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>