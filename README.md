# LaravelApi62Tek
Test dari PT Enam Dua Teknologi


## note : 

- untuk .env di QUEUE_CONNECTION=database mohon jangan di ganti karena saya memakai JOBS ketika ngecrawl data.
- Jangan lupa jalankan command job dibawah ini agar data Review Bisa Di Crawl!!.
- Api key bisa di ganti di App\CustomClass\EndPoint di function key_api;
- untuk banyaknya record yang di ambil bisa di set disini
```
App\Http\Controllers\api\business.php
line 17
```

Untuk migrate database
```
$ php artisan migrate
```

Untuk Menjalankan Jobs Yang Mengambil Data Review Silahkan Jalankan Command Ini
```
$ php artisan queue:work --tries=3
```
