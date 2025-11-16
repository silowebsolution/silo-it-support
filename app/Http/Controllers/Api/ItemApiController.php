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
                    ->with(['itemStatus', 'userTicketItem.userTicket'])
                    ->first();

        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $tickets = $item->userTicketItem->map(function ($userTicketItem) {
            $userTicket = $userTicketItem->userTicket;
            return [
                'label' => $userTicket->label,
                'ai_recommendation' => $userTicket->ai_recommendation,
                'was_ai_correct' => $userTicket->was_ai_correct,
                'it_specialist_comment' => $userTicket->it_specialist_comment,
            ];
        });

        return response()->json([
            'item_name' => $item->name,
            'code' => $item->code,
            'description' => $item->description,
            'itemStatus' => optional($item->itemStatus)->name,
            'tickets' => $tickets,
        ]);
    }
}
