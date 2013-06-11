var Burgerpost = (function(){

	var baseURL = 'http://localhost/food/maiv_jackinthebox/api';

	function Burgerpost(sourceElement,burgerData)
	{
		this.sourceElement = sourceElement;
		this.burgerData = burgerData;
	}

	Burgerpost.prototype.showPost = function() {

			var comments;
			var burgerData = this.burgerData;

            $.get(baseURL+'/comments/'+this.burgerData.burger_id, function(commentsData){
            	console.log(commentsData);
            	console.log(burgerData);
            });
	};

	return Burgerpost;

})();