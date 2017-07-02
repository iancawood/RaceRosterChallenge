// Source of country and states date: http://www.cssscript.com/generic-country-state-dropdown-list-countries-js/

$(document).ready(function() {
	populateCountries("country", "prov");

	$("#create-account-form").submit(function(e){
		e.preventDefault();

		// validate POSTAL CODE

		// AJAX
	});

	$("#country").change(function() {
		if ($("#country :selected").val() === "Canada") {
			$("#postal").parent().removeClass("hide");
		} else {			
			$("#postal").parent().addClass("hide");
		}
	});
});
