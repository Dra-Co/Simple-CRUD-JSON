const checkboxes = document.querySelectorAll('input[type=checkbox]')
checkboxes.forEach(checkbox => {
    checkbox.onclick = function() {
        this.parentNode.submit()
    }
})
const getNewName = (elem) => {
        no = elem.value,
        old_name = document.getElementById("old_name" + no).value,
        new_name = prompt("New data name : ", old_name)
        document.getElementById("new_name" + no).value = new_name
    }