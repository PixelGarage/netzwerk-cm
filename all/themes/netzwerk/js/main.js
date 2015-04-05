(function ($) {
	$(document).ready(function() {
		$('body').data('zoom_level', 1);
		$('#contrast_toggle').click(function() {
			$('body').toggleClass('contraste_on');
		});
		$('#block-block-1 .content a#zoom_in, #block-block-1 .content a#zoom_out').click(function() {
			var step = this.id == 'zoom_in' ? 0.1 : -0.1;
			var current = $('body').data('zoom_level');
			if (current + step >= 1 && current + step <= 1.3) {
				$('#zoom_wrapper').css({
					'transform-origin': '50% 0%',
					'-ms-transform-origin': '50% 0%',
					'-moz-transform-origin': '50% 0%',
					'-webkit-transform-origin': '50% 0%',
					'-o-transform-origin': '50% 0%',
					'transform' : 'scale(' + (current + step) + ')',
					'-ms-transform' : 'scale(' + (current + step) + ')',
					'-moz-transform' : 'scale(' + (current + step) + ')',
					'-webkit-transform' : 'scale(' + (current + step) + ')',
					'-o-transform' : 'scale(' + (current + step) + ')',
				});
				$('body').data('zoom_level', current + step);
			}
			return false;
		});
		$('#block-user-login h2.block-title').click(function() {
			$(this).toggleClass('expanded').next('.content').slideToggle();
		}).append('<span />');
		if ($('body').hasClass('node-type-page') || $('body').hasClass('node-type-veranstaltungen') || $('body').hasClass('page-mitgliedschaften')) {
			$('.field.field-name-field-fotos .field-items').atteeeeention({
				margin: 20
			});
			var selectedTab = 0;
			var match = /#\w+$/.exec(document.location.toString());
			if (match != null) {
				var anchor = match[0].substr(1);
				$('#page-content-tabs>div').each(function(i, ele) {
					if (ele.id == anchor) {
						selectedTab = i;
						$('html, body').animate({scrollTop:0});
					}
				});
			}
			$('#page-content-tabs').tabs({selected:selectedTab});
		} else if ($('body').hasClass('front')) {
			$('.panel-pane.pane-logos-panel-pane-1 .view-content').prepend('<a class="browse prev" />');
			$('.panel-pane.pane-logos-panel-pane-1 .view-content').append('<a class="browse next" />');
			$('.panel-pane.pane-logos-panel-pane-1 .view-content .item-list').scrollable({
				items: 'ul',
				circular: true
			});
		}
		$('#block-webform-client-block-41 input.form-text').data('label', $('#block-webform-client-block-41 label').text());
		$('#block-webform-client-block-41 input.form-text').focus(function() {
			var _s = $(this);
			if (_s.val() == _s.data('label')) {
				_s.val('');
			}
			_s.addClass('filled');
		}).blur(function() {
			var _s = $(this);
			if (_s.val() == '') {
				_s.val(_s.data('label'));
				_s.removeClass('filled');
			} else {
				_s.addClass('filled');				
			}
		}).blur();
	});
	function initTabs() {
    var tabIndex = {'info':0,'reviews':1,'ratings':2}
    var re = /#\w+$/; // This will match the anchor tag in the URL i.e. http://here.com/page#anchor
    var match = re.exec(document.location.toString());
    if (match != null) var anchor = match[0].substr(1);
    for (key in tabIndex) {
        if (anchor == key) {
            selectedTab = tabIndex[key];
            break;
        }
		else selectedTab = 0;
			}
			tabs = $("#tabs").tabs({selected:selectedTab}); // render the tabs
			tabs.bind('tabsshow', function(event, ui) { // when tab is shown update the URL
					var re = /#\w+$/;
					var url = document.location.toString();
					// to make bookmarkable
		document.location = url.replace(re, "#"+ui.panel.id);
			});
	}
})(jQuery);