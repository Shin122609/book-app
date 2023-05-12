<div class="modal fade" id="editBookModal{{ $book->id }}" tabindex="-1" aria-labelledby="editBookModalLabel{{ $book->id }}">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editBookModalLabel{{ $book->id }}">書籍の編集</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
             </div>
             <form action="{{ route('genres.books.update', [$genre, $book]) }}" method="post">
                 @csrf
                 @method('patch')  
                 <div class="modal-body">
                    <input type="text" class="form-control" name="title" value="{{ $book->title }}">                                         
                     <div class="d-flex flex-wrap">
                     @foreach ($priorities as $priority)                            
                             <label>  
                                 <div class="d-flex align-items-center mt-3 me-3">
                                     @if ($book->priorities()->where('priority_id', $priority->id)->exists())
                                         <input type="checkbox" name="priority_ids[]" value="{{ $priority->id }}" checked>
                                     @else
                                         <input type="checkbox" name="priority_ids[]" value="{{ $priority->id }}">
                                     @endif                                    
                                     <span class="badge bg-secondary ms-1 fw-light">{{ $priority->level }}</span>
                                 </div>                                                   
                             </label>                                                       
                         @endforeach    
                     </div>   
                    </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">更新</button>
                 </div>
             </form>
         </div>
     </div>
 </div>