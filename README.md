# Tredium Blog — Laravel Test Project

## Loyihaning qisqacha tavsifi

Bu loyiha — Laravel framework’da yozilgan, maqolalar katalogi va blog sahifalarini o‘z ichiga olgan test blog platformasi.  
Frontend uchun Bootstrap ishlatilgan.  
Backend — Laravel 7+ (PostgreSQL).  
Like, ko‘rishlar soni, hamda kommentariylar AJAX orqali ishlaydi.
---

## Funksional imkoniyatlar

- **Bosh sahifa**: Oxirgi 6 ta maqola mini-card ko‘rinishida.
- **Maqolalar katalogi**: 10 ta maqola bir sahifada, LIFO tartibda, paginatsiya.
- **Maqola sahifasi**: 
  - Rasm, sarlavha, matn, teglar
  - Like va ko‘rishlar soni (AJAX)
  - Kommentariylar ro‘yxati
  - Kommentariy qoldirish formasi (AJAX)
- **Navigatsiya**: Aktiv bo‘limlar, soddaligi va Bootstrap dizayni.
- **API**: Like, ko‘rishlar, kommentariylar uchun REST endpointlar.
---

## Texnologiyalar

- PHP 8.2
- Laravel 12
- Bootstrap 4
- PostgreSQL
- JQuery (AJAX uchun)

---

## O‘rnatish va ishga tushirish

### 1. Klonlash

```sh
git clone https://github.com/javohir01/blog.git
cd blog
```

### 2. Composer va npm

```sh
composer install
npm install
```

### 3. .env faylini sozlash

- `.env.example` ni nusxa ko‘chiring va `.env` deb nomlang.
- Ma’lumotlar bazasi va boshqa sozlamalarni to‘ldiring.

### 4. Laravel key yaratish

```sh
php artisan key:generate
```

### 5. Migratsiyalar va seedlar

```sh
php artisan migrate
php artisan db:seed
```

### 6. Serverni ishga tushirish

```sh
php artisan serve
```

---

## Ma’lumotlar bazasi

- **users** — foydalanuvchilar
- **articles** — maqolalar
- **tags** — teglar
- **article_tag** — maqola-teg pivot
- **comments** — kommentariylar
- **sessions**, **cache**, **jobs** — Laravel uchun

---

## API Endpoints

- `POST /api/articles/{id}/like` — Like sonini oshirish
- `POST /api/articles/{id}/view` — Ko‘rishlar sonini oshirish (5 sekunddan so‘ng)
- `POST /api/articles/{id}/comments` — Kommentariy qoldirish (AJAX, fon rejimida)

---

## Test uchun seedlar

- **TagSeeder** — 10 ta random teg
- **ArticleSeeder** — 20 ta maqola, har birida 1-3 ta teg
- **UserSeeder** — Test user

---

## Chek-list

1. `vendor` va `node_modules` papkalarini o‘chirib tashlang
2. Barcha jadval va ma’lumotlarni tozalang (`php artisan migrate:fresh`)
3. `.env` faylini o‘chirib, `.env.example` dan yangi yarating
4. `composer install`, `npm install`
5. `php artisan key:generate`
6. `php artisan migrate`
7. `php artisan db:seed`
8. `php artisan serve`
9. Barcha sahifalarni va funksiyalarni tekshiring

---

## Qo‘shimcha

- Kodda Eloquent scopes, accessorlar, service layer ishlatilgan.
- AJAX uchun JQuery ishlatiladi.
- Like va view counterlar — atomic update.
- Kommentariylar — fon rejimida (sleep bilan).

---

## Muallif

- Javohir
- ruzikulovjavohir005@gmail.com
