<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Group::make()->schema([
                    \Filament\Forms\Components\Section::make('Informasi Produk')
                        ->schema([
                            TextInput::make('name')
                                ->label('Nama Produk')
                                ->required()
                                ->maxLength(255),
                            Select::make('category_id')
                                ->relationship('category', 'name')
                                ->label('Kategori')
                                ->required()
                                ->searchable()
                                ->preload(),
                            Textarea::make('description')
                                ->label('Deskripsi Singkat')
                                ->maxLength(500)
                                ->columnSpanFull(),
                            \Filament\Forms\Components\RichEditor::make('long_description')
                                ->label('Deskripsi Lengkap')
                                ->columnSpanFull(),
                        ])->columns(2),

                    \Filament\Forms\Components\Section::make('Gambar Produk')
                        ->schema([
                            FileUpload::make('image')
                                ->label('Gambar Utama')
                                ->image()
                                ->directory('products')
                                ->columnSpanFull(),
                            // Optional: \Filament\Forms\Components\FileUpload::make('gallery')->multiple()->directory('products/gallery')->label('Galeri (Opsional)')->columnSpanFull(),
                        ]),
                ])->columnSpan(['lg' => 2]),

                \Filament\Forms\Components\Group::make()->schema([
                    \Filament\Forms\Components\Section::make('Harga & Stok')
                        ->schema([
                            TextInput::make('price')
                                ->label('Harga Normal')
                                ->required()
                                ->numeric()
                                ->prefix('Rp')
                                ->default(0),
                            TextInput::make('sale_price')
                                ->label('Harga Diskon')
                                ->numeric()
                                ->prefix('Rp'),
                            TextInput::make('stock')
                                ->label('Stok')
                                ->required()
                                ->numeric()
                                ->default(0),
                            TextInput::make('unit')
                                ->label('Satuan')
                                ->required()
                                ->default('pcs'),
                            TextInput::make('sku')
                                ->label('SKU')
                                ->maxLength(255),
                        ]),
                    
                    \Filament\Forms\Components\Section::make('Status')
                        ->schema([
                            Toggle::make('is_active')
                                ->label('Aktif')
                                ->default(true)
                                ->required(),
                            Toggle::make('is_featured')
                                ->label('Featured (Unggulan)')
                                ->default(false)
                                ->required(),
                            TextInput::make('sort_order')
                                ->label('Urutan')
                                ->required()
                                ->numeric()
                                ->default(0),
                        ]),
                ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }
}
