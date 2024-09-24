CREATE DATABASE lansurong;

USE lansurong;

-- Bảng sản phẩm
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng đơn hàng
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
drop table orders;


-- Bảng thống kê doanh thu
CREATE TABLE revenue_statistics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    total_revenue DECIMAL(15, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng người dùng (user): quản lý khách hàng và nhân viên
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'employee', 'customer') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

drop table shows;

-- Bảng show diễn (shows): quản lý và tạo show diễn
CREATE TABLE shows (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    date DATE NOT NULL,
    location VARCHAR(255) NOT NULL,
    customer_name VARCHAR(255) NOT NULL,
    customer_phone VARCHAR(255) NOT NULL,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

-- Bảng khách hàng: quản lý và thêm khách hàng
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,           -- Tên khách hàng
    email VARCHAR(255) UNIQUE NOT NULL,   -- Email khách hàng (duy nhất)
    phone VARCHAR(20),                    -- Số điện thoại khách hàng
    address VARCHAR(255),                 -- Địa chỉ khách hàng
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Ngày tạo tài khoản
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  -- Ngày cập nhật thông tin
);
-- Bảng hoá đơn show (invoices_show): quản lý và tạo hoá đơn
CREATE TABLE invoices_show (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,                  -- ID khách hàng
    show_id INT,                      -- ID show diễn
    total_amount DECIMAL(10, 2),      -- Tổng số tiền hoá đơn
    payment_status VARCHAR(50),       -- Trạng thái thanh toán (VD: 'Chưa thanh toán', 'Đã thanh toán')
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Thời gian tạo hoá đơn
    paid_at TIMESTAMP NULL,           -- Thời gian thanh toán (nếu đã thanh toán)
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (show_id) REFERENCES shows(id)
);


-- Bảng hóa đơn (invoices): quản lý và tạo hóa đơn
CREATE TABLE invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    total DECIMAL(10, 2) NOT NULL,
    status ENUM('paid', 'unpaid', 'cancelled') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(id)
);

-- Bảng chi tiết hóa đơn (invoice_items): chi tiết các sản phẩm trong hóa đơn
CREATE TABLE invoice_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (invoice_id) REFERENCES invoices(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

drop table invoice_items;

-- Bảng học viên (students): quản lý và thêm học viên
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    enrolled_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng sản phẩm (products): quản lý và thêm sản phẩm
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255),
	quantity INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    quantity INT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Bảng bài viết (articles): quản lý và tạo bài viết
CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    image_url VARCHAR(255),
    video_url VARCHAR(255),
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

-- update table

-- Cập nhật bảng shows để thêm giá tiền và hạng mục diễn
ALTER TABLE shows
ADD COLUMN price DECIMAL(10, 2) NOT NULL AFTER location,
ADD COLUMN category VARCHAR(100) NOT NULL AFTER price;

-- Cập nhật bảng invoice_items để hỗ trợ hóa đơn sản phẩm và show diễn
ALTER TABLE invoice_items
ADD COLUMN item_type ENUM('product', 'show') NOT NULL AFTER id;

-- Cập nhật khóa ngoại trong invoice_items để hỗ trợ cả sản phẩm và show diễn
ALTER TABLE invoice_items
ADD CONSTRAINT fk_invoice_item_product_show
FOREIGN KEY (product_id) REFERENCES products(id),
ADD CONSTRAINT fk_invoice_item_show
FOREIGN KEY (product_id) REFERENCES shows(id);
alter table products
add column image_url VARCHAR(255);
ALTER TABLE invoices
MODIFY COLUMN total DECIMAL(18, 0) NOT NULL;

-- thêm tạm dữ liệu
use lansurong;
insert into users(`id`, `name`, `email`, `password`, `role`) values (1, 'Nguyễn Trọng Nghĩa', 'ntn8530@gmail.com', 'Tnc2024@', 'admin');
insert into users(`id`, `name`, `email`, `password`, `role`) values (2, 'Đỗ Mạnh Cường', 'cuong@gmail.com', 'cuonglsr', 'admin');
insert into users(`id`, `name`, `email`, `password`, `role`) values (3, 'Lê Đức Anh', 'ducanh@gmail.com', 'ducanh', 'customer');
insert into users(`id`, `name`, `email`, `password`, `role`) values (4, 'Nguyễn Phương Thảo', 'ducanh2@gmail.com', 'ducanh', 'customer');
insert into users(`id`, `name`, `email`, `password`, `role`) values (5, 'Quang', 'ducanh3@gmail.com', 'ducanh', 'customer');

insert into invoices(`customer_id`, `total`, `status` ) values (5, 2000000, 'paid');
insert into invoices(`customer_id`, `total`, `status` ) values (4, 3500000, 'paid');
insert into invoices(`customer_id`, `total`, `status` ) values (4, 10000000, 'paid');
insert into invoices(`customer_id`, `total`, `status` ) values (5, 4000000, 'paid');
insert into invoices(`id`,`customer_id`, `total`, `status` ) values (1,5, 5000000, 'paid');
select * from invoices as i inner join users as u on i.customer_id = u.id;

SELECT u.id AS customer_id, u.role, SUM(i.total) AS total_spent
FROM invoices i
INNER JOIN users u ON i.customer_id = u.id
WHERE u.role = 'customer'
GROUP BY u.id, u.role
ORDER BY total_spent DESC
LIMIT 3;

delete from invoices where id = 1;
use lansurong;
select * from users;
select * from shows;

use lansurong;
select * from users;
insert into users (`id`, `name`, `email`, `password`, `role`) values ('6','Phạm Nhật Tiến', 'tien@gmail.com', '123456', 'employee');
use lansurong;

ALTER TABLE shows
ADD customer_name VARCHAR(100),
ADD customer_phone VARCHAR(20);
select * from shows;
use lansurong;
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

drop table contacts;

-- Bảng đơn hàng
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Bảng mục giỏ hàng
CREATE TABLE cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

