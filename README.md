<h1 align="center"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Marvel_Studios_2016_logo.svg/langfr-280px-Marvel_Studios_2016_logo.svg.png" alt="API Platform"></a></h1>


Install
-------

[Read the official "Getting Started" guide](https://api-platform.com/docs/distribution).

Schema Entity
-------------
 _____________________     
|       Character     |         
|————————————————–––––|         
| id           integer|        
| name          string|         
| description   string|         
| updated     datetime|         
| created     datetime|         
| resourceURI   string|         
——————————————————––––          
                                
 _____________________ 
|       Comic         |      
|————————————————–––––|
| id           integer|
| title         string| 
| description   string|
| pageCount    integer|
| updated     datetime|
| created     datetime|
| resourceURI   string|
——————————————————––––

 _____________________     
|      Creator        |         
|————————————————–––––|         
| id           integer|        
| firstName     string|         
| lastName      string| 
| fullName      string|       
| updated     datetime|         
| created     datetime|         
| resourceURI   string|   
|—————————————————––––|
   
      
 —————————————————––––  
|      Serie          |         
|————————————————–––––|         
| id           integer|        
| title         string|         
| description   string| 
| startYear    integer| 
| endYear      integer|      
| updated     datetime|         
| created     datetime|         
| resourceURI   string|         
——————————————————––––  



Tests
-----

Process CI
----------

