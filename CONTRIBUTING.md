# Katkıda Bulunma Rehberi

Dr. Sinan Akyürek Botoks Kliniği web yönetim sistemine katkıda bulunmak istediğiniz için teşekkür ederiz!

## 🚀 Başlarken

1. Repository'yi fork edin
2. Yeni bir branch oluşturun (`git checkout -b feature/yeni-ozellik`)
3. Değişikliklerinizi yapın
4. Commit edin (`git commit -m 'feat: yeni özellik eklendi'`)
5. Branch'inizi push edin (`git push origin feature/yeni-ozellik`)
6. Pull Request oluşturun

## 📝 Commit Mesajları

Commit mesajlarınız için conventional commits formatını kullanın:

- `feat:` - Yeni özellik
- `fix:` - Hata düzeltmesi
- `docs:` - Dokümantasyon değişiklikleri
- `style:` - Kod formatı değişiklikleri
- `refactor:` - Kod refactoring
- `test:` - Test ekleme/düzeltme
- `chore:` - Diğer değişiklikler

Örnek:
```bash
git commit -m "feat: slider sıralama özelliği eklendi"
git commit -m "fix: slider görsel yükleme hatası düzeltildi"
```

## 🧪 Testing

Değişikliklerinizi test etmeyi unutmayın:

```bash
php artisan test
```

## 📋 Code Style

Laravel ve Filament best practices'lerini takip edin:
- PSR-12 kod standardı
- Laravel naming conventions
- Filament resource yapısı

## 🌍 Çeviri Ekleme

Yeni bir dil eklemek için:

1. `config/translatable.php` dosyasını güncelleyin
2. `AdminPanelProvider.php` içinde `defaultLocales` dizisine ekleyin
3. İlgili dil dosyalarını `lang/` klasörüne ekleyin

## ❓ Sorular

Sorularınız için GitHub Issues kullanabilirsiniz.

