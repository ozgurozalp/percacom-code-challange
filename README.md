# PERACOM YAZILIM - CODE CHALLANGE KAYNAK KODLARI
## Proje Kurulumu

Projeyi indirmek için terminale aşağıdaki komutu yazın

```bash
git clone https://github.com/ozgurozalp/percacom-code-challange.git
```

Clone işlemi tamamlandıktan sonra ise bu komutu yazın

```bash
cd percacom-code-challange
```

ardından aşağıdaki komut yardımıyla projemize bir key ataması yapalım

```bash
php artisan key:generate
```
Bu işlemden sonra <mark style="display:inline-block; padding: .2ch .3ch; border-radius:2px;font-weight:600">.env</mark> 
dosyası içerisindeki aşağıdaki ilgili alanları kendimize göre doldurmalıyız

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=peracom
DB_USERNAME=root
DB_PASSWORD=
```

Veritabanı bilgilerimizi de girdiğimize göre migrationlarımızı çalıştırmak için aşağıdaki komutu terminalimize girelim

```bash
php artisan migrate --seed
```

Şimdi tek yapılması gereken development ortamımızı ayağa kaldırmak. Bunun için de aşağıdaki komutu çalıştırmanız yeterli

```bash
php artisan serve
```

### Herşey tamam. Şimdi http://localhost:8000 adresine girmeniz yeterli.


## Author

* **Özgür ÖZALP** - [Özgür ÖZALP](https://github.com/ozgurozalp)
