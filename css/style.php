<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
	*{
	margin: 0; padding: 0; box-sizing: border-box;
	font-family: sans-serif;
}

body{
	width: 95%;
	height: 100vh;
	margin: auto;
	margin-top: 30px;
}

.main-div{
	margin: auto;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}

h1{
	text-align: center;
	font-size: 3rem;
	font-weight: bolder;
	text-transform: uppercase;

}
.center-div{
	width: 100%;
	max-width: 500px;
}
form{
	display: flex;
	justify-content: center;
	align-items: flex-start;
	flex-direction: column;
	margin-top: 50px;
	margin-bottom: 20px;
	font-size: 1.5rem;
}
input,button{
	max-width: 100%;
	width: 500px;
	padding:15px 20px;
	font-size: 1.4rem;
	margin: auto;
	margin-bottom: 20px;
	border-radius: 15px;
	margin-top: 10px;
}
label{
	font-weight: bold;
}
input[type='submit'],button[type='submit']{
	text-transform: uppercase;
	font-weight: bold;
	background-color: #2980B9 ;
	cursor: pointer;
	color: white;
	letter-spacing: 2px;
}
input[type='submit']:hover{
	background-color: #85C1E9;
	color: black;
}
p{
	text-align: center;
	font-size: 1.2rem;
	margin-top: -15px;
}
button[name="gmail"]{
	background-color: #DB4437;
}
button[name="facebook"]{
	background-color: #3b5998;
}
button[type='submit']:hover{
	background-color: #85C1E9;
	color: black;
}
.fa-brands{
	margin-left: 10px;
}

</style>
</head>
<body>

</body>
</html>
