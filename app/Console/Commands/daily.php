<?php

namespace App\Console\Commands;

use App\Event;
use App\News;
use App\User;
use Illuminate\Console\Command;

class daily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command check daily missions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //check expire events

        $events = Event::where('to_date', '<=', time())->latest()->get();
        foreach ($events as $event) {
            if ((time() - $event->to_date) <= 86400) {
                $text = $event->detail . "<br>" . "<p>" . $event->course_headings . "</p>";
                $news = new News([
                    'title' => $event->title,
                    'description' => $event->description,
                    'detail' => $text,
                    'photo' => $event->photo
                ]);
                $news->save();
            }
        }
        // check expire users

        \DB::table('users')
            ->where('expire', '<=', time())
            ->where('active', 2)
            ->update(['active' => 3]);

        // reminder
    }
}
