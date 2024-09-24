<header class="header">
    <div class="container">
        <div class="grid d-flex align-items-center wide">
            <div class="header-logo">
                <a href='http://localhost/mvcphp/client/index'>
                    <img src="http://localhost/mvcphp/app/assets/img/logo.jpg" alt="logo">
                </a>
            </div>
            <nav class="header-navbar">
                <ul class="d-flex justify-content-space-around">
                    <li>
                        <a href='http://localhost/mvcphp/client/index'>
                            <i class="fa-solid fa-house"></i>
                            <span>Trang chủ</span>
                        </a>
                    </li>
                    <li>
                        <a href='http://localhost/mvcphp/client/introduce'>
                            <i class="fa-solid fa-user"></i>
                            <span>Giới thiệu</span>
                        </a>
                    </li>
                    <li>
                        <a href='http://localhost/mvcphp/article/index'>
                            <i class="fa-solid fa-bell"></i>
                            <span>Tin tức</span>
                        </a>
                    </li>
                    <li>
                        <a href='http://localhost/mvcphp/client/service'>
                            <i class="fa-solid fa-heart"></i>
                            <span>Dịch vụ</span>
                        </a>
                    </li>
                    <li>
                        <a href='http://localhost/mvcphp/contact/index'>
                            <i class="fa-solid fa-phone"></i>
                            <span>Liên hệ</span>
                        </a>
                    </li>
                    <li>
                        <a href='http://localhost/mvcphp/client/product'>
                            <i class="fa-brands fa-product-hunt"></i>
                            <span>Sản phẩm</span>
                        </a>
                    </li>
                    <!-- Nút Giỏ Hàng -->
                    <li>
                        <a href='http://localhost/mvcphp/client/cart'>
                            <i class="fa-solid fa-shopping-cart"></i>
                            <span>Giỏ Hàng</span>
                        </a>
                    </li>
                    <li id="user-menu">
                        <?php if (isset($_SESSION['user'])): ?>
                            <a href="#" id="user-name"><?php echo $_SESSION['user']->name; ?></a>
                            <ul id="dropdown">
                                <li><a href="http://localhost/mvcphp/user/settings">Cài đặt tài khoản</a></li>
                                <li><a href="http://localhost/mvcphp/user/logout">Đăng xuất</a></li>
                            </ul>
                        <?php else: ?>
                            <a href='http://localhost/mvcphp/user/login'>
                                <span>Đăng Nhập</span>
                            </a>
                        <?php endif; ?>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </div>
</header>