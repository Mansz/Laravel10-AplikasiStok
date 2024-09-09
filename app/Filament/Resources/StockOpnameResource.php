<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StockOpnameResource\Pages;
use App\Models\StockOpname;
use App\Models\Reports; // Tambahkan model Reports jika digunakan
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class StockOpnameResource extends Resource
{
    protected static ?string $model = StockOpname::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Schema untuk form yang digunakan dalam operasi CRUD
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    // Schema untuk tampilan tabel data
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
            ])
            ->filters([
                // Filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // Relasi ke model lain jika diperlukan
    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika dibutuhkan
        ];
    }

    // Definisi halaman yang tersedia untuk resource ini
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStockOpnames::route('/'),
            'create' => Pages\CreateStockOpname::route('/create'),
            'edit' => Pages\EditStockOpname::route('/{record}/edit'),
        ];
    }
}
