(function() {
    var app = angular.module('AttractionsModule', []);
    var controller = app.controller('AttractionsController', ($scope) => {
        /** TO DO
            Complete all required code to complete the functionality of the application
        */
       
       $scope.attractions = [           
            {id: 1, image: 'images/tiwanaku.jpg', name: 'Tiwanaku', description: 'Locate near La Paz city, it is undoubtedly one of the most outstanding cultural places in our country.',  price: 1000, quantity: 0, numPeopleShown: false},
            {id: 2, image: 'images/uyuni.webp', name: 'Uyuni', description: 'This is by far one the most beautiful places on earth. Come to Bolivia and visit it.', price: 3000, quantity: 0, numPeopleShown: false},
            {id: 3, image: 'images/villa_tunari.jpg', name: 'villa Tunari', description: 'This is one of Cochabamba’s most beautiful places. There will always be something to do here.', price: 2000, quantity: 0, numPeopleShown: false},
       ];

       $scope.productsChosen = new Array();

        $scope.view = {
            get total() {
                return _.sumBy($scope.productsChosen, (detail) => { return detail.subtotal });
            }
        }
        
       $scope.chooseAttraction = (id) => {
            for (let attraction of $scope.attractions) {
                if (attraction.id == id) {
                    attraction.numPeopleShown = true;    
                }
            }                       
       }

       $scope.cancelAttraction = (id) => {
            for (let attraction of $scope.attractions) {
                if (attraction.id == id) {
                    attraction.numPeopleShown = false;    
                }
                attraction.quantity = 0;
            }                       
       }

       $scope.addAttraction = (attractionID) => {
            let existProduct =  _.find($scope.productsChosen, {id: parseInt(attractionID)});

            if (existProduct) {
                alert('You have already chosen this product')
                $scope.cancelAttraction(attractionID);
                return;
            }

            let product = _.find($scope.attractions, {id: parseInt(attractionID)});

            if (product.quantity == 0) {
                alert('You must specify the quantity of people')
                $scope.cancelAttraction(attractionID);
                return;
            }

            $scope.productsChosen.push({
                id: product.id,
                image: product.image,
                name: product.name,
                description: product.description,
                price: product.price,
                quantity: product.quantity,
                subtotal: parseInt(product.quantity) * product.price
            });

            $scope.cancelAttraction(attractionID);
       }
       
       $scope.deleteAttraction = (id) => {
           let deleteProduct = _.find($scope.productsChosen, {id: parseInt(id)});

           let products = $scope.productsChosen;
           $scope.productsChosen = new Array();
           
           for (let product of products) {
               if (deleteProduct.id != product.id) {
                   $scope.productsChosen.push(product);
               }
           }
       }

       $scope.hideNumPeopleShown = () => {
            for (let attraction of $scope.attractions) {
                attraction.numPeopleShown = false; 
                attraction.quantity = 0;
            }  
       }
       
    });
}());
