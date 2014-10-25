var Connector = function(fromC) {
	this.fromC = fromC; // a .block element
	this.toC = null; // a .block element
	this.path = {
		x1 : $('<div class="connectorX"></div>'),
		y : $('<div class="connectorY"></div>'),
		x2 : $('<div class="connectorX"></div>')
	};
	$('body').append(this.path.x);
	$('body').append(this.path.y);
};

Connector.prototype = {
	update : function(x, y) {
		var fX = $(this.fromC).offset().left + 3;
		
		$(this.path.x).css({ 'left' : fX + "px", 'width' : x - fX + "px" })
	}
};

{
    create : function(blockOneId, blockTwoId) {
        // get anchor
        // 88888888888888888888
    }
}