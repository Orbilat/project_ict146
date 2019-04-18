<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body{
  margin: 0;
}

.bg-opacity{
    position: relative;
    background-color: #000;
}

.bg-opacity::before{
    content: ' ';
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    opacity: 0.5;
    background:       url("http://lorempixel.com/1000/600/") no-repeat center center;
    background-size: cover;
}

.content{
  position: relative;
  width: 100%;
  height: 600px;
}

.w3-bar .w3-button {
	text-decoration:none;
}
.cliNavLogo{
	margin-top: 5%;
}
* {
	margin:0;
	z-index:0;
	padding:0;
	box-sizing:border-box;
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	-webkit-font-smoothing:antialiased;
	-moz-font-smoothing:antialiased;
	-o-font-smoothing:antialiased;
	text-rendering:optimizeLegibility;
}
.containerRow {
	background-color: rgba(38, 38, 38, 0.5);
	padding:10px;
    }
.titleText{
	color: #F96;
}
.SRheader{
	color: #F96;
	font-size: 18px;
}

.bg {
	font-family:"Open Sans", Helvetica, Arial, sans-serif;
	font-size: 12px;
	line-height:50px;
	color:#000; 
}

.wrapperContact{
  width:100%;
  display: inline-block;
  background-color: #fff;
}

#contact {
	padding:25px;
  
}

#contact h3 {
	color: #F96;
	display: block;
	font-size: 40px;
}

#contact h2 {
	color: #F96;
	display: block;
	font-size: 30px;
}

fieldset {
	border: medium none !important;
	margin: 0 0 10px;
	min-width: 100%;
	padding: 0;
	width: 100%;
}

#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {
	width:100%;
	border:1px solid #CCC;
	background:#FFF;
	margin:0 0 5px;
	padding:10px;
}

#contact button[type="submit"] {
	cursor:pointer;
	width:100%;
	border:none;
  background: #0191C8;
	color:#FFF;
	margin:0 0 5px;
	padding:10px;
	font-size:15px;
}
  .invalid-feedback{
    display: block;
} 

.search{
  margin-top: 6px;
}
.SearchRis{
	margin-top: 8px;
  padding:3px;
}

.TS{
	font-size: 15px;
}
.FontError{
	font-size: 20px;
}
</style>