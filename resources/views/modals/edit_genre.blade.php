<div class="modal fade" id="editGenreModal{{ $genre->id }}" tabindex="-1" aria-labelledby="editGenreModalLabel{{ $genre->id }}">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-kind" id="editGenreModalLabel{{ $genre->id }}">ジャンルの編集</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
             </div>
             <form action="{{ route('genres.update', $genre) }}" method="post">
                 @csrf
                 @method('patch')                                                                    
                 <div class="modal-body">
                     <input type="text" class="form-control" name="kind" value="{{ $genre->kind }}">
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">更新</button>
                 </div>   
             </form>             
         </div>
     </div>
 </div>