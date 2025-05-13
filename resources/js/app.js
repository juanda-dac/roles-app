import './bootstrap';

function enableCreateNewRoleForm(){
    alert('Create new role form enabled');
}

const modalContainer = document.getElementById('modal-container');
const selectRolePiker = document.getElementById('role');

modalContainer.addEventListener('click', function(e) {
    if(e.target.id === 'modal-container'){
        modalContainer.classList.add('hidden');
    }
})

selectRolePiker.addEventListener('change', function(e) {
    if(e.target.value === 'create-role'){
        selectRolePiker.value = '';
        modalContainer.classList.remove('hidden');
    }
})