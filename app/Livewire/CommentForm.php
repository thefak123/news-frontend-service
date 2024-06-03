<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CommentForm extends Component
{
    public $message;
    public $newsId;

    public function render()
    {
        return view('livewire.comment-form');
    }

    

    public function createComment(){
        $token = session('token');

        if($token != null){
            
            $response = Http::withToken(session("token"))->post('http://localhost:9000/comments', ["message" => $this->message, "newsId" => $this->newsId, "senderId" => null]);
            
            if($response->status() == 503){
                session()->flash('error', 'The comment service is unavailable please try again later');
            }else if($response->status() == 401){
                session()->flush();
                session()->flash('error', 'Please login again, because token is expired');
            }else{
                session()->flash('success', 'Comment is created');
                $this->dispatch('saved');
                $this->dispatch('refreshToken');
            }
            
        }else{
            session()->flash('error', 'Please login to make a comment');
        }
        
    }
}
