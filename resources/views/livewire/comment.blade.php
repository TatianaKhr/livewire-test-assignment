<div>
    <div>
        <section class="comment-section col-md-6 mx-auto">
            <h2 class="section-title mt-5" data-aos="fade-up">Leave a Comment</h2>
            <form wire:submit.prevent="addComment">
                <div class="form-group mb-2">
                    <div class="box-border text-lg  font-semibold text-indigo-900 uppercase" >
                        Title: <input wire:model.defer="title" type="text" class="form-control"
                           placeholder="Введите имя комментаря"></div>
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-4 mb-2">
                    <div class="box-border text-lg  font-semibold text-indigo-900 uppercase col-md-4 " >
                        Rating⭐:<input wire:model.defer="grade" type="number" min="0" max="5" class="form-control mb-2" placeholder="0"></div>
                    @error('grade') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mb-2">
                    <div class="box-border text-lg font-semibold text-indigo-900 uppercase" >
                        Description:<textarea wire:model.defer="description" class="form-control" rows="3"
                          placeholder="Введите комментарий"></textarea></div>
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-warning">Add Comment</button>
            </form>
        </section>

        <section class="comment-list mb-5  mt-5 col-md-6 mx-auto relative block  overflow-hidden ">
            <h2 class="section-title mb-3">Comments</h2>
            @foreach($comments as $comment)
                <div class="comment-text mb-3">
                             <span>
                                 <div><h6>{{$comment->title}}</h6></div>
                                  <div class="box-border text-lg  font-semibold text-indigo-900 uppercase">
                            Rating: <strong>{{ $comment->grade }}</strong> ⭐
                        </div>
                    {{ $comment->description }}
                </div>
            @endforeach
            <div class="row d-flex justify-content-center" >
                {{ $comments->links() }}
            </div>
        </section>
    </div>
</div>

