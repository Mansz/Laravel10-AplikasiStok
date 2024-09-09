<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('team_id')
                ->label('Team')
                ->relationship('team', 'name')
                ->required(),
                
            Forms\Components\Select::make('stock_opname_id')
                ->label('Stock Opname')
                ->relationship('stockOpname', 'schedule_name')
                ->required(),

            Forms\Components\TextInput::make('task_name')
                ->label('Task Name')
                ->required(),

            Forms\Components\TextInput::make('area')
                ->label('Area')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('task_name')
                ->label('Task Name'),

            Tables\Columns\TextColumn::make('team.name')
                ->label('Team'),

                Tables\Columns\TextColumn::make('stockOpname.schedule_name')
                ->label('Stock Opname'),

                Tables\Columns\TextColumn::make('area')
                ->label('Area'),

                Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
