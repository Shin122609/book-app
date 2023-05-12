<div class="modal fade" id="addBookModal{{ $genre->id }}" tabindex="-1" aria-labelledby="addBookModalLabel{{ $genre->id }}">
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addBookModalLabel{{ $genre->id }}">書籍の追加</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
             </div>
             <form action="{{ route('genres.books.store', $genre) }}" method="post">
                 @csrf
                 <div class="modal-body">
                     <input type="text" class="form-control" name="title">                                    
                     <div class="d-flex flex-wrap">
                         @foreach ($priorities as $priority)                            
                             <label>  
                                 <div class="d-flex align-items-center mt-3 me-3">
                                     <input type="checkbox" name="priority_ids[]" value="{{ $priority->id }}">                            
                                     <span class="badge bg-secondary ms-1">{{ $priority->level }}</span>
                                 </div>                                                   
                             </label>                                                       
                         @endforeach    
                     </div>     </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">登録</button>
                 </div>
             </form>
         </div>
     </div>
</div>