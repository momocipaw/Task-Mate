<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #f3f2ef; }
    </style>
</head>
<body class="font-sans text-gray-800">

<!-- Top Navbar -->
<header class="w-full bg-white border-b px-6 py-3 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <span class="w-4 h-4 bg-orange-500 rounded-full"></span>
        <span class="font-semibold text-lg">TaskMate</span>
    </div>
    <div class="text-sm flex gap-4">
        <a href="{{ route('profile') }}" class="hover:underline">Profile</a>
        <a href="#" class="hover:underline">Logout</a>
    </div>
</header>

<div class="flex">
    <!-- Sidebar -->
<aside class="w-64 bg-[#e9e9e9] min-h-[calc(100vh-56px)] px-6 py-8">
    <nav class="space-y-5 text-sm">

        <!-- Tambah Tugas -->
        <button
        onclick="openModal()"
        class="flex items-center gap-3 text-sm w-full text-left
           px-3 py-2 rounded-lg
           transition-all duration-200 ease-in-out
           hover:bg-white hover:shadow-sm hover:translate-x-1">
    <img src="{{ asset('icons/tambah_tugas.svg') }}" class="w-5 h-5">
    Tambah Tugas
</button>

        <!-- Trash -->
       <button
 onclick="openTrashModal()"
 class="flex items-center gap-3 text-sm w-full text-left
        px-3 py-2 rounded-lg
        transition-all duration-200
        hover:bg-white hover:shadow-sm hover:translate-x-1">
    <img src="{{ asset('icons/trash.svg') }}" class="w-5 h-5">
    Trash
</button>

    </nav>
</aside>


    <!-- Main Content -->
    <main class="flex-1 px-10 py-8 min-h-[calc(100vh-56px)] flex flex-col">
        <h1 class="text-2xl font-bold mb-6">Selamat Datang di TaskMate</h1>

        <!-- Top Cards -->
        <div class="flex gap-8 mb-10">
            <!-- Date Card -->
            <div class="bg-white w-[160px] h-[160px] rounded-[35px] shadow 
            flex flex-col justify-center items-center">
                @php
    use Carbon\Carbon;
    $now = Carbon::now();
@endphp

<p class="text-gray-500 text-[25px] tracking-wide">
    {{ $now->translatedFormat('D M') }}
</p>
<p class="text-8xl font-bold">
    {{ $now->format('d') }}
</p>

            </div>

            @php
$upcomingTasks = [
    [
        'date_label' => 'Today December 5',
        'title' => 'Prak. PBW',
        'has_task' => true,
    ],
    [
        'date_label' => 'Monday December 8',
        'title' => null,
        'has_task' => false,
    ],
    [
        'date_label' => 'Tuesday December 9',
        'title' => null,
        'has_task' => false,
    ],
];
@endphp

            <!-- Upcoming Task Card -->
            <div class="bg-white flex-1 rounded-3xl shadow px-6 py-5">
                <div class="flex items-center gap-2 font-semibold mb-4">
                 <img src="{{ asset('icons/tugas_mendatang.svg') }}" class="w-4 h-4">
                    <span>Tugas Mendatang</span></div>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between items-center">
                        <span>Today December 5</span>
                        <span class="flex items-center gap-2"><span class="w-1 h-4 bg-orange-500 rounded"></span>Prak. PBW</span>
                    </div>
                    <div class="flex justify-between items-center text-gray-400">
                        <span>Monday December 8</span>
                        <span class="flex items-center gap-2"><span class="w-1 h-4 bg-gray-300 rounded"></span>Tidak Ada Tugas</span>
                    </div>
                    <div class="flex justify-between items-center text-gray-400">
                        <span>Tuesday December 9</span>
                        <span class="flex items-center gap-2"><span class="w-1 h-4 bg-gray-300 rounded"></span>Tidak Ada Tugas</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="bg-white rounded-3xl shadow px-8 py-6 mb-6">
            <div class="grid grid-cols-3 gap-6 mb-4">
                <div class="border rounded-xl px-4 py-3">
                    <p class="text-xs text-gray-500">Total Tugas</p>
                    <p class="font-semibold text-sm">1</p>
                </div>
                <div class="border rounded-xl px-4 py-3">
                    <p class="text-xs text-gray-500">Belum Selesai</p>
                    <p class="font-semibold text-sm text-orange-500">1</p>
                </div>
                <div class="border rounded-xl px-4 py-3">
                    <p class="text-xs text-gray-500">Selesai</p>
                    <p class="font-semibold text-sm text-green-600">0</p>
                </div>
            </div>

            <!-- Filter & Button -->
            <div class="flex justify-between items-center mb-6">
                <div id="filterTabs"
     class="relative flex items-center bg-gray-200 rounded-full p-1 text-xs w-fit">

    <!-- Indicator -->
    <span id="tabIndicator"
          class="absolute top-1 left-1 h-[28px] w-[64px]
                 bg-gray-900 rounded-full
                 transition-all duration-300 ease-in-out">
    </span>

    <button data-tab="all"
        class="filter-btn relative z-10 px-4 py-1 rounded-full
               text-white transition">
        Semua
    </button>

    <button data-tab="active"
        class="filter-btn relative z-10 px-4 py-1 rounded-full
               text-gray-600 hover:text-gray-900 transition">
        Aktif
    </button>

    <button data-tab="done"
        class="filter-btn relative z-10 px-4 py-1 rounded-full
               text-gray-600 hover:text-gray-900 transition">
        Selesai
    </button>
