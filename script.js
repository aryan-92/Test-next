// jQuery Plugin: http://flaviusmatis.github.io/simplePagination.js/

var items = $(".people_wrap .list_wrap");
alert(items);
var numItems = items.length;
var perPage = 3;

items.slice(perPage).hide();

$('.people_btn').pagination({
    items: numItems,
    itemsOnPage: perPage,
    prevText: "&laquo;",
    nextText: "&raquo;",
    onPageClick: function (pageNumber) {
        var showFrom = perPage * (pageNumber - 1);
        var showTo = showFrom + perPage;
        items.hide().slice(showFrom, showTo).show();
    }
});