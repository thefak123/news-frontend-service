<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\On; 
class CommentList extends Component
{
    public $newsId;

    public function render()
    {
        $response = Http::get('http://localhost:9000/comments', [
            "newsid" => $this->newsId
        ]);

        if($response->status() == 503){
            session()->flash('CommentListError', 'The comment service is unavailable please try again later');
        }else if($response->status() == 200){
            session()->flash('CommentListSuccess', 'The comment service is available');
        }else{
            session()->flash('CommentListError', 'There is something wrong');
        }
    
        return view('livewire.comment-list', ["comments" => $response->json("data") ?? []]);
    }
    
}
