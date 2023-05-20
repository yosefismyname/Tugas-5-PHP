
function hapusData(id) {
    if (confirm('Apakah Anda yakin ingin menghapus baris ini?')) {
        window.location.href = 'hapus.php?id=' + id;
    }
}

function editData(id) {
    if (confirm('Apakah Anda yakin ingin mengedit baris ini?')) {
        window.location.href = 'edit.php?id=' + id;
    }
}

function coretData(id) {
    var inputElement = document.getElementById("input_" + id);
    if (inputElement) {
        inputElement.style.textDecoration = "line-through";
    }
}