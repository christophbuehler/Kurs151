var Navigator = {
    designer : null,
	prevHash : '',
	layoutFunctions : {
        nav : [function() {
            Designer.showNav = true;
            $('#interface').css({'display':'block'});
            setTimeout(function() {
                $('#interface').css({'background':'rgba(0, 0, 0, .2)', 'borderColor':'#fff'});
                $('#interfaceNav').css({'transform':'translate3d(0,0,0)'});
            }, 100);
        }, function() {
            Designer.showNav = false;
            $('#interface').css({'background':'rgba(0,0,0,0)', 'borderColor':'transparent'});
            $('#interfaceNav').css({'transform':'translate3d(-100%,0,0)'});
            setTimeout(function() {
                $('#interface').css({'display':'none'});
            }, 200);
        }]
	},
	init : function() {
		var _this = this;
        this.callLayoutFunction(this.getHash());

        $('body').on('click', 'a[href^="$"]', function(evt) {
            evt.preventDefault();
            evt.stopPropagation();

            _this.designer[$(this).attr('href').substr(1, $(this).attr('href').length)](this);
        });

		$('body').on('click', 'a[href^="#"]', function(evt) {
			evt.preventDefault();
			evt.stopPropagation();
		});
		
		$('body').on('mousedown', 'a[href^="#"]', function(evt) {
			window.location.hash = $(this).attr('href').substr(1, $(this).attr('href').length);
		});
		
		this.prevHash = this.getHash();
		
		$(window).on('hashchange', function(evt) {
			if (this.getHash() != this.prevHash)
				this.undoLastLayoutFunction(this.prevHash);
			
			this.callLayoutFunction(this.getHash());
			this.prevHash = this.getHash();
		}.bind(this));
	},
	callLayoutFunction : function(name) {
		if (name == '') name = 'main';
		if (!this.layoutFunctions[name]) return;
		if (!this.layoutFunctions[name][0]) return;
		this.layoutFunctions[name][0]();
	},
	undoLastLayoutFunction : function(name) {
		if (name == '') name = 'main';
		if (!this.layoutFunctions[name]) return;
		if (!this.layoutFunctions[name][1]) return;
		this.layoutFunctions[name][1]();
	},
	getHash : function() {
		var hashSplit = location.hash.split('#');
		return (hashSplit.length > 1) ? hashSplit[1] : '';
	},
	getSubHash : function() {
		var hashSplit = location.hash.split('#');
		return (hashSplit.length > 2) ? hashSplit[2] : '';
	}
}