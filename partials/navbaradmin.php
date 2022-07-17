<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="kasir.php"><font face="caveat" class="fs-4">Toko.Kampus</font> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if ($page == "kasir") echo "active"; ?>">
                    <a class="nav-link" href="kasir.php">Cashier</a>
                </li>
                <li class="nav-item <?php if ($page == "databarang") echo "active"; ?>">
                    <a class="nav-link" href="databarang.php">Products</a>
                </li>
                <li class="nav-item <?php if ($page == "tambahbarang") echo "active"; ?>">
                    <a class="nav-link" href="tambahbarang.php">Add Products</a>
                </li>
                <li class="nav-item <?php if ($page == "online") echo "active"; ?>">
                    <a class="nav-link" href="onlinecust.php">Online Customer</a>
                </li>
                <li class="nav-item <?php if ($page == "offline") echo "active"; ?>">
                    <a class="nav-link" href="offlinecust.php">Offline Customer</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="index.php" class="btn btn-outline-light my-2 my-sm-0">Log Out</a>
            </form>
        </div>
    </div>
</nav>