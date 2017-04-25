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
  	<div ng-if="veri === false">
   ID:<input type="text" ng-model="digUser.id" name="id">
 <br>
  Nome:<input type="text" ng-model="digUser.name" name="name">
 <br>
  <br>
  <input type="button" value="submit" ng-click="insertdata(digUser);">
  <br>
  <br>
  {{msg}}
	</div>
	 	<div ng-if="veri === true">
 <input type="text" ng-model="id" name="id" placeholder="Id" placeholder="Id" value="{{id}}">
 <br>
 <input type="text" ng-model="name" name="name" placeholder="Nome" value="{{name}}">
  <input type="hidden" ng-model="idd" value="{{idd}}">
 <br>
  <br>
  <input type="button" value="save" ng-click="savedata(id,name,idd);">
  <br>
  <br>
  {{msg}}
	</div>
{{veridate}}
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
  		<div ng-show="veridate === true">
  		<tr ng-repeat="student in data">
  			<input type="hidden" name="some_name" value="{{student.idd}}" id="idd"/>
  			<td><a href="#" ng-click="selecaoNome(student)">{{student.id}}</a></td>
  			<td><a href="#" ng-click="selecaoNome(student)">{{student.name}}</a></td>
  			<td><button ng-click="deleteCT(student.id);">delete</button></td>
  		</tr>
  		</div>
		</div>
  	</tbody>
  </table>
  </div>
  <script>
  	var app=angular.module('myApp',[]);
  	app.controller('cntrl', function($scope,$http){
  		var veri;
  		var veridate;
  		$scope.veri=false;
  		$scope.veridate=true;
  		
  		$scope.selecaoNome=function(student){
		$scope.id=student.id;
		$scope.idd=student.idd;
		$scope.name=student.name;
  		$scope.veri=true;
  		}
  		
  		
  		$scope.savedata=function(id,name,idd){
  		$http.post("savedata.php",{'id':id, 'name':name, 'idd':idd}).success(function(){
  			$scope.msg="date alterado sucesso";	
  			delete $scope.id;
  			delete $scope.name;
  			delete $scope.idd;
		    $scope.carregaLista();
  			$scope.veri=false;
  			})
  		}
  		
  		$scope.insertdata=function(digUser){
  		$http.post("insert.php",{'id':digUser.id, 'name': digUser.name}).success(function(){
  			$scope.msg="date inserted";	
  			delete digUser.id
			delete digUser.name;
		    $scope.carregaLista();
  			})
  		}
  		$scope.carregaLista=function(){
  			$http.get("select.php").success(function(data){
  				if(data=="null"){
  					$scope.veridate=false;
  				}
  				else{
  					$scope.veridate=true;
  					$scope.data=data;
  				}
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