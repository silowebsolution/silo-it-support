<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserTicket;
use App\Models\UserTicketMessage;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserTicketMessagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserTicket  $userTicket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, UserTicketMessage $userTicketMessage, UserTicket $userTicket)
    {
        // Allow any authenticated user to create a message for a ticket they are associated with.
        // This might need further refinement based on your application's specific logic,
        // e.g., only the ticket creator or assigned agent can send messages.
        return $user->id === $userTicket->user_id || $user->can('manage_tickets'); // Assuming 'manage_tickets' permission for agents/managers
    }

    // Add other policy methods (view, update, delete) if needed
}
