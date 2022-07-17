<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <font face="caveat" class="fs-4">Toko.Kampus</font>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item  <?php if ($page == "home") echo "active"; ?>">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item <?php if ($page == "order") echo "active"; ?>">
                    <a class="nav-link" href="order.php">Order</a>
                </li>
                <li class="nav-item <?php if ($page == "cart") echo "active"; ?>">
                    <a class="nav-link" href="cart.php">Cart</a>
                    <input type="hidden" id="kuantitas" name="kuantitas">
                </li>
                <div class="d-flex align-items-center">
                    <p class="badge badge-primary text-wrap" style="text-align:justify;"><?= $jumlah_barang['total']; ?></p>
                </div>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="login.php" class="btn btn-outline-light my-2 my-sm-0">Login</a>
            </form>
        </div>
    </div>
</nav>