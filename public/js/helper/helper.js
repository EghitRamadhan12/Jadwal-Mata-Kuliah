
function successCreateAlert(message) {
    return Swal.fire({
        icon: 'success',
        title: '<span style="font-size: 30px" class="text-success">Berhasil</span>',
        text: 'Berhasil ditambahkan',
        showConfirmButton: true,
        confirmButtonText: 'Oke',
        background: "#003153",
        padding: '2em',
        color: "green",
        width: 400,
        timer: 1500,
        customClass: {
            icon: 'small-icon',
            title: 'small-title',
            content: 'small-content',
            confirmButton: "btn btn-primary btn-lg",
        }
    });
}

function successUpdateAlert() {
    return Swal.fire({
        icon: 'success',
        title: '<span style="font-size: 30px" class="text-success">Berhasil</span>',
        text: 'Berhasil mengubah data!',
        showConfirmButton: true,
        confirmButtonText: 'Oke',
        background: "#003153",
        padding: '2em',
        color: "green",
        width: 400,
        timer: 1500,
        customClass: {
            icon: 'small-icon',
            title: 'small-title',
            content: 'small-content',
            confirmButton: "btn btn-primary btn-lg",
        }
    });
}

function successDeleteAlert() {
    return Swal.fire({
        icon: 'success',
        title: '<span style="font-size: 30px" class="text-success">Berhasil</span>',
        text: 'Berhasil menghapus data!',
        showConfirmButton: true,
        confirmButtonText: 'Oke',
        background: "#003153",
        padding: '2em',
        color: "green",
        width: 400,
        timer: 1500,
        customClass: {
            icon: 'small-icon',
            title: 'small-title',
            content: 'small-content',
            confirmButton: "btn btn-primary btn-lg",
        }
    });
}

function reloadBrowser() {
    window.location.reload();
}

function errorAlert() {
    Swal.fire({
        icon: 'error',
        title: '<span style="font-size: 30px" class="text-danger">Kesalahan</span>',
        text: 'Terjadi kesalahan!',
        showConfirmButton: false,
        timer: 1500
    });
}

function warningAlert() {
    Swal.fire({
        icon: 'warning',
        title: '<span style="font-size: 30px" class="text-warning">Perhatian</span>',
        text: 'Periksa inputan anda!',
        showConfirmButton: true,
        confirmButtonText: 'Oke',
        timer: 2500,
        background: "#003153",
        padding: '2em',
        color: "gold",
        width: 400,
        timer: 1500,
        customClass: {
            icon: 'small-icon',
            title: 'small-title',
            content: 'small-content',
            confirmButton: "btn btn-primary btn-lg",
        }
    });
}

function confirmDeleteAlert() {
    return Swal.fire({
        icon: 'info',
        title: '<span style="font-size: 30px" class="text-primary">Perhatian</span>',
        text: 'Anda tidak dapat mengembalikan ini!',
        showCancelButton: true,
        reverseButtons: false,
        background: "#003153",
        cancelButtonText: 'Batal!',
        confirmButtonText: 'hapus!',
        padding: '3em',
        color: "red",
        width: 500,
        customClass: {
            icon: 'small-icon',
            title: 'small-title',
            content: 'small-content',
            confirmButton: "btn btn-primary btn-lg",
            cancelButton: "btn btn-danger btn-lg",
        }
    });
}

function cancelDelete() {
    return swal.fire({
        title: "Dibatalkan",
        text: "Data tidak terhapus :)",
        icon: "error",
        timer: 1500,
        confirmButton: true,
        background: "#003153",
        padding: '2em',
        color: "green",
        width: 400,
        timer: 1500,
        customClass: {
            icon: 'small-icon',
            title: 'small-title',
            content: 'small-content',
            confirmButton: "btn btn-primary btn-lg",
        }
    });
}


function existAlert() {
    return Swal.fire({
        icon: 'warning',
        title: '<span style="font-size: 30px" class="text-warning">Perhatian</span>',
        text: 'Catatan sudah ada',
        showConfirmButton: true,
        confirmButtonText: 'Oke',
        timer: 2500,
        background: "#003153",
        padding: '2em',
        color: "green",
        width: 400,
        timer: 1500,
        customClass: {
            icon: 'small-icon',
            title: 'small-title',
            content: 'small-content',
            confirmButton: "btn btn-primary btn-lg",
            cancelButton: "btn btn-danger btn-lg",
        }
    });
}

function relationAlert() {
    return Swal.fire({
        icon: 'warning',
        title: '<span style="font-size: 30px" class="text-warning">Perhatian</span>',
        text: 'Data sedang digunakan ditabel lain!',
        showConfirmButton: true,
        confirmButtonText: 'Oke',
        timer: 2500,
        background: "#003153",
        padding: '2em',
        color: "green",
        width: 400,
        timer: 1500,
        customClass: {
            icon: 'small-icon',
            title: 'small-title',
            content: 'small-content',
            confirmButton: "btn btn-primary btn-lg",
        }
    });
}

