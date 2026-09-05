<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\FeeInvoice;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeeInvoicePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:FeeInvoice');
    }

    public function view(AuthUser $authUser, FeeInvoice $feeInvoice): bool
    {
        return $authUser->can('View:FeeInvoice');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:FeeInvoice');
    }

    public function update(AuthUser $authUser, FeeInvoice $feeInvoice): bool
    {
        return $authUser->can('Update:FeeInvoice');
    }

    public function delete(AuthUser $authUser, FeeInvoice $feeInvoice): bool
    {
        return $authUser->can('Delete:FeeInvoice');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:FeeInvoice');
    }

    public function restore(AuthUser $authUser, FeeInvoice $feeInvoice): bool
    {
        return $authUser->can('Restore:FeeInvoice');
    }

    public function forceDelete(AuthUser $authUser, FeeInvoice $feeInvoice): bool
    {
        return $authUser->can('ForceDelete:FeeInvoice');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:FeeInvoice');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:FeeInvoice');
    }

    public function replicate(AuthUser $authUser, FeeInvoice $feeInvoice): bool
    {
        return $authUser->can('Replicate:FeeInvoice');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:FeeInvoice');
    }

}