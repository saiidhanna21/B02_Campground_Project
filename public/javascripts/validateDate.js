(() => {
	var date1Input = document.getElementById('start_date');
	var date2Input = document.getElementById('end_date');

	date1Input.addEventListener('change', function () {
		var date1Value = new Date(date1Input.value);
		var maxDate2Value = new Date(
			date1Value.getFullYear(),
			date1Value.getMonth(),
			date1Value.getDate() + 14
		);
		date2Input.setAttribute('min', date1Input.value);
		date2Input.setAttribute('max', maxDate2Value.toISOString().slice(0, 10));
		if (date2Input.value) {
			validateDate2();
		}
	});

	date2Input.addEventListener('change', validateDate2);

	function validateDate2() {
		var date1Value = new Date(date1Input.value);
		var date2Value = new Date(date2Input.value);
		var maxDate2Value = new Date(
			date1Value.getFullYear(),
			date1Value.getMonth(),
			date1Value.getDate() + 14
		);
		if (date2Value < date1Value || date2Value > maxDate2Value) {
			date2Input.classList.add('is-invalid');
			date2Input.classList.remove('is-valid');
		} else {
			date2Input.classList.add('is-valid');
			date2Input.classList.remove('is-invalid');
		}
	}
})();
