/*****************************************
	jGrid v. 1.0
*****************************************/

var copyBlockEl = null, designer = null;

$(function() {
    designer = new Designer();

	var isContextOnBlock = false,
	    resizer = new Resizer('.block'),
	    mover = new Mover('.block');

    Navigator.init();
    Navigator.designer = designer;

    /****************************************************
        DOM Listeners
     ****************************************************/

    $('body').on('click', '.block', function() {
		designer.configEl = this;
		designer.showConfiguration(designer.configEl);
	});
	
	$('body').on('click', function(evt) {
		designer.hideContextMenu();
	});
	
	$('body').on('contextmenu', '.block', function(evt) {
		designer.selBlock = this;
        designer.isContextOnBlock = true;
	});
	
	$('body').on('contextmenu', function(evt) {
		evt.stopPropagation();
		evt.preventDefault();
		
		if (designer.showNav) return;

		designer.showContextMenu(evt.clientX, evt.clientY);
        designer.isContextOnBlock = false;
	});
	
	$('#backgroundRepeat').on('change', function() {
		$(designer.configEl).css('backgroundRepeat', $(this).val());
	});
	
	$('#backgroundImage').on('change', function() {
		Util.readImage(this, designer.configEl);
		$(designer.configEl).css('backgroundImage', Util.readImage(this));
	});
	
	$('#backgroundPositionX, #backgroundPositionY').on('change', function() {	
		if (~~$('#backgroundPositionX').val() == $('#backgroundPositionX').val() && $('#backgroundPositionX').val().length > 0)
			$('#backgroundPositionX').val($('#backgroundPositionX').val() + "px");
		
		if (~~$('#backgroundPositionY').val() == $('#backgroundPositionY').val() && $('#backgroundPositionY').val().length > 0)
			$('#backgroundPositionY').val($('#backgroundPositionY').val() + "px");
		
		$(configEl).css('backgroundPosition', $('#backgroundPositionX').val() + " " + $('#backgroundPositionY').val());
	});
	
	$('#backgroundSizeX, #backgroundSizeY').on('change', function() {
		if (~~$('#backgroundSizeX').val() == $('#backgroundSizeX').val() && $('#backgroundSizeX').val().length > 0)
			$('#backgroundSizeX').val($('#backgroundSizeX').val() + "px");
		
		if (~~$('#backgroundSizeY').val() == $('#backgroundSizeY').val() && $('#backgroundSizeY').val().length > 0)
			$('#backgroundSizeY').val($('#backgroundSizeY').val() + "px");
		
		$(configEl).css('backgroundSize', $('#backgroundSizeX').val() + " " + $('#backgroundSizeY').val());
	});

	$('#backgroundColor').on('change', function() {
		$(configEl).css('backgroundColor', $(this).val());
	});
	
	$('#configurationBox > section > label').on('click', function() {
		$(this).parent().css('height', ($(this).parent().css('height') == '40px') ? 'auto' : '40px');
	});

	Array.prototype.slice.call($('.numericInput')).map(function(el) {
		$('<div class="numericMinus">-</div>').insertBefore(el);
		$('<div class="numericPlus">+</div>').insertAfter(el);
	});
	
	$('#gridSize').on('change', function() {
		Util.gridSize = $(this).val();
		$('#pageContainer').css('backgroundImage', 'none');
		designer.showGrid();
	});
	
	$('body').on('click', '.numericPlus', function() {
		$(this).prev().val(~~$(this).prev().val() + 5);
		
		Util.gridSize = $(this).prev().val();

		$('#pageContainer').css('backgroundImage', 'none');
		designer.showGrid();
	});
	
	$('body').on('click', '.numericMinus', function() {
		$(this).next().val((~~$(this).next().val() - 5 > 5) ? ~~$(this).next().val() - 5 : 5);
		
		Util.gridSize = $(this).next().val();

		$('#pageContainer').css('backgroundImage', 'none');
		designer.showGrid();
	});

    $('body').on('click', '.addNewAttribute', function() {
        $(this).parent().find('ul').append(Util.instantiateAttribute('+', 'nameless', 'int', '', 'a'))
    });

    $('body').on('click', '.attrName', function(evt) {
        if ($(this).attr('data-is-edit') == 'true') return;

        $(this).attr('data-is-edit', 'true');
        $(this).html(Util.instantiateMagicInputField($(this).html(), 40));

        evt.preventDefault();
        evt.stopPropagation();
    });

    $('body').on('click', '.magicInputOk', function(evt) {
        $(this).parent().attr('data-is-edit', 'false');
        $(this).parent().html($(this).prev().val());

        evt.preventDefault();
        evt.stopPropagation();
    });
});