const no_nik = document.getElementById("input-no-nik");
const no_kk = document.getElementById("input-no-kk");
const no_nik_ayah = document.getElementById("input-no-nik-ayah");
const no_nik_ibu = document.getElementById("input-no-nik-ibu");

no_nik.addEventListener("input", function () {
	check_validation(no_nik);
});
no_kk.addEventListener("input", function () {
	check_validation(no_kk);
});
no_nik_ayah.addEventListener("input", function () {
	check_validation(no_nik_ayah);
});
no_nik_ibu.addEventListener("input", function () {
	check_validation(no_nik_ibu);
});

function check_validation(changeInput) {
	if (changeInput.value.length < 16) {
		changeInput.classList.add("border-danger");
	} else if (changeInput.value.length > 16) {
		changeInput.value = changeInput.value.slice(0, 16);
	} else {
		changeInput.classList.remove("border-danger");
	}
}
