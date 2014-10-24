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
    var _this = this, hover = false, resizing = false, direction = "",
        initVals = { ob : { width : 0, height : 0, x : 0, y : 0 }, mouse : { x : 0, y : 0 } };
    this.objectQuery = objectQuery;
    this.domEl = $('<div id="resizer"><div class="b bLT"></div><div class="b bLB"></div><div class="b bRT"></div><div class="b bRB"></div><div class="left"></div><div class="top"></div><div class="right"></div><div class="bottom"></div></div>');

    this.resizeEl = null;

    $('body').append(this.domEl);

    $('body').on('mouseup', function() {
        resizing = false;
    });

    $('body').on('mouseout', '.block', function() {
        hover = false;
    });

    $('body').on('mouseover', '.block', function() {
        _this.setStyles(this);
        _this.show();
        _this.resizeEl = this;
        hover = true;
    });

    $('body').on('mousemove', function(evt) {
        if (!resizing) return;

        var offsets = {
            x : evt.pageX - initVals.mouse.x,
            y : evt.pageY - initVals.mouse.y }

        console.log(offsets);

        console.log(initVals.ob.width);

        switch (direction) {
            case 'bRB':
                $(_this.resizeEl).css({ 'width' : initVals.ob.width + offsets.x + "px",
                    'height' : initVals.ob.height + offsets.y + "px" });
                break;
            case 'bRT':

                break;
            case 'bLB':

                break;
            case 'bLT':

        }

        // _this.resizeEl.css({  })
    });

    $('body').on('mousedown', '.b', function(evt) {
        resizing = true;
        direction = $(this).attr('class').split(' ')[1];
        initVals = {
            ob : {
                width : $(_this.resizeEl).width(),
                height : $(_this.resizeEl).height(),
                x : $(_this.resizeEl).offset().left,
                y : $(_this.resizeEl).offset().top
            },
            mouse : { x : evt.pageX, y : evt.pageY }
        };
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
        $(this.domEl).find(".left, .right").css('height', $(el).height() + 12 + 'px');
        $(this.domEl).find(".top, .bottom").css('width', $(el).width() + 12 + 'px');

        $(this.domEl).find(".left, .top, .bottom").css('left', $(el).offset().left - 9 + "px");
        $(this.domEl).find(".right").css('left', ($(el).offset().left + $(el).width()) + 1 + "px");

        $(this.domEl).find(".left, .top, .right").css('top', $(el).offset().top - 9 + "px");
        $(this.domEl).find(".bottom").css('top', ($(el).offset().top + $(el).height()) + 1 + "px");

        $(this.domEl).find(".bLT, .bLB").css('left', $(el).offset().left - 13 + "px");
        $(this.domEl).find(".bRT, .bRB").css('left', $(el).offset().left + $(el).width() - 3 + "px");

        $(this.domEl).find(".bLT, .bRT").css('top', $(el).offset().top - 13 + "px");
        $(this.domEl).find(".bLB, .bRB").css('top', $(el).offset().top + $(el).height() - 3 + "px");
    }
};