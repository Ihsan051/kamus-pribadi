<!-- Header -->
<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#">Kamus Pribadi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <div>
                        <img src="https://via.placeholder.com/40" alt="Foto Profil" class="profile-pic">
                    </div>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="beranda.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profil</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                      <!-- Foto Profil -->
                    <form action="pencarian_kata.php" method="GET" class="d-flex ">
                    <input type="text" class="form-control me-2" name="query" placeholder="Cari kata..." required>
                    <button type="submit" class="btn btn-outline-light">Cari</button>
                </form>
                </div>
            </div>
        </nav>
    </header>