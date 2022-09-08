<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserApplicated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels, InteractsWithQueue;

    public $application;

    public $tries = 15; // Max tries

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($project_id, $user_id)
    {
        $this->application = Application::where('project_id', $project_id)->where('user_id', $user_id)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Applicant applied to your Project!')->view('emails.userapplicated')->with(['application' => $this->application]);
    }
}
