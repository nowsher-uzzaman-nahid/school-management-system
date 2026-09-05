<?php

namespace App\Filament\Resources\FeeInvoices\Pages;

use App\Filament\Resources\FeeInvoices\FeeInvoiceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFeeInvoice extends EditRecord
{
    protected static string $resource = FeeInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
