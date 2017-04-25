<!doctype html>
<html>
  <head>
    <title>AngularJs + PHP</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
  </head>
  <body>
  <div ng-app="myApp" ng-controller="cntrl">
  <h1>AngularJs + PHP</h1>
  <from>
  ID:<input type="text" ng-model="id" name="id">
 <br>
  Nome:<input type="text" ng-model="name" name="id">
 <br>
  <br>
  <input type="button" value="submit" ng-click="insertdata();">
  <br>
  <br>
  {{msg}}

  </from>
  
  <table>
  	<thead>
  		<tr>
  			<th>Name</th>
  			<th>Roll No</th>
  		</tr>
  	</thead>
  	<tbody>
  		<div ng-init="carregaLista()">
  		<tr ng-repeat="student in data">
  			<td>{{student.id}}</td>
  			<td>{{student.name}}</td>
  			<td><button ng-click="deleteCT(student.id);">delete</button></td>
  		</tr>
  		
		</div>
  	</tbody>
  </table>
  </div>
  <script>
  	var app=angular.module('myApp',[]);
  	app.controller('cntrl', function($scope,$http){
  		
  		$scope.insertdata=function(){
  		$http.post("insert.php",{'id':$scope.id, 'name': $scope.name}).success(function(){
  			$scope.msg="date inserted";	
  			delete $scope.id;
  			delete $scope.name;
		    $scope.carregaLista();
  			})
  		}
  		$scope.carregaLista=function(){
  			$http.get("select.php").success(function(data){
  				$scope.data=data;
  			})
  		}
  		$scope.deleteCT=function(id){
  			$http.post("delete.php",{'id':id}).success(function(){
  			$scope.msg="delete sucesso !";	
		    $scope.carregaLista();
  			})
  		}
  	});
  </script>
 
  </body>
</html>