/**
 * Site/blog Ouest Américain 2009
 * @author Fabien Crespel
 */

function initIE6() {
    if (Browser.Engine.trident == true && Browser.Engine.version < 5) {
        $('searchsubmit').set('value', '');
    }
}

function initSearchBox(defaultValue) {
	var search = $('s');
	if (!search) return;
	
	search.set('value', defaultValue);
	search.addEvents({
		focus: function(e) { if (e.target.get('value') == defaultValue) e.target.set('value', ''); },
		blur: function(e) { if (e.target.get('value') == '') e.target.set('value', defaultValue); }
	});
}

window.addEvent('domready', function() {
	initIE6();
	initSearchBox('Recherche');
});
