console.log("Javascript berhasil.");

const toggleButton = document.querySelector("#toggleTips");
const formTips = document.querySelector("#formTips");
const customerForm = document.querySelector("#customerForm");
const nameInput = document.querySelector("#name");
const emailInput = document.querySelector("#email");
const nameFeedback = document.querySelector("#nameFeedback");
const emailFeedback = document.querySelector("#emailFeedback");
const noHpInput = document.querySelector("#No_Hp");
const noHpFeedback = document.querySelector("#No_HpFeedback");
const nikInput = document.querySelector("#NIK");
const nikFeedback = document.querySelector("#NIKFeedback");
const alamatInput = document.querySelector("#alamat");
const alamatFeedback = document.querySelector("#alamatFeedback");
const provinsiInput = document.querySelector("#provinsi");
const provinsiFeedback = document.querySelector("#provinsiFeedback");
const kotaInput = document.querySelector("#kota");
const kotaFeedback = document.querySelector("#kotaFeedback");
const kabupatenInput = document.querySelector("#kabupaten");
const kabupatenFeedback = document.querySelector("#kabupatenFeedback");
const kodePosInput = document.querySelector("#kode-pos");
const kodePosFeedback = document.querySelector("#kode-posFeedback");
const tempatLahirInput = document.querySelector("#tempat-lahir");
const tempatLahirFeedback = document.querySelector("#tempat-lahirFeedback");
const tanggalLahirInput = document.querySelector("#tanggal-lahir");
const tanggalLahirFeedback = document.querySelector("#tanggal-lahirFeedback");
const namaOrtuInput = document.querySelector("#nama-ortu");
const namaOrtuFeedback = document.querySelector("#nama-ortuFeedback");
const formMessage = document.querySelector("#formMessage");

toggleButton.addEventListener("click", function() {
    formTips.hidden=!formTips.hidden;

    //Jika formTips hidden, maka ubah textContent toggleButton menjadi "Tampilkan Petunjuk", jika tidak maka ubah menjadi "Sembunyikan Petunjuk"
    toggleButton.textContent = formTips.hidden ? "Tampilkan Petunjuk" : "Sembunyikan Petunjuk";
});

nameInput.addEventListener("input", function() {
    if (nameInput.value.trim() === "") {
        nameFeedback.textContent = "Nama tidak boleh kosong.";
    }else{
        nameFeedback.textContent = "Nama Sudah di isi";
    }
});

emailInput.addEventListener("input", function() {
    if (emailInput.value.trim() === "") {
        emailFeedback.textContent = "Email tidak boleh kosong.";
    }else if(!emailInput.validity.valid){
        emailFeedback.textContent = "Email tidak valid.";
    }else{
        emailFeedback.textContent = "Email Sudah di isi";
    }
});

// Umpan balik langsung saat mengetik untuk field lainnya.
[
    [noHpInput, noHpFeedback, "No.Hp"],
    [nikInput, nikFeedback, "NIK"],
    [alamatInput, alamatFeedback, "Alamat"],
    [provinsiInput, provinsiFeedback, "Provinsi"],
    [kotaInput, kotaFeedback, "Kota"],
    [kabupatenInput, kabupatenFeedback, "Kabupaten"],
    [kodePosInput, kodePosFeedback, "Kode Pos"],
    [tempatLahirInput, tempatLahirFeedback, "Tempat Lahir"],
    [tanggalLahirInput, tanggalLahirFeedback, "Tanggal Lahir"],
    [namaOrtuInput, namaOrtuFeedback, "Nama Orang Tua"]
].forEach(function ([input, feedback, label]) {
    function cek() {
        feedback.textContent = input.value.trim() === ""
            ? label + " tidak boleh kosong."
            : label + " Sudah di isi";
    }
    input.addEventListener("input", cek);
    input.addEventListener("change", cek);
});

// Bersihkan semua pesan saat form di-reset.
customerForm.addEventListener("reset", function () {
    document.querySelectorAll(".feedback").forEach(function (el) {
        el.textContent = "";
    });
    formMessage.textContent = "";
});

customerForm.addEventListener("submit", function (event) {
    let hasError = false;

    nameFeedback.textContent = "";
    emailFeedback.textContent = "";
    formMessage.textContent = "";

    if (nameInput.value.trim() == "") {
        event.preventDefault();
        nameFeedback.textContent = "Nama tidak boleh kosong.";
        hasError = true;
    }else{
        nameFeedback.textContent = "Nama Sudah di isi";
    }

    if (emailInput.value.trim() == "" || !emailInput.validity.valid) {
        event.preventDefault();
        emailFeedback.textContent = "Email wajib diisi dan pastikan formatnya benar.";
        hasError = true;
    }else{
        emailFeedback.textContent = "Email Sudah di isi";
    }

    if (noHpInput.value.trim() == "") {
        event.preventDefault();
        noHpFeedback.textContent = "No.Hp tidak boleh kosong.";
        hasError = true;
    }else{
        noHpFeedback.textContent = "No.Hp Sudah di isi";
    }

    if (nikInput.value.trim() == "") {
        event.preventDefault();
        nikFeedback.textContent = "NIK tidak boleh kosong.";
        hasError = true;
    }else{
        nikFeedback.textContent = "NIK Sudah di isi";
    }

    if (alamatInput.value.trim() == "") {
        event.preventDefault();
        alamatFeedback.textContent = "Alamat tidak boleh kosong.";
        hasError = true;
    }else{
        alamatFeedback.textContent = "Alamat Sudah di isi";
    }

    if (provinsiInput.value.trim() == "") {
        event.preventDefault();
        provinsiFeedback.textContent = "Provinsi tidak boleh kosong.";
        hasError = true;
    }else{
        provinsiFeedback.textContent = "Provinsi Sudah di isi";
    }

    if (kotaInput.value.trim() == "") {
        event.preventDefault();
        kotaFeedback.textContent = "Kota tidak boleh kosong.";
        hasError = true;
    }else{
        kotaFeedback.textContent = "Kota Sudah di isi";
    }

    if (kabupatenInput.value.trim() == "") {
        event.preventDefault();
        kabupatenFeedback.textContent = "Kabupaten tidak boleh kosong.";
        hasError = true;
    }else{
        kabupatenFeedback.textContent = "Kabupaten Sudah di isi";
    }

    if (kodePosInput.value.trim() == "") {
        event.preventDefault();
        kodePosFeedback.textContent = "Kode Pos tidak boleh kosong.";
        hasError = true;
    }else{
        kodePosFeedback.textContent = "Kode Pos Sudah di isi";
    }

    if (tempatLahirInput.value.trim() == "") {
        event.preventDefault();
        tempatLahirFeedback.textContent = "Tempat Lahir tidak boleh kosong.";
        hasError = true;
    }else{
        tempatLahirFeedback.textContent = "Tempat Lahir Sudah di isi";
    }

    if (tanggalLahirInput.value.trim() == "") {
        event.preventDefault();
        tanggalLahirFeedback.textContent = "Tanggal Lahir tidak boleh kosong.";
        hasError = true;
    }else{
        tanggalLahirFeedback.textContent = "Tanggal Lahir Sudah di isi";
    }

    if (namaOrtuInput.value.trim() == "") {
        event.preventDefault();
        namaOrtuFeedback.textContent = "Nama Orang Tua tidak boleh kosong.";
        hasError = true;
    }else{
        namaOrtuFeedback.textContent = "Nama Orang Tua Sudah di isi";
    }

    if (hasError) {
        formMessage.textContent = "Perbaiki Input yg masih salah.";
    }else{
        formMessage.textContent = "Data sudah bisa diproses.";
    }


});