<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FollowUp;
use App\Models\User;
use App\Notifications\FollowUpReminder;
use Carbon\Carbon;

class SendFollowUpNotifications extends Command
{
    protected $signature = 'followup:notify';
    protected $description = 'Send notifications for upcoming follow-ups';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now(); // Current time
        $upcomingFollowUps = FollowUp::whereBetween('reminder_date', [
            $now->format('Y-m-d H:i:00'),  // Start from current time (seconds ignored)
            $now->addMinutes(5)->format('Y-m-d H:i:59') // Next 5 minutes window
        ])
            ->where('status', 'pending')
            ->get();

        foreach ($upcomingFollowUps as $followUp) {
            $user = User::find($followUp->user_id);
            if ($user) {
                $user->notify(new FollowUpReminder($followUp));
                $this->info("Notification sent to User ID: {$user->id} for Follow-Up: {$followUp->title}");
            }
        }

        $this->info('Follow-up notifications processed.');
    }

}
