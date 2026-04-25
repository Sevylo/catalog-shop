<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Pengaturan')
                    ->schema([
                        TextInput::make('key')
                            ->label('Kunci (Key)')
                            ->required()
                            ->maxLength(255)
                            ->disabled(fn (?string $operation): bool => $operation === 'edit'),
                        TextInput::make('group')
                            ->label('Grup')
                            ->required()
                            ->default('general')
                            ->maxLength(255),
                        Textarea::make('value')
                            ->label('Nilai')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
