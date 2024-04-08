<?php

namespace App\Console\Commands;
use App\Models\User;
use App\Models\News;
use App\Mail\NewsNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

class NewsNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:news-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $receivers = News::where('news_date', now()->toDateString())
        ->get();

        foreach ($receivers as $receiver) {
            $grades = explode(',', $receiver->grades);
            foreach ($grades as $grade) {
                $users = User::where('c_grade', $grade)
                    ->get();
                foreach ($users as $user) {
                    $this->sendNewsNotification($user, $receiver);
                }
            }
        }
    }

    public function sendNewsNotification($user, $receiver)
    {
        $mailData = [
            'news_date' => $receiver -> news_date,
            'news_title' => $receiver -> news_title,
            'news_content' => $receiver -> news_content,
        ];

        Mail::to($user -> email)->send(new NewsNotification($mailData));
    }
}
