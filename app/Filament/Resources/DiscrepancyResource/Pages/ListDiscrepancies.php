<?php

namespace App\Filament\Resources\DiscrepancyResource\Pages;

use App\Filament\Resources\DiscrepancyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiscrepancies extends ListRecords
{
    protected static string $resource = DiscrepancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
