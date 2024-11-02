<?php

namespace App\Models;

use App\Mail\SendMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
    ];
    public function insert($email): string
    {
        try {
            $newsletter = new self();
            $newsletter->email = $email;
            $newsletter->save();
                $details = [
                    'email' => $email,
                    'title' => 'News from HorizonHotel.com',
                    'body' => 'Thank you for subscribing to our newsletter'
                ];
                Mail::to($email)->send(new \App\Mail\Newsletter($details));
                return  "You have successfully subscribed to our newsletter. We hope you enjoy our news!";
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return "An error occurred. Please try again later.";
        }
    }
    public function getNewslettersAdmin(): object
    {
        return Newsletter::paginate(6);
    }
    public function deleteNewsletter($id): void
    {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
    }
}
