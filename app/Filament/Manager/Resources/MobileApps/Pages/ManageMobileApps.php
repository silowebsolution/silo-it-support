<?php

namespace App\Filament\Manager\Resources\MobileApps\Pages;

use App\Filament\Manager\Resources\MobileApps\MobileAppResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageMobileApps extends ManageRecords
{
    protected static string $resource = MobileAppResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
