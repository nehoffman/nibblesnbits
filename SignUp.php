<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    
    <head>  
        <link rel="stylesheet" type="text/css" href="MainStyles.css">
        <link rel="stylesheet" type="text/css" href="SignUpStyles.css">
        <title>Project Nibbles and Bits</title>
    </head>
    
    <body>
        <h1>Project Nibbles and Bits</h1>
	<?php
		include 'Functions.php';
		loginDisplay($_SESSION["userName"]);
	?>
        

        <ul id="Nav_Bar">
            <li><a href="Index.php">Home</a></li>
            <li><a href="Recipe.php">Recipes</a></li>
            <li><a href="MyRecipes.php">My Recipes</a></li>
            <li><a href="Categories.php">Categories</a></li>
            <li><a href="Forums.php">Forums</a></li>
            <li><a href="TipsAndTricks.php">Tips and Tricks</a></li>
        </ul>
		
        
        
        <p1>
            <form action="UserCreate" method="post" id="User_Create">
                <label id="Label_1"><br>Email</label>
                <input type="text" name="User_Email" id="Email_Input" value="Email">
                <label id="Label_2">Username</label>
                <input type="text" name="User_Name" id="User_Name_Input" value="Username">
                <label id="Label_3"><br>Password</label>
                <input type="password" name="User_Password" id="User_Password_Input" value="Password">
                <label id="Label_4">Reenter Password</label>
                <input type="password" name="User_Password" id="Re_Enter_Password" value="Re-Enter Password">
                <label id="Label_5"><br>First Name</label>
                <input type="text" name="First_Name" id="First_Name_Input" value="First Name">
                <label id="Label_6">Last Name</label>
                <input type="text" name="Last_Name" id="Last_Name_Input" value="Last Name">
                <label id="Label_7"><br>Country</label>
                <select name="User_Country" id="Select_Country" id="Country_Select">
                    <option value="USA">United States of America</option>
                    <option value="ElseWhere">Elsewhere</option>
                </select>
                <label id="Label_8">State</label>
                <select name="User_State" id="Select_State" id="State_Select">
                    <option value=	"AK"	>	AK	</option>
                    <option value=	"AL"	>	AL	</option>
                    <option value=	"AR"	>	AR	</option>
                    <option value=	"AZ"	>	AZ	</option>
                    <option value=	"CA"	>	CA	</option>
                    <option value=	"CO"	>	CO	</option>
                    <option value=	"CT"	>	CT	</option>
                    <option value=	"DC"	>	DC	</option>
                    <option value=	"DE"	>	DE	</option>
                    <option value=	"FL"	>	FL	</option>
                    <option value=	"GA"	>	GA	</option>
                    <option value=	"HI"	>	HI	</option>
                    <option value=	"IA"	>	IA	</option>
                    <option value=	"ID"	>	ID	</option>
                    <option value=	"IL"	>	IL	</option>
                    <option value=	"IN"	>	IN	</option>
                    <option value=	"KS"	>	KS	</option>
                    <option value=	"KY"	>	KY	</option>
                    <option value=	"LA"	>	LA	</option>
                    <option value=	"MA"	>	MA	</option>
                    <option value=	"MD"	>	MD	</option>
                    <option value=	"ME"	>	ME	</option>
                    <option value=	"MI"	>	MI	</option>
                    <option value=	"MN"	>	MN	</option>
                    <option value=	"MO"	>	MO	</option>
                    <option value=	"MS"	>	MS	</option>
                    <option value=	"MT"	>	MT	</option>
                    <option value=	"NC"	>	NC	</option>
                    <option value=	"ND"	>	ND	</option>
                    <option value=	"NE"	>	NE	</option>
                    <option value=	"NH"	>	NH	</option>
                    <option value=	"NJ"	>	NJ	</option>
                    <option value=	"NM"	>	NM	</option>
                    <option value=	"NV"	>	NV	</option>
                    <option value=	"NY"	>	NY	</option>
                    <option value=	"OH"	>	OH	</option>
                    <option value=	"OK"	>	OK	</option>
                    <option value=	"OR"	>	OR	</option>
                    <option value=	"PA"	>	PA	</option>
                    <option value=	"RI"	>	RI	</option>
                    <option value=	"SC"	>	SC	</option>
                    <option value=	"SD"	>	SD	</option>
                    <option value=	"TN"	>	TN	</option>
                    <option value=	"TX"	>	TX	</option>
                    <option value=	"UT"	>	UT	</option>
                    <option value=	"VA"	>	VA	</option>
                    <option value=	"VT"	>	VT	</option>
                    <option value=	"WA"	>	WA	</option>
                    <option value=	"WI"	>	WI	</option>
                    <option value=	"WV"	>	WV	</option>
                    <option value=	"WY"	>	WY	</option>
                </select>
                
                <label id="Label_9"><br>Date of Birth<br></label>
                <input type="text" name="User_DOB" placeholder="MM-DD-YYYY" id="DOB_Input"> 
                <br><br>
                <input type="submit" name="Account_Create_Button" value="Sign Up" id="Account_Create_Submit">
            </form>
        </p1>
        

        
    </body>
    
</html>
