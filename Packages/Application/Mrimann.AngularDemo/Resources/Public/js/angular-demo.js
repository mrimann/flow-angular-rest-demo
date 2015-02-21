var angularDemo = angular.module('angularDemo', ['angularDemoServices']);

angularDemo.controller('IdeaListCtrl', ['$scope', 'Idea', function($scope, Idea) {
		$scope.ideas = Idea.query();
}]);


var angularDemoServices = angular.module('angularDemoServices', ['ngResource']);

angularDemoServices.factory('Idea', ['$resource',
	function($resource){
		return $resource('api/v1/idea/:phoneId', {}, {
			query: {method:'GET', params:{ideaId:'ideas'}, isArray:true}
		});
	}]);