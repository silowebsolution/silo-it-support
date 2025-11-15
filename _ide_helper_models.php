<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $item_status_id
 * @property int $location_id
 * @property string $name
 * @property string $description
 * @property string $code
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereItemStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereUpdatedAt($value)
 */
	class Item extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $item_id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $image_name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereImageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereUpdatedAt($value)
 */
	class ItemDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemImages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemImages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemImages query()
 */
	class ItemImages extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus whereUpdatedAt($value)
 */
	class ItemStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location whereUpdatedAt($value)
 */
	class Location extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserTicket> $userTickets
 * @property-read int|null $user_tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereUpdatedAt($value)
 */
	class Priority extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Status whereUpdatedAt($value)
 */
	class Status extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $user_ticket_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \App\Models\UserTicket $userTicket
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket whereUserTicketId($value)
 */
	class UserAssignedTicket extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $item_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereUserId($value)
 */
	class UserItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $status_id
 * @property int|null $priority_id
 * @property string $label
 * @property string|null $ai_recommendation
 * @property int|null $was_ai_correct
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Priority|null $priority
 * @property-read \App\Models\Status $status
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserAssignedTicket> $userAssignedTickets
 * @property-read int|null $user_assigned_tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereAiRecommendation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket wherePriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereWasAiCorrect($value)
 */
	class UserTicket extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_ticket_id
 * @property int $item_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem whereUserTicketId($value)
 */
	class UserTicketItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_ticket_id
 * @property int $user_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage whereUserTicketId($value)
 */
	class UserTicketMessage extends \Eloquent {}
}

