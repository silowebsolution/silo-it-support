<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemApiController extends Controller
{
    public function search(Request $request, $code)
    {
        $item = Item::where('code', $code)
                    ->with(['itemStatus', 'userTicketItem.user', 'userTicketItem.userTicket'])
                    ->first();

        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return response()->json([
            'itemStatus' => $item->itemStatus ? $item->itemStatus->label : null,
            'userName' => $item->userTicketItem && $item->userTicketItem->user ? $item->userTicketItem->user->name : null,
            'userTicketId' => $item->userTicketItem && $item->userTicketItem->userTicket ? $item->userTicketItem->userTicket->id : null,
            'label' => $item->name."-".$item->code,
        ]);
    }
}
