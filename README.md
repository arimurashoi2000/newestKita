# Kitaアプリの始め方

```
git clone git@github.com:FullSpeedInc/Traning_Kita_App.git
cd Traning_Kita_App
docker-compose up -d
docker exec -it traning_kita_app_kita_1 composer install
docker exec -it traning_kita_app_kita_1 php artisan key:generate
```