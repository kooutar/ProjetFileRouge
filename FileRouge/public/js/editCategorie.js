


function editModal(id, categorie, parentId) {
  console.log(id, categorie, parentId);
    const modal = document.querySelector('#modaleedit'); 
    const nameInput = modal.querySelector('#categorieName'); 
    const parentInput = modal.querySelector('#categorieParentName'); 
    const form = document.querySelector('#editCategorieForm');
     

    nameInput.value = categorie;
    parentInput.value = parentId;
    form.action = `/updateCategorie/${id}`;   
    modal.style.display = 'block'; 
}

function closeEditModal() {
    const modal = document.querySelector('#modaleedit'); 
    modal.style.display = 'none'; 
}
