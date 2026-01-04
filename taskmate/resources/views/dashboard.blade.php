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
        <a href="#" class="hover:underline">Profile</a>
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

        <!-- Edit Tugas -->
        <button
        onclick="openEditModal()"
        class="flex items-center gap-3 text-sm w-full text-left
           px-3 py-2 rounded-lg
           transition-all duration-200 ease-in-out
           hover:bg-white hover:shadow-sm hover:translate-x-1">
            <img src="{{ asset('icons/edit_tugas.svg') }}" class="w-5 h-5">
            Edit Tugas
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
    <main class="flex-1 px-10 py-8">
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
                    <p class="font-semibold text-sm">0</p>
                </div>
                <div class="border rounded-xl px-4 py-3">
                    <p class="text-xs text-gray-500">Belum Selesai</p>
                    <p class="font-semibold text-sm text-orange-500">0</p>
                </div>
                <div class="border rounded-xl px-4 py-3">
                    <p class="text-xs text-gray-500">Selesai</p>
                    <p class="font-semibold text-sm text-green-600">0</p>
                </div>
            </div>

            <!-- Filter & Button -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-2 text-xs">
                    <button class="bg-gray-900 text-white px-3 py-1 rounded-full">Semua</button>
                    <button class="bg-gray-200 px-3 py-1 rounded-full">Aktif</button>
                    <button class="bg-gray-200 px-3 py-1 rounded-full">Selesai</button>
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
            <div class="border rounded-xl py-12 text-center text-gray-400 text-sm">
                Belum ada tugas. Tambahkan tugas pertama Anda!
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center text-xs text-gray-500 mt-10">
            <span class="mx-3">© 2026 TaskMate | TaskMate is a final project system developed for academic purposes. All rights reserved.</span>
        </footer>
    </main>
</div>
    <!-- ================= TASKMODAL ================= -->
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

</script>

</body>
</html>