var Designer = function() {
    this.showNav = false;
    this.selBlock = null;
    this.isContextOnBlock = false;
    this.configEl = null;
    this.copyBlockEl = null;
};

Designer.prototype = {
    showConfiguration : function(el) {
        $('#backgroundColor').val(Util.rgb2hex($(el).css('backgroundColor')));
    },
    showContextMenu : function(x, y) {
        if (this.isContextOnBlock) {
            $('#delBlock, #copyBlock').css('display', 'block');
        } else {
            $('#delBlock, #copyBlock').css('display', 'none');
        }

        if (this.copyBlockEl == null)
            $('#insertBlock').css('display', 'none');
        else
            $('#insertBlock').css('display', 'block');

        $('#contextMenu').css({'left' : x + 'px', 'top' : y + 'px', 'display':'block'});
    },
    hideContextMenu : function() {
        $('#contextMenu').css('display', 'none');
    },
    copyBlock : function() {
        this.copyBlockEl = this.selBlock;
        this.hideContextMenu();
    },
    insertBlock : function(el) {
        var e = $(this.copyBlockEl).clone();

        $(e).css({ 'left' : adjustGridSize($(el).parent().offset().left) + 'px', 'top' : adjustGridSize($(el).parent().offset().top) + 'px' });
        $('#pageContainer').append(e);
        hideContextMenu();
    },
    deleteBlock : function() {
        $(this.selBlock).remove();
        hideContextMenu();
    },
    newBlock : function(el) {
        var block = Util.createNewBlock('+', 'name', ':bool', '', 'Peter')
        /* var e = $("<div></div>");
        $(e).attr('class','block');*/

        
        $(block).css({ 'left' : Util.adjustGridSize($(el).parent().offset().left) + 'px', 'top' : Util.adjustGridSize($(el).parent().offset().top) + 'px' });
        $('#pageContainer').append(block);
        this.hideContextMenu();
    },
    showGrid : function() {
        if ($('#pageContainer').css('backgroundImage') == 'none') {
            $('#pageContainer').css({ 'backgroundImage' : 'linear-gradient(#ddd 1px, transparent 1px), linear-gradient(90deg, #ddd 1px, transparent 1px)', 'backgroundSize' : Util.gridSize + 'px ' + gridSize + 'px, ' + gridSize + 'px ' + gridSize + 'px' });
            $('#showGridBtn').html('Hide Grid');
            return;
        }
        $('#showGridBtn').html('Show Grid');
        $('#pageContainer').css('backgroundImage', 'none');
    }
};