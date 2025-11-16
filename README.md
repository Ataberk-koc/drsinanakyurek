# 🏥 Dr. Sinan Akyürek - Botoks Kliniği Web Yönetim Paneli

Laravel 11 + Filament v4 + Lara Zeus Spatie Translatable kullanılarak geliştirilmiş Dr. Sinan Akyürek'in botoks kliniği için çok dilli web yönetim sistemi.

> **Not:** Bu repository, klinik web sitesinin slider yönetim modülünü içermektedir. Proje geliştirilme aşamasındadır.

## 🚀 Özellikler

- ✅ **Filament v4** - Modern admin panel
- ✅ **Çok Dilli Destek** - Türkçe ve İngilizce (Lara Zeus Spatie Translatable ile)
- ✅ **Slider Yönetimi** - Ana sayfa slider görselleri, başlıklar ve CTA butonları
- ✅ **JSON Tabanlı Çeviriler** - Veritabanında JSON sütunlarında saklanan çeviriler
- ✅ **Responsive Formlar** - Her dil için ayrı tab'lar
- 🔄 **Geliştirme Aşamasında** - Hizmetler, galeri, randevu sistemi eklenecek

## 📦 Kullanılan Paketler

```json
{
    "filament/filament": "^4.0",
    "lara-zeus/spatie-translatable": "^1.0",
    "spatie/laravel-translatable": "^6.0"
}
```

## 🛠️ Kurulum

### 1. Projeyi Klonlayın

```bash
git clone https://github.com/KULLANICI_ADINIZ/dr-sinanakyurek-botoks.git
cd dr-sinanakyurek-botoks
```

### 2. Bağımlılıkları Yükleyin

```bash
composer install
npm install
```

### 3. Ortam Dosyasını Oluşturun

```bash
copy .env.example .env
php artisan key:generate
```

### 4. Veritabanını Yapılandırın

`.env` dosyasında veritabanı ayarlarınızı düzenleyin (varsayılan SQLite):

```env
DB_CONNECTION=sqlite
```

SQLite için database dosyası otomatik oluşturulacaktır.

### 5. Migration'ları Çalıştırın

```bash
php artisan migrate
```

### 6. Storage Link Oluşturun

```bash
php artisan storage:link
```

### 7. Admin Kullanıcı Oluşturun

```bash
php artisan make:filament-user
```

### 8. Geliştirme Sunucusunu Başlatın

```bash
php artisan serve
```

Admin paneline erişim: `http://localhost:8000/admin`

## 📁 Proje Yapısı

```
app/
├── Filament/
│   └── Resources/
│       └── Sliders/                    # Ana sayfa slider yönetimi
│           ├── SliderResource.php
│           ├── Schemas/
│           │   └── SliderForm.php
│           ├── Tables/
│           │   └── SlidersTable.php
│           └── Pages/
│               ├── ListSliders.php
│               ├── CreateSlider.php
│               └── EditSlider.php
├── Models/
│   └── Slider.php
└── Providers/
    └── Filament/
        └── AdminPanelProvider.php

database/
└── migrations/
    └── 2025_11_15_210433_create_sliders_table.php

config/
└── translatable.php                    # Dil yapılandırması
```

## 🗄️ Veritabanı Şeması

### Sliders Tablosu (Ana Sayfa Slider'ları)

| Sütun | Tip | Açıklama |
|-------|-----|----------|
| `id` | bigint | Primary key |
| `title` | json | Çevrilebilir başlık (tr, en) |
| `subtitle` | json | Çevrilebilir alt başlık/açıklama (tr, en) |
| `button_text` | json | Çevrilebilir buton yazısı (tr, en) - örn: "Randevu Al" |
| `button_link` | varchar | Buton yönlendirme linki - örn: "/randevu" |
| `image_path` | varchar | Slider görseli yolu (public/storage/slider-images/) |
| `is_active` | boolean | Slider aktif/pasif durumu |
| `order` | integer | Slider görüntülenme sırası |
| `created_at` | timestamp | Oluşturulma tarihi |
| `updated_at` | timestamp | Güncellenme tarihi |

## 🌍 Dil Desteği

Klinik web sitesi Türkçe ve İngilizce dillerini desteklemektedir.

