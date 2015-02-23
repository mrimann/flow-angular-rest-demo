var angularDemo = angular.module('angularDemo', ['angularDemoServices']);

angularDemo.controller('IdeaListCtrl', ['$scope', '$interval', 'Idea', function($scope, $interval, Idea) {
	// initial fetching of the ideas from the API
	$scope.ideas = [];
	fetchData();

	// set interval for periodically fetching the data from the API to keep up to date
	$interval(fetchData, 10000);

	// method to actually fetch the data from the API, the insertion of the data into the
	// scope is handled in the success method to make sure the API request is initially finished,
	// this avoids the flickering of the list view
	function fetchData() {
		allIdeas = Idea.query(function() {
			$scope.ideas = allIdeas;
		});
	}

	// deleting of ideas
	$scope.remove = function(idea) {
		// actual deletion against the API
		Idea.remove({ id: idea.id }, function() {
			// removal from the list view (DOM side)
			$scope.ideas.forEach(function(p, index) {
				if (p.id == idea.id) $scope.ideas.splice(index, 1);
			});
		});
	};

	// create a new idea
	$scope.create = function(idea) {
		// actual POST against the API
		Idea.save({idea: $scope.newIdea}, function(data) {
			// success, so we can add it to the scope to list it
			$scope.ideas.push(data);
		})
	};
}]);


var angularDemoServices = angular.module('angularDemoServices', ['ngResource']);

angularDemoServices.factory('Idea', ['$resource',
	function($resource) {
		return $resource('/api/v1/idea/:id');
	}
]);