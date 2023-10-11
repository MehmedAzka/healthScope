function edit() {
    var inputFields = document.querySelectorAll(".inputField");
    var editButton = document.querySelector(".edit-button");

    // Menggunakan flag untuk mengecek apakah setidaknya satu input tidak kosong
    var isNotEmpty = Array.from(inputFields).some(function (inputField) {
        return inputField.value.trim() !== "";
    });

    if (isNotEmpty) {
        editButton.style.display = "block";
    } else {
        editButton.style.display = "none";
    }
}
