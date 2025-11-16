# 🚀 GitHub'a Yükleme Talimatları

Bu doküman, Dr. Sinan Akyürek Botoks Kliniği projesini GitHub'a yüklemek için adım adım talimatları içerir.

## Ön Hazırlık

✅ Aşağıdaki dosyalar hazırlandı:
- `README.md` - Proje açıklaması ve dokümantasyon
- `CONTRIBUTING.md` - Katkı kuralları
- `CHANGELOG.md` - Versiyon geçmişi
- `.gitignore` - Git ignore kuralları
- `.env.example` - Örnek ortam dosyası
- `.github/workflows/laravel-tests.yml` - CI/CD pipeline

## GitHub'a Yükleme Adımları

### Yöntem 1: Git Komut Satırı ile (Önerilen)

#### 1. Git Kurulumu
Eğer Git yüklü değilse: https://git-scm.com/downloads

#### 2. GitHub Repository Oluşturma
1. https://github.com adresine gidin
2. "New repository" butonuna tıklayın
3. Repository adı: `dr-sinanakyurek-botoks` veya `botoks-clinic-management`
4. Description: `Dr. Sinan Akyürek Botoks Kliniği Web Yönetim Sistemi - Laravel + Filament`
5. **Private** seçin (özel proje için)
6. README eklemeyin (zaten mevcut)
7. "Create repository" butonuna tıklayın

#### 3. Projeyi GitHub'a Push Edin

Terminal veya PowerShell'de şu komutları çalıştırın:

```bash
# Proje klasörüne gidin
cd C:\Users\LENOVO\app

# Git repository'sini başlatın
git init

# Tüm dosyaları stage edin
git add .

# İlk commit'i yapın
git commit -m "feat: initial commit - slider yönetim modülü eklendi"

# Ana branch'i main olarak ayarlayın
git branch -M main

# GitHub repository'nizi remote olarak ekleyin (KULLANICI_ADINIZ yerine GitHub kullanıcı adınızı yazın)
git remote add origin https://github.com/KULLANICI_ADINIZ/dr-sinanakyurek-botoks.git

# Kodu GitHub'a push edin
git push -u origin main
```

### Yöntem 2: GitHub Desktop ile (Kolay Yol)

#### 1. GitHub Desktop İndirin
https://desktop.github.com/

#### 2. Kurulum
1. GitHub Desktop'ı açın
2. GitHub hesabınızla giriş yapın
3. File > Add Local Repository
4. `C:\Users\LENOVO\app` klasörünü seçin
5. "Create a repository" seçeneğini seçin

#### 3. Repository Ayarları
- Name: `dr-sinanakyurek-botoks`
- Description: `Dr. Sinan Akyürek Botoks Kliniği Web Yönetim Sistemi`
- Local Path: `C:\Users\LENOVO\app`
- **Keep this code private** seçin
- **Git ignore**: None (zaten .gitignore var)
- **License**: None (özel proje)

#### 4. İlk Commit ve Push
1. Sol panelde değişiklikleri göreceksiniz
2. Alt kısımda commit mesajı yazın: `feat: initial commit - slider yönetim modülü`
3. "Commit to main" butonuna tıklayın
4. Üst menüden "Publish repository" seçin
5. **Keep this code private** işaretli olduğundan emin olun
6. "Publish Repository" butonuna tıklayın

## Branch Stratejisi

Aşağıdaki branch yapısını kullanmanız önerilir:

```
main           # Production-ready kod
  └── develop  # Geliştirme branch'i
      ├── feature/services      # Hizmetler modülü
      ├── feature/gallery       # Galeri modülü
      ├── feature/appointments  # Randevu sistemi
      └── feature/blog          # Blog modülü
```

### Branch Oluşturma

```bash
# Develop branch oluşturun
git checkout -b develop
git push -u origin develop

# Yeni özellik için branch oluşturun
git checkout develop
git checkout -b feature/services
# Değişikliklerinizi yapın...
git add .
git commit -m "feat: hizmetler modülü eklendi"
git push -u origin feature/services
```

## GitHub Repository Ayarları

Repository oluşturduktan sonra Settings bölümünden:

### 1. General
- ✅ Restrict editing to collaborators only
- ✅ Allow merge commits
- ✅ Allow squash merging
- ✅ Automatically delete head branches

### 2. Branches
- Protected branch: `main`
  - ✅ Require pull request reviews before merging
  - ✅ Require status checks to pass before merging

### 3. Security
- ✅ Enable Dependabot alerts
- ✅ Enable Dependabot security updates

### 4. Secrets (CI/CD için gerekirse)
- `APP_KEY`: Laravel uygulama anahtarı

## Sonraki Adımlar

✅ Proje GitHub'a yüklendi
🔄 Geliştirme planındaki modülleri ekleyin:
  - [ ] Hizmetler (Botoks, Dolgu, vb.)
  - [ ] Galeri (Önce/Sonra)
  - [ ] Randevu Sistemi
  - [ ] Blog
  - [ ] İletişim

## GitHub README Preview

Repository'niz şöyle görünecek:

```
🏥 Dr. Sinan Akyürek - Botoks Kliniği Web Yönetim Paneli

Laravel 11 + Filament v4 + Lara Zeus Spatie Translatable kullanılarak 
geliştirilmiş Dr. Sinan Akyürek'in botoks kliniği için çok dilli web 
yönetim sistemi.

✅ Filament v4 - Modern admin panel
✅ Çok Dilli Destek - Türkçe ve İngilizce
✅ Slider Yönetimi - Ana sayfa slider'ları
🔄 Geliştirme Aşamasında
```

## Yardım

Sorun yaşarsanız:
1. Git/GitHub Desktop loglarını kontrol edin
2. `.gitignore` dosyasının doğru çalıştığından emin olun
3. Büyük dosyaların (vendor/, node_modules/) yüklenMEdiğinden emin olun

---

**Not:** Bu proje özel (private) olarak tutulmalıdır çünkü gerçek bir klinik için geliştirilmektedir.

