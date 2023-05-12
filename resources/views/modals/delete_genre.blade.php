<div class="modal fade" id="deleteGenreModal{{ $genre->id }}" tabindex="-1" aria-labelledby="deleteGenreModalLabel{{ $genre->id }}">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-kind" id="deleteGenreModalLabel{{ $genre->id }}">「{{ $genre->kind }}」を削除してもよろしいですか？</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
             </div>
             <div class="modal-footer">
                 <form action="{{ route('genres.destroy', $genre) }}" method="post">
                     @csrf
                     @method('delete')
                     <button type="submit" class="btn btn-danger">削除</button>
                 </form>
             </div>
         </div>
     </div>
 </div>