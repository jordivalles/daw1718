// ESCOLTADORS D'ESDEVENIMENTS
$(document).ready(principal);

function principal(){
	var dateToday = new Date();
	var dates = $("#fdate").datepicker({
		changeMonth: true,
		numberOfMonths: 3,
		minDate: dateToday,
		onSelect: function(selectedDate) {
			var option = this.id == "from" ? "minDate" : "maxDate",
				instance = $(this).data("datepicker"),
				date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
			dates.not(this).datepicker("option", option, date);
		}
	});
}