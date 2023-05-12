 //優先度の編集用フォーム
 const editPriorityForm = document.forms.editPriorityForm;
 
 //優先度の削除用フォーム
 const deletePriorityForm = document.forms.deletePriorityForm;
 
 // 削除の確認メッセージ
 const deleteMessage = document.getElementById('deletePriorityModalLabel');
 
 //優先度の編集用モーダルを開くときの処理
 document.getElementById('editPriorityModal').addEventListener('show.bs.modal', (event) => {
   let priorityButton = event.relatedTarget;
   let priorityId = priorityButton.dataset.priorityId;
   let priorityLevel = priorityButton.dataset.priorityLevel;
 
   editPriorityForm.action = `priorities/${priorityId}`;
   editPriorityForm.level.value = priorityLevel;
 });
 
 //優先度の削除用モーダルを開くときの処理
 document.getElementById('deletePriorityModal').addEventListener('show.bs.modal', (event) => {
   let deleteButton = event.relatedTarget;
   let priorityId = deleteButton.dataset.priorityId;
   let priorityLevel = deleteButton.dataset.priorityLevel;
 
   deletePriorityForm.action = `priorities/${priorityId}`;
   deleteMessage.textContent = `「${priorityLevel}」を削除してもよろしいですか？`
 });