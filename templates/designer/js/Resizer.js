/*var Resizer = function(objectQuery) {
	var _this = this;
	
	this.domEl = $('<div id="resizer"><div class="left"></div><div class="top"></div><div class="right"></div><div class="bottom"></div></div>');
	this.listen = false;
	this.disabled = false;
	this.styles = [];
	this.alignment = [];
	this.resizing = false;
	this.target = null;

    $('body').append(this.domEl);
	
	$('body').on('mousemove', objectQuery, function(evt) {
        $(this.domEl + " div").css({ 'display' : 'block' });
        // if (!_this.resizing) _this.setTarget(this);
		_this.setStyles(evt);
	});
	
	$('body').on('mousedown', this.domEl, function() {
		_this.resizing = true;
	});
	
	$('body').on('mouseup', function() {
		_this.resizing = false;
		_this.target = null;
		_this.alignment = [];
	});

	$('body').on('mousemove', function(evt) {
		if (!_this.resizing) return;
		_this.resize(evt.clientX, evt.clientY);
	});
};

Resizer.prototype = {
	setTarget : function(target) {
		this.target = target;
	},
	setStyles : function(evt) {
		var x = evt.clientX - $(this.target).offset().left,
			y = evt.clientY - $(this.target).offset().top, boundings = [], show = false;

		if (this.resizing) return;

		this.alignment = [];

        $(this.domEl).find('.top, .bottom').css({ 'width' : ($(this.target).outerWidth() - this.thickness * 2) + 'px' });
        $(this.domEl).find('.left, .right').css({ 'height' : ($(this.target).outerHeight() - this.thickness * 2) + 'px' });

		this.styles = {
			"width" : $(this.target).outerWidth() - this.thickness * 2,
			"height" : $(this.target).outerHeight() - this.thickness * 2,
			"left" : $(this.target).offset().left + this.thickness,
			"top" : $(this.target).offset().top + this.thickness
		};
		
		if ($(this.target).outerHeight() - y <= this.thickness) {
			this.styles.height = this.thickness;
			this.styles.top = $(this.target).offset().top + $(this.target).outerHeight() - this.thickness;
			show = true;
			this.alignment.push('bottom');
		} else if (y <= this.thickness) {
			this.styles.height = this.thickness;
			this.styles.top = $(this.target).offset().top;
			show = true;
			this.alignment.push('top');
		}
		
		if ($(this.target).outerWidth() - x <= this.thickness) {
			this.styles.width = this.thickness;
			this.styles.left = $(this.target).offset().left + $(this.target).outerWidth() - this.thickness;
			show = true;
			this.alignment.push('right');
		} else if (x <= this.thickness) {
			this.styles.width = this.thickness;
			this.styles.left = $(this.target).offset().left;
			show = true;
			this.alignment.push('left');
		}
		
		if (!show) {
			this.hide();
			return;
		}
		
		this.show();
	},
	show : function() {
		var _this = this;

		$(this.domEl).css('display', 'block');
		
		for (var style in _this.styles) {
			$(_this.domEl).css(style,  _this.styles[style]);
		}
	},
	hide : function() {
		var _this = this;
		$(_this.domEl).css('display', 'none');
	},
	disable : function() {
		this.disabled = true;
		this.hide();
	},
	enable : function() {
		this.disabled = false;
		this.show();
	},
	resize : function(x, y) {
		var _this = this;
		if (this.target == null) return;

		this.alignment.map(function(el) {
			switch (el) {
				case 'top':
					if ( $(_this.target).offset().top + $(_this.target).outerHeight() - Util.adjustGridSize(y) >= _this.thickness * 3)
						$(_this.target).css('height', $(_this.target).offset().top + $(_this.target).outerHeight() - Util.adjustGridSize(y));
					$(_this.target).css('top', Util.adjustGridSize(y));
					break;
				case 'bottom':
					if (Util.adjustGridSize(y - $(_this.target).offset().top) >= _this.thickness * 3)
						$(_this.target).css('height', Util.adjustGridSize(y - $(_this.target).offset().top));
					break;
				case 'left':
					if ($(_this.target).offset().left + $(_this.target).outerWidth() - Util.adjustGridSize(x) >= _this.thickness * 3)
						$(_this.target).css('width', $(_this.target).offset().left + $(_this.target).outerWidth() - Util.adjustGridSize(x));
					$(_this.target).css('left', Util.adjustGridSize(x));
					break;
				case 'right':
					if (Util.adjustGridSize(x - $(_this.target).offset().left) >= _this.thickness * 3)
						$(_this.target).css('width', Util.adjustGridSize(x - $(_this.target).offset().left));
			}
		});
	}
};*/

var Resizer = function(objectQuery) {
    var _this = this;
    this.objectQuery = objectQuery;
    this.domEl = $('<div id="resizer"><div class="left"></div><div class="top"></div><div class="right"></div><div class="bottom"></div></div>');

    $('body').append(this.domEl);

    $('body').on('mouseover', '.block', function() {
        _this.setStyles(this);
        _this.show();
    });
};

Resizer.prototype = {
    show : function() {
        $(this.objectQuery + " div").css('display', 'block');
    },
    hide : function() {
        $(this.objectQuery + " div").css('display', 'none');
    },
    setStyles : function(el) {
        $(this.domEl).find(".left, .right").css('height', $(el).height() + 'px');
        $(this.domEl).find(".top, .bottom").css('width', $(el).width() + 'px');
        $(this.domEl).find(".left, .top, .bottom").css('left', $(el).offset().left + "px");
        $(this.domEl).find(".left, .top, .right").css('top', $(el).offset().top + "px");
        $(this.domEl).find(".bottom").css('top', ($(el).offset().top + $(el).height()) + "px");
        $(this.domEl).find(".right").css('left', ($(el).offset().left + $(el).width()) + "px");
    }
};