</div>
                <button
        onclick="openModal()"
         class="flex items-center gap-2
           bg-gray-900 text-white
           px-4 py-2 rounded-lg text-xs font-medium
           transition-all duration-200 ease-in-out
           hover:bg-white hover:text-gray-900
           hover:shadow-sm hover:-translate-y-[1px]">

    <img src="{{ asset('icons/tambah_tugas.svg') }}"
         class="w-4 h-4 invert">

    <span>Tambah Tugas</span>
</button>
            </div>

            <!-- Empty State -->
            <div class="border rounded-2xl overflow-hidden">

    <!-- TABLE HEADER -->
    <div class="grid grid-cols-5 bg-gray-100 text-xs text-gray-500 px-6 py-3">
        <span>Judul</span>
        <span>Deskripsi</span>
        <span>Tenggat</span>
        <span>Status</span>
        <span class="text-right">Aksi</span>
    </div>

    <!-- TABLE BODY -->
    <div class="divide-y">

        <!-- DUMMY ROW -->
        <div class="grid grid-cols-5 items-center px-6 py-4 text-sm hover:bg-gray-50 transition">
            <span class="font-medium">Prak. PBW</span>

            <span class="text-gray-500 truncate">
                Mengerjakan CRUD Laravel
            </span>

            <span class="text-gray-500">
                15 Jan 2026
            </span>

            <span>
                <span class="text-xs px-3 py-1 rounded-full bg-orange-100 text-orange-600">
                    Aktif
                </span>
            </span>

            <div class="flex justify-end gap-3">
                <button
                    onclick="openEditModal(1,'Prak. PBW','Mengerjakan CRUD Laravel','2026-01-15')"
                    class="text-xs px-3 py-1 rounded-lg border hover:bg-black hover:text-white transition">
                    Edit
                </button>

                <button
                    class="text-xs px-3 py-1 rounded-lg border border-red-500 text-red-500
                           hover:bg-red-500 hover:text-white transition">
                    Hapus
                </button>
            </div>
        </div>

    </div>
</div>


        <!-- Footer -->
        <footer class="text-center text-xs text-gray-500 mt-10">
            <span class="mx-3">© 2026 TaskMate | TaskMate is a final project system developed for academic purposes. All rights reserved.</span>
        </footer>
    </main>
</div>
    <!-- ================= TASK MODAL ================= -->
<div id="taskModal"
     class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center">

    <div class="bg-white w-[900px] h-[500px] rounded-3xl flex p-12 gap-16 relative">

        <!-- CLOSE -->
        <button onclick="closeModal()"
                class="absolute top-6 right-6 text-xl text-gray-400 hover:text-black">
            ✕
        </button>

        <!-- LEFT -->
        <div class="flex-1">
            <h2 class="text-4xl font-bold mb-4">Tambah Tugas</h2>
            <p class="text-gray-500">Masukkan detail tugas baru Anda.</p>
        </div>

        <!-- RIGHT -->
        <div class="flex-1">
            <form action="{{ route('tasks.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="text-sm">Judul Tugas</label>
                    <input type="text" name="title"
                        class="w-full border rounded-lg px-4 py-2">
                </div>

                <div>
                    <label class="text-sm">Deskripsi Tugas</label>
                    <input type="text" name="description"
                        class="w-full border rounded-lg px-4 py-2">
                </div>

                <div>
                    <label class="text-sm">Tenggat</label>
                    <input type="date" name="due_date"
                        class="w-full border rounded-lg px-4 py-2">
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="button"
                        onclick="closeModal()"
                        class="border w-1/2 py-2 rounded-xl">
                        Kembali
                    </button>

                    <button type="submit"
                        class="bg-black text-white w-1/2 py-2 rounded-xl">
                        Tambahkan Tugas
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- ================= EDIT MODAL ================= -->
<div id="editTaskModal"
     class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center">

    <div class="bg-white w-[900px] h-[500px] rounded-3xl flex p-12 gap-16 relative">

        <button onclick="closeEditModal()"
            class="absolute top-6 right-6 text-xl text-gray-400 hover:text-black">
            ✕
        </button>

        <!-- LEFT -->
        <div class="flex-1">
            <h2 class="text-4xl font-bold mb-4">Edit Tugas</h2>
            <p class="text-gray-500">Perbarui detail tugas Anda.</p>
        </div>

        <!-- RIGHT -->
        <div class="flex-1">
            <form id="editForm" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="text-sm">Judul Tugas</label>
                    <input type="text" id="editTitle" name="title"
                        class="w-full border rounded-lg px-4 py-2">
                </div>

                <div>
                    <label class="text-sm">Deskripsi</label>
                    <input type="text" id="editDescription" name="description"
                        class="w-full border rounded-lg px-4 py-2">
                </div>

                <div>
                    <label class="text-sm">Tenggat</label>
                    <input type="date" id="editDueDate" name="due_date"
                        class="w-full border rounded-lg px-4 py-2">
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="button"
                        onclick="closeEditModal()"
                        class="border w-1/2 py-2 rounded-xl">
                        Batal
                    </button>

                    <button type="submit"
                        class="bg-black text-white w-1/2 py-2 rounded-xl">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- ================= TRASH MODAL ================= -->
