<p align="center"><img src="Capture.PNG" width="500"></p>

## About 

MANKOST, simple monitoring pemasukan dan pengeluaran Anda secara otomatis. Project ini dibuat di saat saya untuk memanage keuangan serta gabut 

## Fitur

- Simple design 
- Otomatis count
- Otomasi count balance
- Otomatis get pengeluaran terbsesar
- Otomatis get pemasukan terbsesar
- Sangat ringan bisa digunakan di laptop kentang
- Graph interface (Coming soon)
- Target nabung (Coming soon)
- Tips nabung (Coming soon)
- Export csv dan pdf (Coming soon)
- Filter output dan pencarian (Coming soon)

NB : *Mankost sudah bisa digunakan untuk keperluan standar, seperti penghitungan, pengurangan dan lainya Anda dapat menikmati mankost ini

## Installisasi

- Run composer install && update
- Run "cp .env.example .env" (linux)
- Run "copy .env.example .env" (windows)
- Run "php artisan key:generate"
- Edit .env samakan databse Anda 

Database :

> DB_CONNECTION=mysql
> 
> DB_HOST=127.0.0.1
> 
> DB_PORT=3306
> 
> DB_DATABASE=your database
> 
> DB_USERNAME=your username
> 
> DB_PASSWORD=your password

- Run "php artisan migrate"
- Run "php artisan db:seed"
- Run "php artisan serve"
- Make new "user folder" at public/images/user 

