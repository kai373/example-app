<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DailyTweetCount extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public User $toUser;
    public int $count;

    /**
     * Create a new message instance.
     */
    public function __construct(User $toUser, int $count)
    {
        $this->toUser = $toUser;
        $this->count = $count;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "昨日は{$this->count}件のつぶやきが追加されました！",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'email.daily_tweet_count',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
