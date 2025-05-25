<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css" />
    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('/assets/css/theme.css') }}" />

    <title>INVENTARIS BARANG</title>
</head>

<body class="bg-surface">
    <main>
        <div
            class="app-topstrip z-40 sticky top-0 py-[15px] px-6 bg-[linear-gradient(90deg,_#0f0533_0%,_#1b0a5c_100%)]">
            <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
                <div class="md:flex hidden items-center gap-5">
                    <div class="xl:flex items-center gap-4 pl-5 border-l border-opacity-20 border-white hidden">
                        <a href="https://www.wrappixel.com/templates/category/tailwind-dashboard/" target="_blank"
                            class="flex items-center gap-2 text-white bg-transparent hover:text-[#714bff]">
                            <iconify-icon class="text-xl" icon="solar:window-frame-linear"></iconify-icon>
                            STOK BARANG INVENTARIS
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--start the project-->
        <div id="main-wrapper" class="flex p-5 xl:pr-0">
            <aside id="application-sidebar-brand"
                class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-[90px] xl:left-auto top-0 left-0 with-vertical h-screen z-[99] shrink-0 w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar transition-all duration-300">
                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                <div class="p-4">
                </div>
                <div class="scroll-sidebar" data-simplebar="">
                    <nav class="w-full flex flex-col sidebar-nav px-4 mt-5">
                        <ul id="sidebarnav" class="text-gray-600 text-sm">
                            <li class="text-xs font-bold pb-[5px]">
                                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                                <span class="text-xs text-gray-400 font-semibold">HOME</span>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                    href="/">
                                    <i class="ti ti-notes ps-2 text-2xl"></i>
                                    <span>Master Data Stok</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                    href="#">
                                    <i class="ti ti-basket ps-2 text-2xl"></i>
                                    <span>Master Data Barang</span>
                                </a>
                            </li>

                            <!-- </aside> -->
            </aside>
            <div class="w-full page-wrapper xl:px-6 px-0">
                <!-- Main Content -->
                <main class="h-full max-w-full">
                    <div class="container full-container p-0 flex flex-col gap-6">

                        <div class="grid grid-cols-1 lg:grid-cols-5 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
                            <div class="col-span-2">
                                @if (session('success'))
                                    <div class="bg-teal-400 border text-sm text-teal-500 rounded-sm p-4 mb-3"
                                        role="alert" id="success-alert">
                                        <span class="font-bold">Success</span>
                                        {{ session('success') }}
                                    </div>
                                    <script>
                                        // Hilangkan alert setelah 3 detik (3000ms)
                                        setTimeout(function() {
                                            const alert = document.getElementById('success-alert');
                                            if (alert) {
                                                alert.style.opacity = '0';
                                                setTimeout(() => alert.style.display = 'none', 500); // hilang setelah efek fade out
                                            }
                                        }, 3000);
                                    </script>
                                @endif
                                <div class="card h-full">
                                    <div class="card-body">
                                        <div class="flex justify-between items-center mb-5">
                                            <h4 class="text-gray-500 text-xl font-bold">Data Stok Barang</h4>
                                            <a href={{ route('barang.create') }} type="button"
                                                class="py-2 px-6 btn rounded-md text-base font-bold border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                                Tambah Barang
                                            </a>
                                        </div>

                                        <div class="relative overflow-x-auto">
                                            <table class="text-left w-full whitespace-nowrap text-sm text-gray-500">
                                                <thead>
                                                    <tr class="text-sm">
                                                        <th class="p-4 font-semibold">No</th>
                                                        <th class="p-4 font-semibold">Nama</th>
                                                        <th class="p-4 font-semibold">Kode</th>
                                                        <th class="p-4 font-semibold">Harga</th>
                                                        <th class="p-4 font-semibold">Qty</th>
                                                        <th class="p-4 font-semibold">Deskripsi</th>
                                                        <th class="p-4 font-semibold">Foto</th>
                                                        <th class="p-4 font-semibold">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($barang as $index => $item)
                                                        <tr>
                                                            <td class="p-4 text-sm">{{ $index + 1 }}</td>
                                                            <td class="p-4 font-medium">{{ $item->namaBarang }}</td>
                                                            <td class="p-4 font-medium text-red-500">
                                                                {{ $item->kodeBarang }}</td>
                                                            <td class="p-4 font-medium">
                                                                Rp{{ number_format($item->satuanBarang, 0, ',', '.') }}
                                                            </td>
                                                            <td class="p-4 font-medium">{{ $item->jumlahBarang }}</td>
                                                            <td class="p-4 font-medium">{{ $item->deskBarang }}</td>
                                                            <td class="p-4 font-medium">
                                                                <img src="{{ asset('storage/' . $item->fotoBarang) }}"
                                                                    alt="Foto Barang" width="50">
                                                            </td>
                                                            <td class="p-4">
                                                                <div class="flex gap-2">
                                                                    <!-- Icon Edit -->
                                                                    <a href="{{ route('barang.edit', $item->id) }}"
                                                                        type="button" title="Edit">
                                                                        <i class="ti ti-pencil text-xl text-yellow-500"></i>
                                                                    </a>
                                                                    <!-- Icon Delete -->
                                                                    <a href="{{ route('barang.hapus', $item->id) }}" type="button" class="" title="Hapus">
                                                                        <i class="ti ti-trash text-xl text-red-500"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="8" class="p-4 text-center text-gray-400">
                                                                Tidak ada data barang.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    </main>
    <!-- Main Content End -->
    </div>
    </div>
    <!--end of project-->
    </main>

    <script src="{{ asset('/assets/libs/jquery/dist/jquery.min.js') }} "></script>
    <script src="{{ asset('/assets/libs/simplebar/dist/simplebar.min.js ') }}"></script>
    <script src="{{ asset('/assets/libs/iconify-icon/dist/iconify-icon.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/@preline/dropdown/index.js') }}"></script>
    <script src="{{ asset('/assets/libs/@preline/overlay/index.js') }}"></script>
    <script src="{{ asset('/assets/js/sidebarmenu.js') }}"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('/assets/libs/preline/dist/preline.js') }}"></script>
    <script src="{{ asset('/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/assets/js/dashboard.js') }}"></script>



    {{-- Modal Create Data  --}}
    {{-- <div id="modal-tambah-barang"
        class="hs-overlay hidden fixed inset-0 z-[99999] overflow-y-auto overflow-x-hidden items-center justify-center bg-black/50 backdrop-blur-sm"
        tabindex="-1">
        <div class="relative w-full max-w-lg bg-white rounded-lg shadow-lg p-6">
            <!-- Close button -->
            <button type="button" class="absolute top-3 end-3 text-gray-500 hover:text-gray-700"
                data-hs-overlay="#modal-tambah-barang">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>

            <!-- Modal Content -->
            <h2 class="text-xl font-bold mb-4">Tambah Data Barang</h2>

            <form action="{{ route('barang.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm mb-2">Nama Barang</label>
                    <input type="text" name="nama"
                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm mb-2">Deskripsi</label>
                    <textarea name="deskripsi" maxlength="225"
                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm mb-2">Harga</label>
                    <input type="number" name="satuan"
                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm mb-2">Jumlah</label>
                    <input type="number" name="jumlah"
                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" class="px-4 py-2 rounded-md text-gray-600 border border-gray-300"
                        data-hs-overlay="#modal-tambah-barang">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div> --}}
</body>

</html>
