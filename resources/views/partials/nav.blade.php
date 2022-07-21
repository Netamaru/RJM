<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="nav-link text-white" href="/dashboard"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="/dashboard" class="nav-link text-white" style="text-align: center"><i
                            class="bi bi-house-door-fill"></i><br>Dashboard</a></li>
                </li>

                <li class="nav-item"><a href="/dashboard/kriteria" class="nav-link text-white"
                        style="text-align: center"><i class="bi bi-grid-3x3-gap-fill"></i><br>Kriteria</a></li>
                </li>

                <li class="nav-item"><a href="/dashboard/perhitungan" class="nav-link text-white"
                        style="text-align: center"><i class="bi bi-grid-3x3-gap-fill"></i><br>Perhitungan</a></li>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                        style="text-align: center" data-bs-toggle="dropdown" aria-expanded="false"><i
                            class="bi bi-grid-3x3-gap-fill"></i>
                        <br> Data Kayu
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/dashboard/input-kayu">Input Kayu</a></li>
                        <li><a class="dropdown-item" href="/dashboard/input-bobot">Input Bobot</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a href="/dashboard/laporan" class="nav-link text-white"
                        style="text-align: center"><i class="bi bi-grid-3x3-gap-fill"></i><br>Laporan</a></li>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="/dashboard/laporan"></a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form action="/logout" method="GET">
                        @csrf
                        <button type="submit" href="/logout" class="nav-link text-white btn"
                            style="text-align: center"><i class="bi bi-grid-3x3-gap-fill"></i><br>logout</button>
                    </form>
                </li>
                </li>
            </ul>
        </div>
    </div>
</nav>
