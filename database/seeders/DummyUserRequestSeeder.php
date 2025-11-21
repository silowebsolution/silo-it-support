<?php

namespace Database\Seeders;

use App\Models\UserAssignedTicket;
use App\Models\Item;
use App\Models\Status;
use App\Models\User;
use App\Models\UserTicket;
use App\Models\UserTicketItem;
use App\Models\UserTicketMessage;
use Illuminate\Database\Seeder;
use App\Models\Priority;
use Spatie\Permission\Models\Role;

class DummyUserRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itRole = Role::where('name', 'it')->first();
        $itUsers = $itRole->users;
        $users = User::whereNotIn('id', $itUsers->pluck('id'))->get();
        $items = Item::all();
        $statuses = Status::all();
        $priorities = Priority::all();

        $dummyMessages = [
            'კომპიუტერი არ ირთვება, შავი ეკრანია. დენის კაბელი შევამოწმე.',
            'პრინტერი არ ბეჭდავს, წითლად ანათებს. მგონი ქაღალდი გაიჭედა.',
            'ინტერნეტი ძალიან ნელია, გვერდებს ძლივს ხსნის. როუტერი გადავტვირთე, მაგრამ არ უშველა.',
            'Outlook-ში ვერ შევდივარ, პაროლს მთხოვს მუდმივად.',
            'ეკრანზე უცნაური ფერები გამოჩნდა, მწვანე ხაზები დაყვება. ხომ ვერ დამეხმარებით?',
            'მაუსი არ მუშაობს, რამდენჯერმე გადავტვირთე კომპიუტერი.',
            'ჩემი მონიტორი ციმციმებს, მუშაობა შეუძლებელია. განსაკუთრებით Excel-ში მუშაობისას.',
            'Adobe Photoshop იჭედება და ითიშება ფაილის შენახვისას.',
            'ახალი პროგრამის დაყენება მჭირდება - "Slack".',
            'ვირუსი ამეკიდა მგონი, უცნაური ფანჯრები ჩნდება და კომპიუტერი შენელდა.',
            'Wi-Fi კავშირი წყდება პერიოდულად.',
            'ლურჯი ეკრანი (BSOD) გამოაქვს კომპიუტერს ჩართვისას.',
            'ვერ ვახერხებ VPN-თან დაკავშირებას სახლიდან მუშაობისას.'
        ];

        $aiRecommendations = [
            'სცადეთ კომპიუტერის გადატვირთვა.',
            'შეამოწმეთ კვების კაბელი და დარწმუნდით, რომ ჩართულია.',
            'გათიშეთ და ხელახლა შეაერთეთ პრინტერი.',
            'გადატვირთეთ როუტერი და შეამოწმეთ ინტერნეტის კაბელი.',
            'გამოიყენეთ პაროლის აღდგენის ფუნქცია.',
            'შეამოწმეთ მონიტორის კაბელი, შესაძლოა კონტაქტის ბრალია.',
            'განაახლეთ ვიდეო ბარათის დრაივერი.',
            'გაუშვით ანტივირუსული სკანირება.'
        ];

        $itComments = [
            'პრობლემა მოგვარებულია, კვების ბლოკი იყო დაზიანებული.',
            'პრინტერში გაჭედილი ქაღალდი ამოვიღე, ახლა მუშაობს.',
            'პაროლი აღდგენილია, ახალი პაროლი მეილზე გამოგეგზავნათ.',
            'სისტემა გაიწმინდა ვირუსებისგან, ანტივირუსი განახლდა.',
            'დრაივერი იყო პრობლემა, განვაახლე და გასწორდა.',
            'AI-ს რეკომენდაცია არასწორი იყო, პრობლემა დედაპლატაშია. საჭიროებს შეცვლას.',
            'პრობლემა იყო ქსელის ბარათში, განვაახლე დრაივერი.',
            'მყარი დისკი (SSD) იყო დაზიანებული, შეიცვალა ახლით და გადაეწერა სისტემა.',
            'მომხმარებელს დაეყენა მოთხოვნილი პროგრამა.'
        ];

        for ($i = 0; $i < 100; $i++) {
            $user = $users->random();
            $itUser = $itUsers->random();
            $status = $statuses->random();
            $priority = $priorities->isNotEmpty() ? $priorities->random() : null;

            $wasAiCorrect = rand(0, 3) > 0 ? 1 : 0;
            $itSpecialistComment = ($status->name !== 'Pending' && $status->name !== 'New') ? $itComments[array_rand($itComments)] : null;

            $ticket = UserTicket::create([
                'user_id' => $user->id,
                'status_id' => $status->id,
                'priority_id' => $priority ? $priority->id : null,
                'label' => "Dummy Ticket {$i}",
                'ai_recommendation' => $aiRecommendations[array_rand($aiRecommendations)],
                'was_ai_correct' => $wasAiCorrect,
                'it_specialist_comment' => $itSpecialistComment,
                'created_at' => now()->subDays(rand(0, 30)),
            ]);

            UserAssignedTicket::create(['user_ticket_id' => $ticket->id, 'user_id' => $itUser->id]);

            UserTicketMessage::create([
                'user_ticket_id' => $ticket->id,
                'user_id' => $user->id,
                'message' => $dummyMessages[array_rand($dummyMessages)],
            ]);

            if ($items->count() > 0) {
                $item = $items->random();
                UserTicketItem::create([
                    'user_ticket_id' => $ticket->id,
                    'item_id' => $item->id,
                ]);
            }
        }
    }
}
