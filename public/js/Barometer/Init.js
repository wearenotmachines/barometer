if (undefined==window.Barometer) window.Barometer = {};

Barometer.init = function() {

	$(document).ready(function() {

		console.log("Kick Off");
		$("[data-role='report-in-trigger']").on("click", Barometer.Statuses.loadReportIn);


	});


}

Barometer.init();