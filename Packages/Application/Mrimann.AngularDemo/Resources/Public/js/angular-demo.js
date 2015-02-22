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
}]);


var angularDemoServices = angular.module('angularDemoServices', ['ngResource']);

angularDemoServices.factory('Idea', ['$resource',
	function($resource){
		return $resource("/api/v1/idea/:id");
	}]);