<?php

namespace App\Filament\Resources\IsolationResource\Pages;

use App\Filament\Resources\IsolationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIsolation extends EditRecord
{
    protected static string $resource = IsolationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
