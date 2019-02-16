<style>
body
    {
        margin: 0;
        padding: 0;
        font-family:Quicksand;
   }

nav {
    top:0;
    left:0;
    width: 100%;
    height: 100px;
    padding: 10px 10px;
    box-sizing: border-box;
    }

nav .logo {
    padding: 22px 20px;
    height: 80px;
    float: left;
    font-size: 24px;
    }


nav ul  {
    list-style:none;
    float:right;
    margin:0;
    padding:0;
    display: flex;
    }

nav ul li   {
    list-style: none;
    
    }

nav ul li a{
    line-height:80px;
    color:#151515;
    padding: 12px 30px;
    text-decoration: none;
    text-transform: uppercase;
    
}

nav.black ul li a {
    color:#fff;
}

nav ul li a:focus{
    outline:none;
    text-decoration: none;
}

nav ul li a.active{
    background: #2196F3;
    color: #fff;
    border-radius: 6px;
}

nav ul li a:hover{
    text-decoration: none;
}

.cover{
    top:0;
    left:0;
    width: 100%;
    height: 100%;
    padding: 10px 30px;
    box-sizing: border-box;
    }

form.example input[type=text] {
  float:right;
  padding: 1px;
  font-size: 17px;
  border: 1px solid grey;
  width: 20%;
  background: #f1f1f1;
  font-family: Quicksand;
}

form.example button {
  float: right;
  width: 5%;
  padding: 1px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}

.foot{
    width:100%;
    margin: 20px;
    padding: 10px 600px;

}
i.fa.fa-facebook-square:hover{
    color: #3b5998;
 
}

i.fa.fa-twitter:hover{
    color: #4099FF;
    
}

i.fa.fa-instagram:hover{
	color: #bc2a8d;
}
</style>