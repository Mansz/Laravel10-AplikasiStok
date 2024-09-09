<?php

namespace App\Filament\Resources\DiscrepancyResource\Pages;

use App\Filament\Resources\DiscrepancyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiscrepancy extends EditRecord
{
    protected static string $resource = DiscrepancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
