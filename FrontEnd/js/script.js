// Source of country and states date: http://www.cssscript.com/generic-country-state-dropdown-list-countries-js/

$(document).ready(function() {
	populateCountries("country", "prov");

	var validateRequired = function() {
		var error = false;

		$(".required-field").each(function() {
			if ($(this).val().length == 0) {
				error = true;
				$(this).parent().addClass("has-error");
			} else {
				$(this).parent().removeClass("has-error");
			}
		});

		return error;
	};

	var validatePostal = function() {
		var error = false;

		if ($("#country :selected").val() === "Canada") {
			var reg = /[ABCEGHJKLMNPRSTVXY][0-9][ABCEGHJKLMNPRSTVWXYZ] ?[0-9][ABCEGHJKLMNPRSTVWXYZ][0-9]/;
			var postal = $("#postal");
			
			if (reg.test(postal.val().toUpperCase())) {				
				postal.parent().removeClass("has-error");
			} else {
				error = true;								
				postal.parent().addClass("has-error");
			}
		}

		return error;
	};

	$("#create-account-form").submit(function(e){
		e.preventDefault();

		var requiredError = validateRequired();
		var postalError = validatePostal();

		if (!requiredError && !postalError) {
			console.log("Handle ajax here");
		}
	});

	$("#country").change(function() {
		if ($("#country :selected").val() === "Canada") {
			$("#postal").parent().removeClass("hide");
		} else {			
			$("#postal").parent().addClass("hide");
		}
	});
});
