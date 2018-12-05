alert('hello world');
var myIndex = 0;
carousel'.$row["locationID"].'();
function carousel'.$row["locationID"].'() 
{
    var i;
    var x = document.getElementsByClassName("mySlides'.$row["locationID"].'");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel'.$row["locationID"].', 2000); // Change image every 2 seconds
}