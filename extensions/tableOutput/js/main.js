$(function() {
    /*$('body').on('keyup', '.editInput', function() {
        updateInput(this);
    });

    $('body').on('keydown', '.editInput', function() {
        updateInput(this);
    });*/
    var tableOutputs = [];
    $('.table_output').each(function() {
        tableOutputs.push(new TableOutput($(this)));
    });
});

var TableOutput = function(tableSelector) {
    // the dom selector for this table element
    this.selector = tableSelector;

    // field formats
    this.types = eval($(tableSelector).data('types'));

    // field names
    this.names = eval($('.table_output').data('names'))

    this.changedInputs = new Array();
    this.filter = new Array();

    // initialize GUI
    this.initEditBtn();
    this.initNewRowBtn();
    this.initSaveChangesBtn();
    this.initSaveNewRowBtn();
    this.initFilterUpdate();

    // messages
    this.errorBox = $(tableSelector).parent().find('.table-output-error-message');
    this.successBox = $(tableSelector).parent().find('.table-output-success-message');
};

TableOutput.prototype = {
    initEditBtn : function() {
        var _this = this;
        $(this.selector).on('click', '.f',function() {
            var index = 0;
            var celltext;
            var editRow = $(this).parents('tr');

            $("td", editRow).not(':first').each(function(){
                celltext = $(this).text();
                switch(_this.types[index]) {
                    case "VAR_STRING":
                        $(this).html('<input data-index=\"' + index + '\" class=\"editInput\" type=\"text\" value=\" ' + celltext + '\">');
                        break;
                    case "DATE":
                        $(this).html('<input data-index=\"' + index + '\" class=\"editInput\" type=\"text\"  id=\"datepicker\" value=\"' + celltext + '\">');
                        /*$( "#datepicker" ).datepicker({
                            changeMonth: true,
                            changeYear: true,
                            dateFormat: 'yy-mm-dd'
                        });*/
                        break;
                    default:
                    // console.log("DEFAULT");
                }
                index++;
            });
            $(this).addClass('s');
            $(this).removeClass('f');
            $(this).html('save');
        });
    },
    initSaveChangesBtn : function() {
        $(this.selector).on('click', '.s', function() {
            var celltext = "";
            var saveRow = $(this).parents('tr');
            $("td", saveRow).not(':first').each(function(){
                if(!$(this).is(':last-child')){
                    celltext += $(this).children().val().trim() + ":";
                } else {
                    celltext += $(this).children().val().trim();
                }
            });
            console.log(celltext);
            $.ajax({
                type: "GET",
                url: "tableOutput/saveData&p=" + celltext
            }).done(function( msg ) {
                console.log( "Data Saved: " + msg );
            });
        });
    },
    initNewRowBtn : function() {
        var _this = this;
        $(this.selector).on('click', '.new', function() {
            var row, index = 0;

            // filter already active
            if ($(this).closest('table').find(".newRow").length != 0) {
                $(this).html('new');
                $(this).closest('table').find(".newRow").fadeOut('slow', function() {
                    $(this).remove();
                });
                return;
            }

            $(this).html('abort');

            row = document.createElement('tr');
            $(row).attr('class','newRow');
            $(row).html("<td class=\"createNew\">save</td>");

            _this.types.map(function(el){
                switch(_this.types[index]) {
                    case "VAR_STRING":
                        $(row).append('<td><input data-names=\"' + _this.names[index] + '\" data-index=\"' + index + '\" class=\"editInput\" type=\"text\"></td>');
                        break;
                    case "DATE":
                        $(row).append('<td><input data-names=\"' + _this.names[index] + '\" data-index=\"' + index + '\" class=\"editInput\" type=\"text\"  class=\"datepicker\"></td>');
                        /*$(".datepicker").datepicker({
                         changeMonth: true,
                         changeYear: true,
                         dateFormat: 'yy-mm-dd'
                         });*/
                        break;
                    default:
                    // console.log("DEFAULT");
                }
                index++;
            });

            $(row).css({'display':'none'});

            $('.tbl_filter_row').after(row);

            $(row).fadeIn('slow');
        });
    },
    initSaveNewRowBtn : function() {
        var _this = this;
        $(this.selector).on('click', '.createNew', function() {
            var cellText,
                newValues = "",
                newRow = $(this).parents('tr');

            $("td", newRow).not(':first').each(function(){
                cellText = $(this).children().val();
                name = $(this).children().data('names');
                if (cellText.trim() == "") return;
                newValues += name + ":" + cellText + ";";
            });

            // nothing entered
            if (newValues.trim() == "") {
                _this.showErrorMessage("Nothing entered.");
                return;
            }

            newValues = newValues.substring(0, newValues.length - 1);

            $.ajax({
                type: "GET",
                url: "tableOutput/insertRow?&p=" + newValues + "," + $(_this.selector).data('table-id') + "," + $(_this.selector).data('table-name')
            }).done(function(msg) {
                console.log(msg);
            });
        });
    },
    updateInput : function(el) {
        var i = $(el).data('index'),
            currentVal = $(el).val().trim(),
            found = false;

        changedInput.map(function(el) {
            if (el.index != i) return; // elements don't match
            found = true; // element found
            el.newVal = currentVal;
        });

        // element already found - no need to push
        if (found) return;

        // push new element
        changedInput.push({
            "oldVal" : currentVal,
            "newVal" : currentVal,
            "element" :  el,
            "index" : $(el).data('index') });
    },
    initFilterUpdate : function() {
        var _this = this;

        $(this.selector).on('keyup', '.tbl_filter', function() {
            console.log("asdasdf")

            // add this element to filter
            _this.updateFilterElements(this);

            _this.executeFilter();
        });
    },
    updateFilterElements : function(el) {
        var field = $(el).data('field'),
            currentVal = $(el).val().trim(),
            found = false;

        // check if element is already in filter
        this.filter.map(function(el) {
            if (el.field != field) return; // elements don't match
            found = true; // element found
            el.value = currentVal;
        });

        // element already in filter - return
        if (found) return;

        // add new element to filter
        this.filter.push({
            "field" : field,
            "value" : currentVal
        });
    },
    executeFilter : function() {
        var filterStr = "";

        this.filter.map(function(el) {
            if (el.value.trim() == '') return;
            filterStr += el.field + ";" + el.value + ";";
        });

        console.log("a")

        $.ajax({
            type: "GET",
            url: "tableOutput/filterData&p=" + filterStr + "," + $(this.selector).data('table-id')
        }).done(function( msg ) {
            $('.table_output > tbody > tr:not(:first-of-type)').empty();
            $('.table_output > tbody').append(msg);
        });
    },
    showErrorMessage : function(msg) {
        var _this = this;
        $(this.errorBox).html(msg);
        $(this.errorBox).fadeIn("fast");
        setTimeout(function() {
            $(_this.errorBox).fadeOut("fast");
        }, 1000);
    },
    showSuccessMessage : function(msg) {
        var _this = this;
        $(this.successBox).html(msg);
        $(this.successBox).fadeIn("fast");
        setTimeout(function() {
            $(_this.successBox).fadeOut("fast");
        }, 1000);
    }
};
