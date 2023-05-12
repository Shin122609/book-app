<!-- 優先度の編集用モーダル -->
@include('modals.edit_priority')
 
 <!-- 優先度の削除用モーダル -->
 @include('modals.delete_priority')
<div class="modal fade" id="addPriorityModal" tabindex="-1" aria-labelledby="addPriorityModalLabel">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addPriorityModalLabel">優先度の追加</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
             </div>
             <form action="{{ route('priorities.store') }}" method="post">
                 @csrf
                 <div class="modal-body">
                     <input type="text" class="form-control" name="level">
                    <div class="d-flex flex-wrap">
                        @foreach ($priorities as $priority)
                            <div class="d-flex align-items-center mt-3 me-3">                            
                                 <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editPriorityModal" data-bs-dismiss="modal" data-priority-id="{{ $priority->id }}" data-priority-level="{{ $priority->level }}">{{ $priority->level }}</button>
                                 <button type="button" class="btn-close ms-1" aria-label="削除" data-bs-toggle="modal" data-bs-target="#deletePriorityModal" data-bs-dismiss="modal" data-priority-id="{{ $priority->id }}" data-priority-level="{{ $priority->level }}"></button>                                                 
                             </div>
                        @endforeach 
                    </div>
                </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">登録</button>
                 </div>
             </form>
         </div>
     </div>
 </div>