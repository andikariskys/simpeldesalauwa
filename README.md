# Website Sistem Informasi Kantor Desa Lauwa

## Langkah Instalasi

- Pertama __download/clone__ terlebih dahulu repository ini.
- Selanjutnya ekstrak terlebih dahulu file zip (jika didownload), setelha muncul project/folder berisi repository ini pindahkan kedalam folder ```C:\laragon\www``` (Jika menggunakan __Laragon__) atau taruh kedalam folder ```C:\xampp\htdocs``` (Jika menggunakan __XAMPP__). Note: silakan disesuaikan dengan instalasi PHP Server kalian.
- Selanjutnya jalankan MySQL & Apache dari Laragon/XAMPP __import__ database yang berada pada repository ini (```prod_pelayanan.sql```) kedalam local database (PhpMyAdmin)
- buka pada browser dengan alamat link ```http://localhost/simpeldesalauwa```

### Catatan
Jika mengubah nama project (Contoh menjadi __websitedesalauwa__), maka ubah juga kode  berikut: 

```$config['base_url'] = 'http://localhost/simpeldesalauwa/';``` 

menjadi:

```$config['base_url'] = 'http://localhost/websitedesalauwa/';```

yang berada pada file ```application/config/config.php``` lalu buka pada browser dengan alamat link ```http://localhost/websitedesalauwa```

## Acoount Information

Berikut adalah username & password default saat login:

```
Username : admin 
Password : admin123
```