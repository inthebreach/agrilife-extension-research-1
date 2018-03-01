/* Template Name: Research Project
 */
var aerAccordionButtonFunc = function(e){
	this.innerHTML = this.innerHTML.indexOf('Expand') >= 0 ? 'Collapse' : 'Expand';
	this.parentNode.parentNode.classList.toggle('aer-accordion-open');
};

var aerAccordionButton = function(){

	var obj = {
		wrap: document.createElement('div'),
		el: document.createElement('a')
	};

	obj.el.href = 'javascript:;';
	obj.el.innerHTML = 'Expand';
	obj.el.onclick = aerAccordionButtonFunc;

	obj.wrap.className = 'aer-accordion-button';
	obj.wrap.appendChild(obj.el);

	return obj;

};

(function(){

	var items = document.querySelectorAll('.aer-accordion');

	for(var i = 0; i < items.length; i++){

		var item = items[i];

		if(item.clientHeight > 218){

			item.classList.add('aer-accordion-active');
			item.appendChild(new aerAccordionButton().wrap);

		}

	}

})();
