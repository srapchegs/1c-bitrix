$(document).ready(function() {
	//слайдер на главной
	$(".index_slider").bxSlider({
		mode: 'fade'
	});
	
	//стилизация форм
	$(".filter_bl input:checkbox, .filter_bl input:radio, .styler input:radio, .styler input:checkbox, .styler select, .styler input:file").styler();
	
	//табы в детальной
	$('body').on('click', 'ul.tabs li:not(.current)', function() {
		$(this).addClass('current').siblings().removeClass('current')
			.parents('div.section').find('div.box').eq($(this).index()).fadeIn(150).siblings('div.box').hide();				
	});
	
    $('body').on('click', '.favor_bt', function() {
        let id = $(this).data('id');
		if ($(this).hasClass('active')){
			actionFav('del', id);
			$(this).removeClass('active');
		}
		else{
			actionFav('add', id);
			$(this).addClass('active');
		}
        if(location.pathname == "/catalog/favorite/"){
            $(this).closest('.catalog_el').remove();
        }
        return false;    
        
    });
});

function actionFav(action, id) {
    var favorite = JSON.parse(getCookie('favorite'));
    if (!Array.isArray(favorite)) {
        favorite = [];
    }
    var inArr = false;
    for (var i = 0; i < favorite.length; i++) {
        if (favorite[i] == id) {
            if (action == 'del') {
                favorite.splice(i, 1);
            }
            inArr = true;
        }
    }
    if (action == 'add' && !inArr) favorite.push(id);
    var d = new Date();
    d.setMonth(d.getMonth() + 1);
    setCookie('favorite', JSON.stringify(favorite), d.toUTCString(), '/');
    $('.top_head_favor span').text(favorite.length);
}

function setCookie(name, value, expires, path, domain, secure) {
    var cookieString = name + "=" + escape(value) +
        ((expires) ? "; expires=" + expires : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
    document.cookie = cookieString;
}

function getCookie(name) {
    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;
    if (cookie.length > 0) {
        offset = cookie.indexOf(search);
        if (offset != -1) {
            offset += search.length;
            end = cookie.indexOf(";", offset);
            if (end == -1) {
                end = cookie.length;
            }
            setStr = unescape(cookie.substring(offset, end));
        }
    }
    return setStr;
}
