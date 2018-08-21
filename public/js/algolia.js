function() {
	var client = algoliasearch('UO2TPLWVZU', 'b108411cfd340eb4d0a4c846ce04330b');
	var index = client.initIndex('YourIndex');
	//initialize autocomplete on search input (ID selector must match)
	autocomplete('#aa-search-input',
	{ hint: false }, {
	    source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
	    //value to be displayed in input control after user's suggestion selection
	    displayKey: 'name',
	    //hash of templates used when rendering dataset
	    templates: {
	        //'suggestion' templating function used to render a single suggestion
	        suggestion: function(suggestion) {
	          return '<span>' +
	            suggestion._highlightResult.name.value + '</span><span>' +
	            suggestion._highlightResult.team.value + '</span>';
	        }
	    }
	});
}