<?php

namespace App\Filament\Resources\Sliders\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Slider İçeriği')
                    ->description('Slider üzerinde görünecek metinler ve yönlendirme.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Ana Başlık')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('subtitle')
                            ->label('Alt Başlık / Açıklama')
                            ->rows(3)
                            ->maxLength(500),

                        TextInput::make('button_text')
                            ->label('Düğme Yazısı')
                            ->maxLength(100),

                        TextInput::make('button_link')
                            ->label('Düğme Linki (URL)')
                            ->url(),
                    ])->columns(2),

                Section::make('Görsel ve Ayarlar')
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Slider Görseli')
                            ->image() // Sadece resim dosyalarına izin ver
                            ->directory('slider-images') // Resimleri 'storage/app/public/slider-images' içine kaydeder
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Aktif mi?')
                            ->default(true), // Varsayılan olarak "aktif" gelir

                        TextInput::make('order')
                            ->label('Sıralama')
                            ->numeric()
                            ->default(0),
                    ])->columns(1),
            ]);
    }
}