Dil ayarları `config/translatable.php` dosyasında tanımlıdır:

```php
'locales' => [
    'tr' => 'Türkçe',
    'en' => 'English',
],
'fallback_locale' => 'tr', // Varsayılan dil Türkçe
```

## 📝 Slider Modeli Kullanımı

```php
use App\Models\Slider;

// Ana sayfa için yeni slider oluşturma
$slider = Slider::create([
    'title' => [
        'tr' => 'Doğal Görünümlü Botoks Uygulamaları',
        'en' => 'Natural Looking Botox Applications'
    ],
    'subtitle' => [
        'tr' => 'Uzman doktor kadrosu ile güvenli ve etkili botoks tedavileri',
        'en' => 'Safe and effective botox treatments with expert doctors'
    ],
    'button_text' => [
        'tr' => 'Hemen Randevu Al',
        'en' => 'Book Appointment Now'
    ],
    'button_link' => '/randevu',
    'image_path' => 'slider-images/botox-treatment.jpg',
    'is_active' => true,
    'order' => 1
]);

// Aktif slider'ları sıralı olarak getir
$sliders = Slider::where('is_active', true)
    ->orderBy('order')
    ->get();
```

## 🎨 Admin Panel - Slider Yönetimi

Form iki bölümden oluşur:

### 1. Slider İçeriği
- **Ana Başlık** (TranslatableText) - Zorunlu - Örn: "Botoks Uygulamaları"
- **Alt Başlık / Açıklama** (TranslatableTextarea) - İsteğe bağlı
- **Düğme Yazısı** (TranslatableText) - İsteğe bağlı - Örn: "Randevu Al"
- **Düğme Linki** (TextInput - URL) - İsteğe bağlı - Örn: "/randevu"

### 2. Görsel ve Ayarlar
- **Slider Görseli** (FileUpload) - Zorunlu - Önerilen boyut: 1920x1080px
- **Aktif mi?** (Toggle) - Slider'ı web sitesinde göster/gizle
- **Sıralama** (TextInput - Numeric) - Slider'ların görüntülenme sırası

## 🔧 Yapılandırma

### Filament Panel Provider

`app/Providers/Filament/AdminPanelProvider.php`:

```php
->plugin(
    SpatieTranslatablePlugin::make()
        ->defaultLocales(['tr', 'en']) // Türkçe ve İngilizce destek
)
```

### Ortam Değişkenleri

`.env` dosyasında:

```env
APP_NAME="Dr. Sinan Akyürek - Botoks Kliniği"
APP_LOCALE=tr
APP_FALLBACK_LOCALE=tr
```

## 🚧 Geliştirme Planı

- [x] Slider Yönetimi
- [ ] Hizmetler Modülü (Botoks, Dolgu, Diğer Uygulamalar)
- [ ] Galeri Yönetimi (Önce/Sonra Fotoğrafları)
- [ ] Randevu Sistemi
- [ ] Blog/Makaleler
- [ ] İletişim Formu
- [ ] SSS (Sıkça Sorulan Sorular)
- [ ] SEO Optimizasyonu

## 🤝 Katkıda Bulunma

Bu proje Dr. Sinan Akyürek botoks kliniği için özel olarak geliştirilmektedir. Katkı yapmak isterseniz lütfen önce iletişime geçin.

## 📄 Lisans

Bu proje özel bir proje olup, tüm hakları saklıdır.

## 📞 İletişim

**Dr. Sinan Akyürek Botoks Kliniği**

Proje Repository: [https://github.com/KULLANICI_ADINIZ/dr-sinanakyurek-botoks](https://github.com/KULLANICI_ADINIZ/dr-sinanakyurek-botoks)

## 🙏 Teşekkürler

- [Laravel](https://laravel.com)
- [Filament](https://filamentphp.com)
- [Lara Zeus Spatie Translatable](https://github.com/lara-zeus/spatie-translatable)
- [Spatie Laravel Translatable](https://github.com/spatie/laravel-translatable)

---

**Geliştirici Notu:** Bu proje aktif geliştirme aşamasındadır. Şu anda sadece slider yönetim modülü tamamlanmıştır.

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
