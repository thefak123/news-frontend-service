<div>
    <div class="custombox clearfix">
        
        <h4 class="small-title">{{count($comments)}} comments</h4>
        <div class="row">
            
            <div class="col-lg-12">
                @if(count($comments) != 0)
                <div class="comments-list">
                    @foreach ($comments as $comment)
                    <div class="media">
                        
                        <div class="media-body">
                            <h4 class="media-heading user_name">{{$comment['user']['fullName']}}</h4>
                            <p>{{$comment['message']}}</p>
                            
                        </div>
                    </div>
                    @endforeach
                @else  
                    There is no comment yet
                @endif
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
        <livewire:comment-form @saved="$refresh" :newsId="$newsId" />
    </div><!-- end custom-box -->   
</div>
