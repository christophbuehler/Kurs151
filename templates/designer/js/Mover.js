var Mover = function(objectQuery) {
	var _this = this;
	
	this.movingEls = [];

	$('body').on('mousemove', function(evt) {
		_this.move(evt.clientX, evt.clientY);
	});
	
	$('body').on('mouseup', function(evt) {
		if (_this.movingEls.length == 0) return;
		_this.movingEls = [];
	});

	
	$('body').on('mousedown', objectQuery, function(evt) {
		_this.movingEls = [{
			domEl : this,
			xOffset : evt.clientX - $(this).offset().left,
			yOffset : evt.clientY - $(this).offset().top
		}];
	});
};

Mover.prototype = {
	move : function(x, y) {
		this.movingEls.map(function(el) {
			$(el.domEl).css({'left' : Util.adjustGridSize(x - el.xOffset), 'top' : Util.adjustGridSize(y - el.yOffset)});
		});
	}
};