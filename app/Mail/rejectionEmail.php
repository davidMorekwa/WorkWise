<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class rejectionEmail extends Mailable
{
    public $jobTitle;
    public $candidateName;
    public $recruiter;
    public $candidateEmail;
    public $recruiterEmail;

    public function __construct($jobTitle, $candidateName, $candidateEmail, $recruiter, $recruiterEmail)
    {
        $this->jobTitle = $jobTitle;
        $this->candidateName = $candidateName;
        $this->recruiter = $recruiter;
        $this->candidateEmail = $candidateEmail;
        $this->recruiterEmail = $recruiterEmail;
    }
    public function build()
    {
        return $this->subject('Job Application '.$this->jobTitle)
            ->view('email.reject')
            ->from($this->recruiterEmail)
            ->to($this->candidateEmail)
            ->with([
                'position_title' => $this->jobTitle,
                'candidate_name' => $this->candidateName,
                'recruiter' => $this->recruiter
            ]);
    }
}
