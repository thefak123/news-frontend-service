<div>
    
        
            @if(session("CommentListError"))
            <div class="alert alert-danger">
                Comment Service is unavailable, please try again later
            </div>
            @else
            @if(session()->has("token"))
            <h4 class="small-title">Leave a Reply</h4>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-wrapper">
                
                        <textarea class="form-control" placeholder="Your comment" wire:model="message"></textarea>
                        <button type="button" class="btn btn-primary" wire:click="createComment" >Submit Comment</button>
                    </form>
                </div>
            </div>
            @else 
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <h4>Login first, before making a comment</h1>
                </div>
            </div>
            @endif
        
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    
</div>
