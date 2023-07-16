<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class applicationReceivedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $jobTitle;
    public $candidateName;
    public $recruiter;
    public $candidateEmail;
    public $recruiterEmail;
    /**
     * Create a new message instance.
     */
    public function __construct($jobTitle, $candidateName, $candidateEmail, $recruiter, $recruiterEmail)
    {
        $this->jobTitle = $jobTitle;
        $this->candidateName = $candidateName;
        $this->recruiter = $recruiter;
        $this->candidateEmail = $candidateEmail;
        $this->recruiterEmail = $recruiterEmail;
    }

    /**
     * Get the message envelope.
     */
    public function build(){
        return $this
            ->subject('Application Received')
            ->view('email.applicationReceived')
            ->from($this->recruiterEmail)
            ->to($this->candidateEmail)
            ->with([
                'candidate_name' => $this->candidateName,
                'job_title' => $this->jobTitle,
                'organisation_name' => $this->recruiter
            ]);
    }
}
