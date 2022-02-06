(function($){
	$(document).ready(function() {
		mkdfInitSelectChange();
        mkdfInitIconSelectChange();
        mkdfInitRadioChange();
	});

	function mkdfInitSelectChange() {
		$(document).on('change', 'select.dependence', function (e) {
			var optionSelected = $("option:selected", this);
			var valueSelected = this.value.replace(/ /g, '');
			$($(this).data('hide-'+valueSelected)).fadeOut();
			$($(this).data('show-'+valueSelected)).fadeIn();
		});
	}

    function mkdfInitIconSelectChange() {
        $(document).on('change', 'select.icon-dependence', function (e) {
            var valueSelected = this.value.replace(/ /g, '');

            $('.row.mkdf-icon-collection-holder').fadeOut();
            $('.row.mkdf-icon-collection-holder[data-icon-collection="' + valueSelected + '"]').fadeIn();
        });
    }

    function mkdfInitRadioChange() {
        $(document).on('change', 'input[type="radio"].dependence', function () {
            var dataHide = $(this).data('hide');
            var dataShow = $(this).data('show');
            if(typeof(dataHide)!== 'undefined' && dataHide !== '') {
                var elementsToHide = dataHide.split(',');
                $.each(elementsToHide, function(index, value) {
                    $(value).fadeOut();
                });
            }

            if(typeof(dataShow)!== 'undefined' && dataShow !== '') {
                var elementsToShow = dataShow.split(',');
                $.each(elementsToShow, function(index, value) {
                    $(value).fadeIn();
                });
            }
        });
    }
})(jQuery);
