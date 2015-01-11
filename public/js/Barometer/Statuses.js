if (undefined==window.Barometer) window.Barometer = {};

Barometer.Statuses = {

	reportInTargetElement : "[data-role='fragment-container']",

	loadReportIn : function(e) {
		e.preventDefault();
		$.ajax({
			url : "/status",
			type : "get",
			dataType : "html",
			success : function(output) {
				$(Barometer.Statuses.reportInTargetElement).html(output).hide().slideDown("medium", function() {
					Barometer.Statuses.initCreator();
				});
			}

		});
	},

	initCreator : function() {
		var pickers = $("[data-role='status-picker']");
		pickers.unbind("click").bind("click", Barometer.Statuses.updateStatus);
		$('[data-role="scheme-select"]').on("change", function() {
			$('[data-role="status-picker-container"]').slideUp("fast");
			$('[data-role="status-picker-container"] button').remove();
			Barometer.Statuses.loadStatusPickers($(this).find("option:selected").val());
		});
	},

	loadStatusPickers : function(selectedStatus) {
		if (undefined==selectedStatus) console.log("No scheme passed to load status pickers");
		$.ajax({
			url : "/scheme/"+selectedStatus,
			type : "get",
			dataType : "json",
			success : function(output) {
				$(output.statuses).each(function(index, element) {
					var button = $('<button data-role="status-picker" data-status-id="'+element.id+'" class="status-button">'+element.caption+"</button>");
					var image = $('<img src="'+(element.imageURL==undefined ? "/img/status-image.jpg" : element.imageURL)+'" />');
					button.prepend(image);
					button.on("click", Barometer.Statuses.updateStatus);
					$('[data-role="status-picker-container"]').append(button);
				});
				$('[data-role="status-picker-container"]').slideDown();
			}
		});
	},

	updateStatus : function(e) {
		e.preventDefault();
		$(e.target).addClass("selected");
		$(e.target).closest("div").find("[data-role='"+$(e.target).data("role")+"']").css("opacity", "1").not(this).css("opacity", "0.4");
	}

}