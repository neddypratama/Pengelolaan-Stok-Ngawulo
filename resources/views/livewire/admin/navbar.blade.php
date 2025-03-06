<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Tanggal & Waktu Realtime -->
    <div class="navbar-text font-weight-bold ml-3 d-flex flex-wrap align-items-center" id="currentDateTime">
        <span id="tanggal" class="mr-2"></span>
        <span id="clock"></span> WIB
    </div>

    <style>
        #currentDateTime {
            font-size: 14px;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            #currentDateTime {
                font-size: 12px;
                flex-direction: column;
                text-align: left;
            }
        }
    </style>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - Informasi Pengguna -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-4 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('template/img/undraw_profile.svg') }}">
            </a>
            <!-- Dropdown - Informasi Pengguna -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Keluar
                    </button>
                </form>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

<script>
    function updateClock() {
        let now = new Date();
        let hours = now.getHours().toString().padStart(2, '0');
        let minutes = now.getMinutes().toString().padStart(2, '0');
        let seconds = now.getSeconds().toString().padStart(2, '0');
        document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
    }

    function updateDateTime() {
        let hariIndo = {
            "Sunday": "Minggu",
            "Monday": "Senin",
            "Tuesday": "Selasa",
            "Wednesday": "Rabu",
            "Thursday": "Kamis",
            "Friday": "Jumat",
            "Saturday": "Sabtu"
        };
        let bulanIndo = {
            "January": "Januari",
            "February": "Februari",
            "March": "Maret",
            "April": "April",
            "May": "Mei",
            "June": "Juni",
            "July": "Juli",
            "August": "Agustus",
            "September": "September",
            "October": "Oktober",
            "November": "November",
            "December": "Desember"
        };

        let now = new Date();
        let hari = hariIndo[now.toLocaleDateString('en-US', {
            weekday: 'long'
        })];
        let bulan = bulanIndo[now.toLocaleDateString('en-US', {
            month: 'long'
        })];
        let tanggal = now.getDate().toString().padStart(2, '0');
        let tahun = now.getFullYear();

        document.getElementById('tanggal').textContent = `${hari}, ${tanggal} ${bulan} ${tahun}`;
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateDateTime(); // Tampilkan tanggal & hari saat pertama kali halaman dimuat
        updateClock(); // Tampilkan jam pertama kali
        setInterval(updateClock, 1000); // Update jam setiap detik
    });

    document.addEventListener("livewire:navigated", function() {
        updateDateTime(); // Perbarui tanggal setelah navigasi dengan Livewire
    });
</script>
