var angularDemo = angular.module('angularDemo', ['angularDemoServices']);

angularDemo.controller('IdeaListCtrl', ['$scope', 'Idea', function($scope, Idea) {
	$scope.ideas = Idea.query();

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