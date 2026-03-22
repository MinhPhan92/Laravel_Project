# Fix lỗi: Tablespace / Directory not empty

## 1. Lỗi "Tablespace for table 'migrations' exists"
MySQL giữ lại tablespace (file .ibd) sau khi drop bảng → tạo lại bảng báo lỗi 1813.

## 2. Lỗi "#1010 - Can't rmdir, Directory not empty"
Khi chạy `DROP DATABASE`, MySQL không xóa được thư mục vì còn file rác (.ibd, v.v.).

---

## Cách xử lý (bắt buộc: xóa thư mục database bằng tay)

### Bước 1: Tắt MySQL
- Mở **XAMPP Control Panel** → **MySQL** → **Stop**.

### Bước 2: Xóa thư mục database
- Vào thư mục **data** của MySQL (thường là):
  - **XAMPP**: `C:\xampp\mysql\data\`
  - Hoặc: `C:\ProgramData\MySQL\MySQL Server x.x\Data\`
- Tìm và **xóa hẳn thư mục** tên `qlbh_67pm34` (xóa cả thư mục, kể cả file bên trong).

### Bước 3: Bật lại MySQL
- Trong XAMPP: **MySQL** → **Start**.

### Bước 4: Tạo lại database (chỉ cần CREATE)
- Mở **phpMyAdmin** → tab **SQL**, chạy (không cần DROP vì thư mục đã xóa):

```sql
CREATE DATABASE qlbh_67pm34 CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

### Bước 5: Chạy migrate
- Trong terminal, tại thư mục project:

```bash
php artisan migrate
```

Sau đó có thể chạy seed nếu cần: `php artisan db:seed`.
