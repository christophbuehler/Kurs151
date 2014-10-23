var currentUser = null;

window.onload = function() {
    var rows = document.getElementsByClassName("table_output")[0].rows;
    var array = Array.prototype.slice.call(rows);
    for(var i = 2; i < array.length; i++)
    {
        array[i].onclick = function()
        {
            for(var j = 2; j < array.length; j++) {
                array[j].className = array[j].className.replace(/(?:^|\s)selected(?!\S)/g,'');
            }
            this.className += " selected";
            currentUser = this;
            checkUserMenu(array);
        };
    }
    checkUserMenu(array);
};

function checkUserMenu(array)
{
    if(array.length > 2 && currentUser != null)
    {
        Array.prototype.slice.call(document.getElementsByClassName('userMenu')).forEach(function(item) {
            item.className = "userMenuVisible";
        });
    }
}