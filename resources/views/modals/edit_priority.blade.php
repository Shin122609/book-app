<div class="modal fade" id="editPriorityModal" tabindex="-1" aria-labelledby="editPriorityModalLabel">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editPriorityModalLabel">優先度の編集</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
             </div>
             <form action="" method="post" name="editPriorityForm">
                 @csrf
                 @method('patch')                                                                    
                 <div class="modal-body">
                     <input type="text" class="form-control" name="level" value="">
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">更新</button>
                 </div>   
             </form>             
         </div>
     </div>
</div>