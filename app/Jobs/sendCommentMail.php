<?php

namespace App\Jobs;

use App\Mail\ColumnCommentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class sendCommentMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $param;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($param)
    {
        $this->param = $param;
    }

    /**
     * 記事に付いたコメントの内容をメールする
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($_ENV['MAIL_USERNAME'])
            ->send(new ColumnCommentMail($this->param));
    }
}
