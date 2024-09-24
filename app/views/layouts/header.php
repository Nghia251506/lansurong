<div class="sidebar">
    <div class="header-sidebar">
        <div class="dashboard"><a href="http://localhost/mvcphp/admin/index" class="link-dashboard">
                <h2 class="title">Admin Dashboard</h2>
            </a></div>
        <div>
            <div class="user-info">
                <div class="dropdown">
                    <?php if (isset($_SESSION["user"])): ?>
                        <span class="username">Welcome, <?php echo $_SESSION["user"]->name; ?></span>
                    <?php endif; ?>
                    <div class="dropdown-menu">
                        <a href="http://localhost/mvcphp/user/settings">Cài đặt tài khoản</a></br>
                        <a href="http://localhost/mvcphp/user/logout">Đăng xuất</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <ul class="sidebar-list">
        <ul class="category">
            <i class="fa-solid fa-list"></i>
            SHOW
            <div class="category-list">
                <li><a href="http://localhost/mvcphp/show/list">Danh sách lịch diễn</a></li>
                <li><a href="http://localhost/mvcphp/show/add">Thêm lịch diễn</a></li>
            </div>
        </ul>
        <ul class="category">
            <i class="fa-solid fa-list"></i>
            SẢN PHẨM
            <div class="category-list">
                <li><a href="http://localhost/mvcphp/product/add">Thêm sản phẩm</a></li>
                <li><a href="http://localhost/mvcphp/product/list">Danh sách sản phẩm</a></li>
            </div>
        </ul>
        <ul class="category">
            <i class="fa-solid fa-list"></i>
            HỌC VIÊN
            <div class="category-list">
                <li><a href="employees.php">Thêm Học viên</a></li>
                <li><a href="employees.php">Danh sách Học viên</a></li>
            </div>
        </ul>
        <ul class="category">
            <i class="fa-solid fa-list"></i>
            BÀI VIẾT
            <div class="category-list">
                <li><a href="add_article.php">Thêm Bài viết</a></li>
                <li><a href="articles.php">Danh sách Bài viết</a></li>
            </div>
        </ul>
        <li><a href="customers.php"><i class="fa-solid fa-user"></i> Danh sách Khách hàng</a></li>
        <li><a href="employees.php"><i class="fa-solid fa-users"></i> Danh sách Nhân viên</a></li>

    </ul>
</div>