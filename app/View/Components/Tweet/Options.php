<?php

namespace App\View\Components\Tweet;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Options extends Component
{
    private int $tweetId;
    private int $userId;
    /**
     * Create a new component instance.
     */
    public function __construct(int $tweetId, int $userId)
    {
        $this->tweetId = $tweetId;
        $this->userId = $userId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tweet.options')
            ->with('tweetId', $this->tweetId)
            ->with('myTweet', \Illuminate\Support\Facades\Auth::id() === $this->userId);
    }
}
