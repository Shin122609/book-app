<div class="modal fade" id="deletePriorityModal" tabindex="-1" aria-labelledby="deletePriorityModalLabel">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="deletePriorityModalLabel"></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
             </div>
             <div class="modal-footer">
                 <form action="" method="post" name="deletePriorityForm">
                     @csrf
                     @method('delete')
                     <button type="submit" class="btn btn-danger">削除</button>
                 </form>
             </div>
         </div>
     </div>
</div>