<div id="trashModal"
     class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center">

    <div class="bg-white w-[900px] h-[520px] rounded-3xl p-10 relative">

        <!-- CLOSE -->
        <button onclick="closeTrashModal()"
            class="absolute top-6 right-6 text-xl text-gray-400 hover:text-black">
            ✕
        </button>

        <!-- HEADER -->
        <div class="mb-6">
            <h2 class="text-4xl font-bold mb-2">Trash</h2>
            <p class="text-gray-500">
                Riwayat tugas yang telah dihapus. Anda dapat memulihkan atau menghapus permanen.
            </p>
        </div>

        <!-- TABLE HEADER -->
        <div class="grid grid-cols-4 text-sm text-gray-500 border-b pb-3 mb-3">
            <span>Judul</span>
            <span>Deskripsi</span>
            <span>Dihapus Pada</span>
            <span class="text-right">Aksi</span>
        </div>

        <!-- TRASH LIST (DUMMY UI) -->
        <div class="space-y-3 max-h-[280px] overflow-y-auto pr-2">

            <!-- ITEM -->
            <div class="grid grid-cols-4 items-center text-sm bg-gray-50 rounded-xl px-4 py-3">
                <span class="font-medium">Prak. PBW</span>
                <span class="text-gray-500 truncate">Mengerjakan CRUD Laravel</span>
                <span class="text-gray-400">12 Jan 2026</span>

                <div class="flex justify-end gap-3">
                    <button
                        class="px-3 py-1 text-xs rounded-lg border hover:bg-black hover:text-white transition">
                        Restore
                    </button>

                    <button
                        class="px-3 py-1 text-xs rounded-lg border border-red-500
                               text-red-500 hover:bg-red-500 hover:text-white transition">
                        Delete
                    </button>
                </div>
            </div>

            <!-- EMPTY STATE (nanti pakai kondisi) -->
            <!--
            <div class="text-center text-gray-400 py-16 text-sm">
                Trash masih kosong.
            </div>
            -->

        </div>

        <!-- FOOTER -->
        <div class="flex justify-between items-center mt-6">
            <span class="text-xs text-gray-400">
                Item di Trash akan terhapus otomatis setelah 30 hari.
            </span>

            <button
                class="text-xs px-4 py-2 rounded-lg border hover:bg-gray-900 hover:text-white transition">
                Hapus Semua
            </button>
        </div>

    </div>
</div>

<!-- ================= JS ================= -->
<script>
    //TAMBAH TUGAS
    const modal = document.getElementById('taskModal');

    function openModal() {
        modal.classList.remove('hidden');
    }

    function closeModal() {
        modal.classList.add('hidden');
    }

    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            closeModal();
        }
    });
//EDIT TUGAS
    function openEditModal(id, title, description, dueDate) {
        const modal = document.getElementById('editTaskModal');

        document.getElementById('editTitle').value = title;
        document.getElementById('editDescription').value = description;
        document.getElementById('editDueDate').value = dueDate;

        document.getElementById('editForm').action = `/tasks/${id}`;

        modal.classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editTaskModal').classList.add('hidden');
    }
//TRASH
    function openTrashModal() {
        document.getElementById('trashModal').classList.remove('hidden');
    }

    function closeTrashModal() {
        document.getElementById('trashModal').classList.add('hidden');
    }

    const buttons = document.querySelectorAll('.filter-btn');
    const indicator = document.getElementById('tabIndicator');

    buttons.forEach((btn) => {
        btn.addEventListener('click', () => {
            // Reset warna
            buttons.forEach(b => {
                b.classList.remove('text-white');
                b.classList.add('text-gray-600');
            });

            // Aktifkan button
            btn.classList.remove('text-gray-600');
            btn.classList.add('text-white');

            // Geser indicator
            indicator.style.width = btn.offsetWidth + 'px';
            indicator.style.transform =
                `translateX(${btn.offsetLeft - 4}px)`;
        });
    });
</script>

</body>
</html>